var tablaCitas;

var mes = ["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

var actualMonth;



//Cuando termine de cargar la pagina ejectua el codigo 
$(document).ready(function () {

    cargarInformacionTerapeutas();

    let today = new Date();

    actualMonth = today.getMonth() + 1 ;

    let maxDaysActualMonth = new Date(today.getFullYear(), actualMonth, 0).getDate();

    $("#nuevoDia").attr("min",today.getDate());//Establece la minima cantidad como el dia actual

    $("#nuevoDia").attr("max", maxDaysActualMonth );//Establece la maxima cantidad de dias disponibles para el mes actual

    $("#nuevoDia").attr("value",today.getDate());//Establece el valor como el dia actual

    for( let indiceMes = actualMonth; indiceMes < mes.length; indiceMes++ ) //Para cada mes apartir del actual mes 
    {
        $("#nuevoMes").append( generarOption( "optionMes" + indiceMes , indiceMes , mes[indiceMes] ) ); //Agregar el mes como opcion 
    }

    $("#nuevoDia").bind('keyup mouseup', function () {
        validarDiaMientasEscribe();          
    });

    $("#nuevoDia").bind('blur', (event) => {
        validarDiaDeselcciona();
    });


    //let date = today.getFullYear()+'-'+(today.getMonth();+'-'+today.getDate();

});

function validarDiaDeselcciona()
{
    let dia = $("#nuevoDia").val();

    if( dia == "" )
    {
        $("#nuevoDia").val(1);
    }
}

function validarDiaMientasEscribe(  )
{
    let dia = $("#nuevoDia").val();

    if( dia == "" )
    {
        return;
    }

    console.log(dia);

    if(  dia <= 0 || dia > 31  )
    {
        $("#nuevoDia").val(1);
        console.log(dia);
    }
}


/*Agrega un nuevo dia a la tabla de citas*/

function agregarNuevoDia()
{
    let nuevaHora =  $("#nuevaHoraDia").val();

    console.log( nuevaHora );

    let today = new Date();

    let nuevoDia = today.getFullYear() + "-" + $("#nuevoMes").val() + "-" +  $("#nuevoDia").val();


    $.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/crearHorario.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {
                "nuevaHora": nuevaHora,
                "dia" : nuevoDia
            }, 
            success: function(response) 
            {
                location.reload();
            }
    });  
  

}

/*Agrega un nuevo horario a la tabla de citas*/

function agregarHorario(event)
{
    let nuevaHora =  $("#nuevaHora").val();


    $.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/crearHorario.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {
                "nuevaHora": nuevaHora,
                "dia" : event.data.nuevoDia
            }, 
            success: function(response) 
            {
                location.reload();
            }
    });  

    console.log( $("#nuevoMes").val() );     

}

function borrarHorario(event)
{
    let dia = event.data.dia;

    let horario = event.data.horario;

    console.log( dia + "  " + horario );

    $.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/borrarCita.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {
                "dia": dia,
                "horario" : horario
            }, 
            success: function(response) 
            {
                location.reload();
            }
    });  

}



/*
Determina el numero del dia y el nombre de mes de un dia con el formato year-month-day
*/
function obtenerMesDia(dia)
{
	let numeroDia = "";
	let numeroMes = "";

	let indexDia = 0;  

	for( indexDia; dia[indexDia]!='-'; indexDia++  ){} //No lee todo el numero del año

	indexDia = indexDia + 1; //Pasa al comienzo del numero del mes

	for( indexDia; dia[indexDia]!='-'; indexDia++  ) //Para cada caractere del mes
	{
		numeroMes = numeroMes + dia[indexDia];//Concatena los numeros del mes
	}

	indexDia = indexDia + 1; //Pasa al comienzo del numero del dia 

	for( indexDia; indexDia < dia.length; indexDia++  ) //Para cada caractere del dia
	{
		numeroDia = numeroDia + dia[indexDia];//Concatena los numeros del dias
	}


	return numeroDia + " de " + mes[parseInt(numeroMes)]; 
	
}

