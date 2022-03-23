var terapeutas; 
var indicesSiguientesTerapeutas = [-3,-2,-1];
var cantidadTerapeutas; 

function analizarEstadoBotones(indice1, indice3)
{
    if( indice1 == 0 ) //Si el primer indice esta al inicio de la lista 
    {
        $("#anterior").attr('disabled','disabled'); //No permitir ir mas atras 
        $("#anterior").css('background-color','gray'); 
    }
    else //Si el primer indice no esta al inicio de la lista
    {
        $("#anterior").removeAttr('disabled');//Permitir ir mas atras 
        $("#anterior").css('background-color','black');
    }

    if( indice3 >= cantidadTerapeutas ) //Si el ultimo indice esta fuera de la lista
    {
        $("#siguiente").attr('disabled','disabled'); //No permitir ir mas adelante
        $("#siguiente").css('background-color','gray'); 
    }
    else //Si el ultimo indice esta dentro de la lista
    {
        $("#siguiente").removeAttr('disabled'); //Permitir ir mas adelante
        $("#siguiente").css('background-color','black'); 
    }
}

/*
Esta funcion muestra la informacion de los siguientes 3 terapeutas 
*/
function mostrarInformacionTerapeutas()
{
    //Establece los indices de los terapeutas a mostrar 
    let indice1 = indicesSiguientesTerapeutas[0];
    let indice2 = indicesSiguientesTerapeutas[1];
    let indice3 = indicesSiguientesTerapeutas[2];


    if( cantidadTerapeutas > indice1 ) //Si el indice se encuentra dentro del rango
    {
        //Mostrar la informacion 
        $("#columna1").attr("style","");
        $("#imagen1").attr("src",terapeutas[indice1]["rutaImagen"]);     
        $("#nombre1").text("Nombre " + terapeutas[indice1]["nombre"] ) ; 
        $("#telefono1").text("Telefono " + terapeutas[indice1]["telefono"] ) ; 
        $("#descripcion1").text("Descripcion " + terapeutas[indice1]["descripcion"] ) ;
    }
    else //Si el indice no se encuentra dentro del rango
    {
        //Ocultar la informacion 
        $("#columna1").attr("style","display: none"); 
    }

    if( cantidadTerapeutas > indice2 )//Si el indice se encuentra dentro del rango
    {
        //Mostrar la informacion 
        $("#columna2").attr("style","");
        $("#imagen2").attr("src",terapeutas[indice2]["rutaImagen"]);
        $("#nombre2").text("Nombre " + terapeutas[indice2]["nombre"] ) ;
        $("#telefono2").text("Telefono " + terapeutas[indice2]["telefono"] ) ;
        $("#descripcion2").text("Descripcion " + terapeutas[indice2]["descripcion"] ) ;
    }
    else//Si el indice no se encuentra dentro del rango
    {
        //Ocultar la informacion 
        $("#columna2").attr("style","display: none");
    }

    if( cantidadTerapeutas > indice3 )//Si el indice se encuentra dentro del rango
    {
        //Mostrar la informacion 
        $("#columna3").attr("style","");
        $("#imagen3").attr("src",terapeutas[indice3]["rutaImagen"]);
        $("#nombre3").text("Nombre " + terapeutas[indice3]["nombre"] ) ;
        $("#telefono3").text("Telefono " + terapeutas[indice3]["telefono"] ) ;
        $("#descripcion3").text("Descripcion " + terapeutas[indice3]["descripcion"] ) ;     
    }
    else//Si el indice no se encuentra dentro del rango
    {
        //Ocultar la informacion 
        $("#columna3").attr("style","display: none");
    }

    analizarEstadoBotones(indice1,indice3);

} 


/*Esta funcion busca la informacion de los terapeutas en la base de datos 
Parametros:
Ninguna
Salida: 
Ninguna
*/
function cargarInformacionTerapeutas()
{
	$.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/verTerapeutas.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {}, 
            success: function(response) 
            {
            	terapeutas = JSON.parse( response );//Transforma la respuesta string a json 
            }
    }).done(function() {
        cantidadTerapeutas = Object.keys(terapeutas).length; //Determina la cantidad de terapeutas
        obtenerSiguientesTerapeutas(); //Obtiene los primeros 3 terapeutas
    });	
}

//Cuando termine de cargar la pagina ejectua el codigo 
$(document).ready(function () {

	cargarInformacionTerapeutas();
});


function obtenerSiguientesTerapeutas()
{
    //Pasa a los siguientes 3
    indicesSiguientesTerapeutas[0] += 3;
    indicesSiguientesTerapeutas[1] += 3;
    indicesSiguientesTerapeutas[2] += 3;
    mostrarInformacionTerapeutas();
}

function obtenerAnterioresTerapeutas()
{
    //Regresa a los anteriores 3 
    indicesSiguientesTerapeutas[0] -= 3;
    indicesSiguientesTerapeutas[1] -= 3;
    indicesSiguientesTerapeutas[2] -= 3;
    mostrarInformacionTerapeutas();
}