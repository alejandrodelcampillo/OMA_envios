   function obtenerEnvios(){
      route = myBaseUrl + '/shipments';
     $.ajax({
        url : route,
        type : 'GET',
        dataType : 'json',
      })
     .done(function(data){
      content="";
      for (i=0; i<data.length; i++){
        content += "<tr class = 'even pointer'>" +
                  "<td>"+data[i].Shipment.id +"</td>" + 
                  "<td>"+data[i].User.name+"</td>" + 
                  "<td>"+data[i].Shipment.name_receiver+"</td>" + 
                  "<td>"+data[i].Shipment.phone_receiver+"</td>" + 
                  "<td>"+data[i].ShipmentState.name+"</td>" + 
                  "<td>Bs. "+data[i].Shipment.shipping_cost+"</td>" + 
                  "<td class='last'><a onclick='obtenerEnvio(this)' href='#' value='"+data[i].Shipment.id+"'data-toggle='modal' data-target='#modalShipment'>Ver más</a></td>"
                  +"</tr>";
      }
        
       $('#lista-envios').append(content);
        console.log(data);
     });

  };  

  function obtenerFacturas(){
      route = myBaseUrl + '/admin/lista-facturas';
     $.ajax({
        url : route,
        type : 'GET',
        dataType : 'json',
      })
     .done(function(data){
      content="";
      for (i=0; i<data.length; i++){
        content += "<tr class = 'even pointer'>" +
                  "<td>"+data[i].Company.company.name +"</td>" + 
                  "<td>"+data[i].Shipment.shipping_cost+"</td>" + 
                  +"</tr>";
      }
        
       $('#lista-facturas').append(content);
        console.log(data);
     });

  };

  function obtenerEnvio(elem){
    id= $(elem).attr("value");
    route = myBaseUrl + '/shipments/'+id;
    $.ajax({
        url : route,
        type : 'GET',
        dataType : 'json',
      })
     .done(function(data){
      content= "<li class = 'list-group-item'><strong>Número de guía:</strong> "+data.Shipment.id+"</li>" +
               "<li class = 'list-group-item'><strong>Nombre del destinatario:</strong> "+data.Shipment.name_receiver+"</li>" +
               "<li class = 'list-group-item'><strong>Teléfono del destinatario:</strong> "+data.Shipment.phone_receiver+"</li>" +
               "<li class = 'list-group-item'><strong>Dirección destino:</strong> "+data.Shipment.address+"</li>" +
               "<li class = 'list-group-item'><strong>Cantidad de ítems en paquete:</strong> "+data.Shipment.quantity+"</li>" +
               "<li class = 'list-group-item'><strong>Peso:</strong> "+data.Shipment.weigth+" Kg. </li>" +
               "<li class = 'list-group-item'><strong>Status:</strong> "+data.ShipmentState.name+"</li>"  +
               "<li class = 'list-group-item list-group-item-success'><strong>Monto a pagar:</strong> Bs. "+data.Shipment.shipping_cost+" </li>"+
               "<li class = 'list-group-item'><div class='dropdown'>"+
               "<button class='btn btn-info dropdown-toggle' type='button' data-toggle='dropdown'>Cambiar Status"+
               "<span class='caret'></span></button>"+
               "<ul class='dropdown-menu'>"+
               "<li><a href='/cambiar-status/"+data.Shipment.id+"/1'> Solicitado </a></li>"+
               "<li><a href='/cambiar-status/"+data.Shipment.id+"/2'> En Proceso </a></li>"+
               "<li><a href='/cambiar-status/"+data.Shipment.id+"/3'> Enviado </a></li>"+
               "</ul></div></li>";
       $('#detallesEnvio').empty().append(content);
        console.log(data);
     });
  };

  function obtenerFactura(elem){
// Valores a enviar al servicio del banco
// token 8658263995
// rif_distribuidor 1308250
// rif_comercio (Esta en elem)
// nombre_comercio (Esta en elem)
// ref_factura (npi)
// monto (Esta en elem)
// fecha_plazo (Fecha actual +15 dias)
// fecha_emision (Fecha actual)
    rifDistribuidor = 1308250;
    fecha_emision = fechaEmision();
    //fecha_plazo
    fecha_plazo = fechaPlazo(15);
    //token
    token = 8658263995;
    factura = elem;
    $('#modalBill').modal('show');
    console.log(elem);
    console.log(rifDistribuidor);
    $('#rif_distribuidor').html(rifDistribuidor);
    $('#rif_comercio').html(elem.companies.rif);
    $('#nombre_comercio').html(elem.companies.company_name);
    $('#ref_factura').html(elem.companies.id);
    $('#fecha_emision').html(fecha_emision);
    $('#fecha_plazo').html(fecha_plazo);
  };

  function enviarFactura(){
    console.log(rifDistribuidor);
    $.ajax({
        url : 'https://unibankwebsite.herokuapp.com/empresas/facturas',
        type : 'POST',
        dataType : 'json',
        data: {token: token, rif_distribuidor:rifDistribuidor, rif_comercio:factura.companies.rif, nombre_comercio:factura.companies.company_name, ref_factura:factura.companies.id,monto:factura[0].cost_sum, fecha_plazo:fecha_plazo,fecha_emision:fecha_emision}
      })
     .done(function(data){
        console.log(data.mensaje);
        $("#contentAlerta").removeClass("alert-danger");
        $("#contentAlerta").addClass("alert-success");
        $("#alerta").html(data.mensaje);
        $("#contentAlerta").removeClass("hidden");
        $('#modalBill').modal('hide');
        

     })
     .fail(function(error){
        console.log(error.mensaje);
        
        $("#contentAlerta").removeClass("alert-success");
        $("#contentAlerta").addClass("alert-danger");
        $("#alerta").html(error.mensaje != "" || error.mensaje != null || error.mensaje != "undefined" ? "Ocurrio un error inesperado" :  error.mensaje);
        $("#contentAlerta").removeClass("hidden");
        $('#modalBill').modal('hide');
     });
  };

  function fechaEmision(){
    var f =new Date();
    var dia = f.getDate();
    var mes = f.getMonth() +1;
    var ano = f.getFullYear();

    if (mes < 10){
      mes = "0" + mes;
    }
    if (dia < 10){
      dia = "0" + dia;
    }
    //fecha emision
    var fecha_emision = ano + "-" + mes + "-" + dia; 
    return fecha_emision;
  }

  function fechaPlazo(days){
    milisegundos=parseInt(35*24*60*60*1000);
 
    fecha=new Date();
 
    //Obtenemos los milisegundos desde media noche del 1/1/1970
    tiempo=fecha.getTime();
    //Calculamos los milisegundos sobre la fecha que hay que sumar o restar...
    milisegundos=parseInt(days*24*60*60*1000);
    //Modificamos la fecha actual
    total=fecha.setTime(tiempo+milisegundos);
    day=fecha.getDate();
    month=fecha.getMonth()+1;
    year=fecha.getFullYear();
    
    if (month < 10){
      month = "0" + month;
    }
    if (day < 10){
      day = "0" + day;
    }

    var fecha_plazo = year + "-" + month + "-" + day; 

    return fecha_plazo;
  }

$(document).ready(function(){
  var factura = null;
  var rifDistribuidor = 1308250;
  //fecha emision
  var fecha_emision = fechaEmision();
  //fecha_plazo
  var fecha_plazo = fechaPlazo(15);
  //token
  var token = 8658263995;
  obtenerEnvios();
  obtenerFacturas();
});
 