function cargarInformacionTerapeutas()
{
	$.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/verHorarios.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {}, 
            success: function(response) 
            {
            	tablaCitas = JSON.parse( response );
            }
        }).done(function() {

        	$("#tablaCitas").append(  generarRowTable( "fila-dias" )  );

        	for(let indexDia = 0; indexDia < tablaCitas["dias"].length; indexDia++  )
        	{
        		$("#fila-dias").append( generarColumnTable( "", obtenerMesDia( tablaCitas["dias"][indexDia] )  ) );
        	}

        	let cantidadFilasHoras =  Object. keys(tablaCitas).length - 1 ;

            let idColumna = "";

            let cantidadColumnasDias = tablaCitas["dias"].length;

            let idButton = "";

            let botonAgregado = 0;

            console.log( tablaCitas );

        	for(let indexfilaHora = 0; indexfilaHora < cantidadFilasHoras; indexfilaHora++  )
        	{
        		$("#tablaCitas").append(  generarRowTable( "fila-"+indexfilaHora )  );

        		for(let indexColumnaHora = 0; indexColumnaHora < tablaCitas[indexfilaHora].length; indexColumnaHora++ )
        		{
    			    if( tablaCitas[indexfilaHora][indexColumnaHora]!=""  ) //Si existe un horario
                    {
                        //Agrega el horario a la tabla 
                        let idColumna = "fila-"+indexfilaHora+"-columna-"+indexColumnaHora;
                        let idDiv = "div-"+idColumna;
                        let idBotonDelete = idColumna + "-" + "boton";
                        let idLabel = idColumna + "-" + "label";
                        $("#fila-"+indexfilaHora).append( generarColumnTable( idColumna, "" ) );
                        $("#"+idColumna).append( generarDiv(idDiv,"") ); 
                        $("#"+idDiv).append( generarLabel(idBotonDelete,"w-25","x" ) ); 
                        $("#"+idDiv).append( "<br>" ); 
                        $("#"+idDiv).append( generarLabel(idLabel,"",tablaCitas[indexfilaHora][indexColumnaHora] ) ); 
                        $("#"+idBotonDelete).on("click", {dia:tablaCitas["dias"][indexColumnaHora],horario:tablaCitas[indexfilaHora][indexColumnaHora] } , borrarHorario ); 

                        //$("#"+idLabel).append( generarButton( idBoton, " " , "<label> x </label>"  ) );
                        //$("#"+idBoton).on("click", {dia:tablaCitas["dias"][indexColumnaHora],horario:tablaCitas[indexfilaHora][indexColumnaHora] } , borrarHorario ); 
                        //$("#"+idDiv).on( "mouseover" , {idCelda:idDiv,numeroDia:tablaCitas["dias"][indexColumnaHora]} ,mostrarBotonEliminar);
                        //$("#"+idDiv).on( "mouseout" , {idCelda:idDiv} ,ocultarBotonEliminar);
                    }
                    else //Si no existe 
                    {
                        //Agrega solo una columna sin texto
                        let idColumna = "fila-"+indexfilaHora+"-columna-"+indexColumnaHora;
                        $("#fila-"+indexfilaHora).append( generarColumnTable( idColumna , "" ) );
                    }
                }
            }

           //Agrega los botones de +

           for(let indexColumnaDia = 0; indexColumnaDia < cantidadColumnasDias; indexColumnaDia++  ) //Para el dia actual 
            {
                botonAgregado = 0;

                for(let indexfilaHora = 0; indexfilaHora < cantidadFilasHoras; indexfilaHora++  ) //Para cada hora del dia 
                {
                    if( botonAgregado == 1 && tablaCitas[indexfilaHora][indexColumnaDia] == ""  )
                    {
                        //Agrega solo la columna 
                        idColumna = "fila-"+indexfilaHora+"-columna-"+indexColumnaDia;
                        $("#fila-"+indexfilaHora).append( generarColumnTable( idColumna, ""  ) ); //Solo genera la columna 
                    }
                    if( botonAgregado == 0 && tablaCitas[indexfilaHora][indexColumnaDia] == ""  ) //Si no existe un horario y no se a agregado un boton 
                    {
                        //Agregar el boton de +
                        idColumna = "fila-"+indexfilaHora+"-columna-"+indexColumnaDia;
                        idButton = idColumna+"-"+"button";
                        //$("#fila-"+indexfilaHora).append( generarColumnTable( idColumna, ""  ) ); //Solo genera la columna 
                        $("#"+idColumna).append( generarButton( idButton , "" , '+' ) ); //Agrega el boton de +
                        $("#"+idButton).on("click", {nuevoDia:tablaCitas["dias"][indexColumnaDia]}, agregarHorario );   
                        botonAgregado = 1;                   
                    }
                }
            }

            

    });	
}

