var tablaCitas;

var mes = ["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

/*Envia la peticion al servidor de seleccionar una cita */
function seleccionarHorarioCita(event)
{
	$.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/solicitarCita.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {"dia":event.data.dia,
                   "hora":event.data.hora}, 
            success: function(response) 
            {
                  $("#modalCitaExitosa").modal("show");
            	  //window.location.assign("../Principal/Ver_perfil.php");
            }
        }).done(function() {

     

    	

    });	
       

}

/*Redirige a la informacion de su perfil*/

function redirigirVerPerfil()
{
    window.location.assign("../Principal/Ver_perfil.php");
}

/*
Cambia el color de la celda a blanco 
*/

function iluminarHorarioCita(event)
{
    $("#"+event.data.idColumna).attr('class','bg-light text-dark');
}

/*
Reestablece el color de la celda
*/
function apagarHorarioCita(event)
{
    $("#"+event.data.idColumna).attr('class','');
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



        	for(let indexfilaHora = 0; indexfilaHora < cantidadFilasHoras; indexfilaHora++  )
        	{
        		$("#tablaCitas").append(  generarRowTable( "fila-"+indexfilaHora )  );

        		for(let indexColumnaHora = 0; indexColumnaHora < tablaCitas[indexfilaHora].length; indexColumnaHora++ )
        		{
    			if( tablaCitas[indexfilaHora][indexColumnaHora]!=""  ) //Si existe un horario
    			{
                    let idColumna = "fila-"+indexfilaHora+"-columna-"+indexColumnaHora;
    				$("#fila-"+indexfilaHora).append( generarColumnTable( "fila-"+indexfilaHora+"-columna-"+indexColumnaHora, tablaCitas[indexfilaHora][indexColumnaHora]  ) );
                    //Agrega un evento onclick, envia la hora y dia seleccionados como parametros
                    $("#"+"fila-"+indexfilaHora+"-columna-"+indexColumnaHora).on("click",{hora:tablaCitas[indexfilaHora][indexColumnaHora],dia:tablaCitas["dias"][indexColumnaHora]},seleccionarHorarioCita);
                    //Agrega eventos onmouse, envia el id de la columna 
                    $("#"+idColumna).on("mouseover",{idColumna:idColumna},iluminarHorarioCita  );
                    $("#"+idColumna).on("mouseout",{idColumna:idColumna},apagarHorarioCita  );
                }
    			else //Si no existe un horario
    			{
    				$("#fila-"+indexfilaHora).append( generarColumnTable( "", ""  ) ); //Solo genera la columna 
    			}
    		}
    	}
    	

    	

    });	
    }