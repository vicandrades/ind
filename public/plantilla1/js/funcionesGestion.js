
 function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function registrarEdificio() {
             var nombre =document.getElementById("nombre").value;
                if(nombre != "")
            {
                 var parametros = {
                  "nombre" : nombre
                };
                swal({
            title: "¿Desea realmente registrar el edificio?",
            text: "de nombre "+nombre,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si, Registrar!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
      },
function(){
        sleep(2000).then(() => { 
         $.ajax({
              url: 'http://localhost/ind/registro/registrarEdificio',//action del formulario, ej:
              //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: 'post',//el método post o get del formulario
              data: parametros,
            error: function(){
            //si hay un error mostramos un mensaje
             },
              success:function(data){
               
                if(data==0)
                {
                swal({
                  title: 'Se ha registrado satisfactoriamente',
                  type: "success"});
                 $('#myModal').modal('hide');
                 refrescarlistaEdf();
              }
              else
              {
                 swal({
                  title: 'Error al procesar solicitud',
                  type: "error"});
              }
            }
                   // Do something after the sleep!
            });           
                    //hacemos algo cuando finalice todo correctamen     
         });
     });

            }
            else {
               swal({
                  title: 'Debe escribir un nombre',
                  type: "error"});
            }

          }  

          function registrarPiso() {
             var nombre =document.getElementById("nombrePiso").value;
             var edificio =document.getElementById("edificio").value;
                if(nombre != "" && edificio != 0)
            {
                 var parametros = {
                  "nombre" : nombre,
                  "edificio" : edificio
                };
                swal({
            title: "¿Desea realmente registrar el piso?",
            text: "de nombre "+nombre,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si, Registrar!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
      },
function(){
        sleep(2000).then(() => { 
         $.ajax({
              url: 'http://localhost/ind/registro/registrarPiso',//action del formulario, ej:
              //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: 'post',//el método post o get del formulario
              data: parametros,
            error: function(){
            //si hay un error mostramos un mensaje
             },
              success:function(data){
               
                if(data==0)
                {
                swal({
                  title: 'Se ha registrado satisfactoriamente',
                  type: "success"});
                 $('#myModal2').modal('hide');
              }
              else
              {
                 swal({
                  title: 'Error al procesar solicitud',
                  type: "error"});
              }
            }
                   // Do something after the sleep!
            });           
                    //hacemos algo cuando finalice todo correctamen     
         });
     });

            }
            else {
               swal({
                  title: 'Debe escribir un nombre y seleccionar un edificio valido',
                  type: "error"});
            }

          }  

           function registrarHabitacion() {
             var nombre =document.getElementById("nombreHabitacion").value;
             var piso =document.getElementById("piso").value;
                if(nombre != "" && piso != 0)
            {
                 var parametros = {
                  "nombre" : nombre,
                  "piso" : piso
                };
                swal({
            title: "¿Desea realmente registrar la habitacion?",
            text: "de nombre "+nombre,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si, Registrar!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
      },
function(){
        sleep(2000).then(() => { 
         $.ajax({
              url: 'http://localhost/ind/registro/registrarHabitacion',//action del formulario, ej:
              //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: 'post',//el método post o get del formulario
              data: parametros,
            error: function(){
            //si hay un error mostramos un mensaje
             },
              success:function(data){
               
                if(data==0)
                {
                swal({
                  title: 'Se ha registrado satisfactoriamente',
                  type: "success"});
                 $('#myModal3').modal('hide');
              }
              else
              {
                 swal({
                  title: 'Error al procesar solicitud',
                  type: "error"});
              }
            }
                   // Do something after the sleep!
            });           
                    //hacemos algo cuando finalice todo correctamen     
         });
     });

            }
            else {
               swal({
                  title: 'Debe escribir un nombre y seleccionar un piso valido',
                  type: "error"});
            }

          }  

           function registrarCama() {
             var nombre =document.getElementById("nombreCama").value;
             var habitacion =document.getElementById("habitacion").value;
                if(nombre != "" && habitacion != 0)
            {
                 var parametros = {
                  "nombre" : nombre,
                  "habitacion" : habitacion
                };
                swal({
            title: "¿Desea realmente registrar la cama?",
            text: "de nombre "+nombre,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si, Registrar!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
      },
function(){
        sleep(2000).then(() => { 
         $.ajax({
              url: 'http://localhost/ind/registro/registrarCama',//action del formulario, ej:
              //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: 'post',//el método post o get del formulario
              data: parametros,
            error: function(){
            //si hay un error mostramos un mensaje
             },
              success:function(data){
               
                if(data==0)
                {
                swal({
                  title: 'Se ha registrado satisfactoriamente',
                  type: "success"});
                 $('#myModal4').modal('hide');
              }
              else
              {
                 swal({
                  title: 'Error al procesar solicitud',
                  type: "error"});
              }
            }
                   // Do something after the sleep!
            });           
                    //hacemos algo cuando finalice todo correctamen     
         });
     });

            }
            else {
               swal({
                  title: 'Debe escribir un nombre y seleccionar una habitación valida',
                  type: "error"});
            }

          }  

          function registrarDisciplina() {
             var nombre =document.getElementById("disciplina").value;
                if(nombre != "")
            {
                 var parametros = {
                  "nombre" : nombre
                };
                swal({
            title: "¿Desea realmente registrar la disciplina?",
            text: "de nombre "+nombre,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si, Registrar!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
      },
function(){
        sleep(2000).then(() => { 
         $.ajax({
              url: 'http://localhost/ind/registro/registrarDisciplina',//action del formulario, ej:
              //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: 'post',//el método post o get del formulario
              data: parametros,
            error: function(){
            //si hay un error mostramos un mensaje
             },
              success:function(data){
               
                if(data==0)
                {
                swal({
                  title: 'Se ha registrado satisfactoriamente',
                  type: "success"});
                 $('#myModal5').modal('hide');
                 //refrescarlistaEdf();
              }
              else
              {
                 swal({
                  title: 'Error al procesar solicitud',
                  type: "error"});
              }
            }
                   // Do something after the sleep!
            });           
                    //hacemos algo cuando finalice todo correctamen     
         });
     });

            }
            else {
               swal({
                  title: 'Debe escribir un nombre',
                  type: "error"});
            }

          }  

      $("#myModal").on('hidden.bs.modal', function () {
           $("#edificio").val('0');
           $("#edificioH").val('0');
           $("#edificioC").val('0');
           $("#piso").val('0');
           $("#pisoC").val('0');
           $("#habitacion").val('0');
    });

    $("#myModal2").on('hidden.bs.modal', function () {
           $("#edificio").val('0');
           $("#edificioH").val('0');
           $("#edificioC").val('0');
           $("#piso").val('0');
           $("#pisoC").val('0');
           $("#habitacion").val('0');
    });

      $("#myModal3").on('hidden.bs.modal', function () {
           $("#edificio").val('0');
           $("#edificioH").val('0');
           $("#edificioC").val('0');
           $("#piso").val('0');
           $("#pisoC").val('0');
           $("#habitacion").val('0');
    });

      $("#myModal4").on('hidden.bs.modal', function () {
           $("#edificio").val('0');
           $("#edificioH").val('0');
           $("#edificioC").val('0');
           $("#piso").val('0');
           $("#pisoC").val('0');
           $("#habitacion").val('0');
    });

       $("#myModal5").on('hidden.bs.modal', function () {
           $("#edificio").val('0');
           $("#edificioH").val('0');
           $("#edificioC").val('0');
           $("#piso").val('0');
           $("#pisoC").val('0');
           $("#habitacion").val('0');
    });

          function refrescarlistaEdf() 
          {
               $("#edificioH").empty();
               $("#edificioC").empty();
               $("#edificio").empty();
                $.post('http://localhost/ind/registro/edificio').done( function(respuesta)
                    {
                       //alert(JSON.stringify(respuesta));
                           var value='0';
                           var SELECCIONE = 'SELECCIONE';
                           $("#edificio").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                           $("#edificioH").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                           $("#edificioC").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                           $.each(respuesta, function(k,v){
                            if(v['estatus']==0)
                            {
                              $("#edificio").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
                              $("#edificioH").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
                              $("#edificioC").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
                            }
                            else
                            {
                              $("#edificio").append("<option value=\""+v['id']+"\"disabled>"+v['edificio']+"</option>");
                              $("#edificioH").append("<option value=\""+v['id']+"\"disabled>"+v['edificio']+"</option>");
                              $("#edificioC").append("<option value=\""+v['id']+"\"disabled>"+v['edificio']+"</option>");
                            }
                           });  
                    });
          }

          function tablapersona() {
        $.post( 'http://localhost/ind/registro/listarPersonas').done( function( data )
          {
            //alert(JSON.stringify(data));
            $('#tablapersona').dataTable( {
                "destroy": true,
                data : data,
                  "language": {
              "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        }},
                columns: [
                    {"data" : "nombre"},
                    {"data" : "apellido"},
                    {"data" : "fecha_nacimiento"},
                    {"data" : "cedula"},
                    {"data" : "sexo"},
                    {"data" : "disciplina"},
                    {"data" : "tipo_persona"}                 
                ],
            });
           
                
          });

          }  


$(function(){

    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
    
	$(document).ready(function() {
        tablapersona();
} ); 


  


                        
    })

 $('#edificioH').change(function()
        {
                    var edificio = $(this).val();
                    $("#piso").empty();
                          $.post('http://localhost/ind/registro/piso',{id:edificio}).done( function(respuesta)
            {
               //alert(JSON.stringify(respuesta));
                   var value='0';
                   var SELECCIONE = 'SELECCIONE';
                   $("#piso").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                   $.each(respuesta, function(k,v){
                    if(v['estatus']==0)
                    {
                      $("#piso").append("<option value=\""+v['id']+"\">"+v['nombre_piso']+"</option>");
                    }
                    else
                    {
                      $("#piso").append("<option value=\""+v['id']+"\"disabled>"+v['nombre_piso']+"</option>");
                    }
                   });  
            });
  });

  $('#edificioC').change(function()
        {
                    var edificio = $(this).val();
                    $("#pisoC").empty();
                          $.post('http://localhost/ind/registro/piso',{id:edificio}).done( function(respuesta)
            {
               //alert(JSON.stringify(respuesta));
                   var value='0';
                   var SELECCIONE = 'SELECCIONE';
                   $("#pisoC").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                   $.each(respuesta, function(k,v){
                    if(v['estatus']==0)
                    {
                      $("#pisoC").append("<option value=\""+v['id']+"\">"+v['nombre_piso']+"</option>");
                    }
                    else
                    {
                      $("#pisoC").append("<option value=\""+v['id']+"\"disabled>"+v['nombre_piso']+"</option>");
                    }
                   });  
            });
  });

    $('#pisoC').change(function()
        {
                    var piso = $(this).val();
                    $("#habitacion").empty();
                          $.post('http://localhost/ind/registro/habitacion',{id:piso}).done( function(respuesta)
            {
               //alert(JSON.stringify(respuesta));
                   var value='0';
                   var SELECCIONE = 'SELECCIONE';
                   $("#habitacion").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
                   $.each(respuesta, function(k,v){
                    if(v['estatus']==0)
                    {
                      $("#habitacion").append("<option value=\""+v['id']+"\">"+v['habitacion']+"</option>");
                    }
                    else
                    {
                      $("#habitacion").append("<option value=\""+v['id']+"\"disabled>"+v['habitacion']+"</option>");
                    }
                   });  
            });
  });


//////////////////////////////////////////////listados///////////////////////////////////////////////////////////
	$.post('http://localhost/ind/registro/sexo').done( function(respuesta)
	{
		 //alert(JSON.stringify(respuesta));
         var value='0';
         var SELECCIONE = 'SELECCIONE';
         $("#sexo").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $.each(respuesta, function(k,v){
            $("#sexo").append("<option value=\""+v['id']+"\">"+v['sexo']+"</option>");
         });	
	});

 
  $.post('http://localhost/ind/registro/edificio').done( function(respuesta)
  {
     //alert(JSON.stringify(respuesta));
         var value='0';
         var SELECCIONE = 'SELECCIONE';
         $("#edificio").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $("#edificioH").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $("#edificioC").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $.each(respuesta, function(k,v){
          if(v['estatus']==0)
          {
            $("#edificio").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
            $("#edificioH").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
            $("#edificioC").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
          }
          else
          {
            $("#edificio").append("<option value=\""+v['id']+"\"disabled>"+v['edificio']+"</option>");
            $("#edificioH").append("<option value=\""+v['id']+"\"disabled>"+v['edificio']+"</option>");
            $("#edificioC").append("<option value=\""+v['id']+"\">"+v['edificio']+"</option>");
          }
         });  
  });


    $.post('http://localhost/ind/registro/disciplina').done( function(respuesta)
  {
     //alert(JSON.stringify(respuesta));
         var value='0';
         var SELECCIONE = 'SELECCIONE';
         $("#disciplina").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $.each(respuesta, function(k,v){
            $("#disciplina").append("<option value=\""+v['id']+"\">"+v['disciplina']+"</option>");
         });  
  });




        $.post('http://localhost/ind/registro/tipo_persona').done( function(respuesta)
    {
         //alert(JSON.stringify(respuesta));
         var value='0';
         var SELECCIONE = 'SELECCIONE';
         $("#tipo").append("<option value=\""+value+"\">"+SELECCIONE+"</option>");
         $.each(respuesta, function(k,v){
            $("#tipo").append("<option value=\""+v['id']+"\">"+v['tipo_persona']+"</option>");
         });    
    });


///////////////////////////////////////////////////////listados////////////////////////////////////////////////
function soloNumeros(e) 
{ 
var key = window.Event ? e.which : e.keyCode 
return ((key >= 48 && key <= 57) || (key==8)) 
}

       $('#tipo').change(function()
        {
          var tipo =document.getElementById("tipo").value;
          if(tipo==1 || tipo==6)
          {
            $("#divdisciplina").fadeIn(); 
          }
          else
          {
            $("#divdisciplina").fadeOut();            
          }
          // Lista de Paises
   //importante      
        });


 $(function(){
            $("#registrar").on("submit", function(e){
            e.preventDefault();
             
             var sexo =document.getElementById("sexo").value;
             var tipo =document.getElementById("tipo").value;
             var disciplina =document.getElementById("disciplina").value;
            if(sexo != 0 && tipo != 0)
            {

                      if(((tipo==1 || tipo==6) && disciplina != 0) || (tipo!=1 && tipo!=6))
                      {

                              var data = $('#registrar').serialize();

                              //alert('Datos serializados: '+data);

                          $.ajax({
                              type: "POST",
                              url: "http://localhost/ind/registro/registrarPersona",
                              data: data
                            })  .done(function(res){
                                if(res=0)
                                {   
                                  swal({
                                    title: "Registrado satisfactoriamente",
                                    text: res,
                                    type: "success",
                                    confirmButtonText: "Aceptar"
                                  });
                                }
                                else
                                {
                                    swal({
                                    title: 'Error al procesar solicitud',
                                    type: "error"});
                                }

                            });
                  }
                  else
                  {
                          swal({
                        title: "Error",
                        text: "Debe seleccionar una disciplina",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
            }
          }
          else
                  {
                        swal({
                        title: "Error",
                        text: "Debe seleccionar sexo y tipo_persona",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
            }
          }); 
          });     

function listarplanes(idhotel)
            {
               
            // var el_nombre =document.getElementById("nombre").value;
            // document.hotel.nombre.value=el_nombre;
        
             var parametros = {
                    "hotel" : idhotel
                };
                 swal({
            title: "¿Desea listar planes disponibles?",
            //text: "para este horario:"+fechai+" a "+fechaf,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si!",
            closeOnConfirm: true,
      },
function(){

             $.ajax({
                    url: 'http://localhost/ind/persona/listarplanes',//action del formulario, ej:
                    //http://localhost/mi_proyecto/mi_controlador/mi_funcion
                    type: 'post',//el método post o get del formulario
                    data: parametros,//obtenemos todos los datos del formulario
                    datatype: 'json',
                    error: function(){
                    alert('error');
                     },
                    success:function(data){
                $('#myModal').modal('show');
                $('#tabla3').dataTable().fnDestroy();
                //$("#tbodyr").empty().html(data);
                $(document).ready(function() {
     //jQuery.noConflict();
 $('#tabla3').dataTable( {
                "destroy": true,
                data : data,
                  "language": {
              "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        }},
                columns: [
                    {"data" : "nombre"},
                    {"data" : "descripcion"},
                    {"data" : "precio"},
                    {"data" : "fecha_persona"},
                    {"data" : "valor"},
                    {"data" : "frecuencia"},
                    {"data" : "opciones"}            
                ],
            });
} );
                 $('[data-toggle="popover"]').popover(); 
              }
            //}
                   // Do something after the sleep!
            });                     
                            //hacemos algo cuando finalice todo correctamen         
     });

             }

function asignarplan(idhotel,idplan)
            {
               
            // var el_nombre =document.getElementById("nombre").value;
            // document.hotel.nombre.value=el_nombre;
          
             var parametros = {
                    "hotel" : idhotel,
                    "plan" : idplan
                };
                 swal({
            title: "¿Desea asignar plan?",
            //text: "para este horario:"+fechai+" a "+fechaf,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si!",
            closeOnConfirm: true,
      },
function(){

             $.ajax({
                    url: 'http://localhost/ind/persona/asignarplanes',//action del formulario, ej:
                    //http://localhost/mi_proyecto/mi_controlador/mi_funcion
                    type: 'post',//el método post o get del formulario
                    data: parametros,//obtenemos todos los datos del formulario
                    datatype: 'json',
                    error: function(){
                    alert('error');
                     },
                    success:function(data){
                       tablahotel(); 
                       correcto(); 
                       /*swal({
                  title: 'Plan Asignado',
                  type: "success",
                  confirmButtonText: "!Si!",
              closeOnConfirm: true});*/    

              }


            //}
                   // Do something after the sleep!
            });                   
                            //hacemos algo cuando finalice todo correctamen         
     });    
                   
             }

             function actualizarplan(idplan)
            {
               
            // var el_nombre =document.getElementById("nombre").value;
            // document.hotel.nombre.value=el_nombre;
          
             var parametros = {
                    "plan" : idplan
                };
                 swal({
            title: "¿Desea actualizar el plan?",
            //text: "para este horario:"+fechai+" a "+fechaf,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#7DB4D0",
            confirmButtonText: "!Si!",
            closeOnConfirm: true,
      },
function(){

             $.ajax({
                    url: 'http://localhost/ind/persona/cargarplan',//action del formulario, ej:
                    //http://localhost/mi_proyecto/mi_controlador/mi_funcion
                    type: 'post',//el método post o get del formulario
                    data: parametros,//obtenemos todos los datos del formulario
                    datatype: 'json',
                    error: function(){
                    alert('error');
                     },
                    success:function(data){
                        //alert(JSON.stringify(data));
                        $('#myModalplan').modal('show');  
                        document.planes.nombre.value=data.nombre;
                        document.planes.descripcion.value=data.descripcion;
                        document.planes.monto.value=data.monto;

              }


            //}
                   // Do something after the sleep!
            });                   
                            //hacemos algo cuando finalice todo correctamen         
     });    
                   
             }

