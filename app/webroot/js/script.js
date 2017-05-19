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
                  "<td>"+data[i].Shipment.status+"</td>" + 
                  "<td>Bs. "+data[i].Shipment.shipping_cost+"</td>" + 
                  "<td class='last'><a onclick='obtenerEnvio(this)' href='#' value='"+data[i].Shipment.id+"'data-toggle='modal' data-target='#modalShipment'>Ver más</a></td>"
                  +"</tr>";
      }
        
       $('#lista-envios').append(content);
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
               "<li class = 'list-group-item'><strong>Dirección destino:</strong> "+data.Shipment.Dest_address+"</li>" +
               "<li class = 'list-group-item'><strong>Cantidad de ítems en paquete:</strong> "+data.Shipment.quantity+"</li>" +
               "<li class = 'list-group-item'><strong>Peso:</strong> "+data.Shipment.weigth+" Kg. </li>" +
               "<li class = 'list-group-item'><strong>Status:</strong> "+data.Shipment.status+"</li>"  +
               "<li class = 'list-group-item list-group-item-success'><strong>Monto a pagar:</strong> Bs. "+data.Shipment.shipping_cost+" </li>";
       $('#detallesEnvio').empty().append(content);
        console.log(data);
     });
  };

$(document).ready(function(){
  obtenerEnvios();
});
 