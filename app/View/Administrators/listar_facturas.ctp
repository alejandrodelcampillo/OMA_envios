<h3>Lista Facturas</h3>
<p>Pronto estará disponible el filtro a través de búsqueda.</p>
<div class="x_content">
<div id="contentAlerta" class="alert alert-success hidden">
  <span id="alerta"></span>
</div>
<div class="table-responsive">
  <table class="table table-striped jambo_table">
    <thead>
      <tr class="headings">
        <th class="column-title">Company </th>
        <th class="column-title">Cost shipments</th>
        
        <th class="column-title no-link last"><span class="nobr">Factura</span>
        </th>
      </tr>
    </thead>
    <tbody id ="lista-facturas">  
      <?php foreach ($companies as $compania) {?>
        <tr>
         <td><?php echo $compania['companies']['company_name']; ?></td>
         <td><?php echo $compania[0]['cost_sum']; ?></td>
         <td class='last'><?php echo "<a onclick='obtenerFactura(".json_encode($compania).")' href='#'>Ver más</a>"; ?> </td> 
      <?php } ;?> 
        <!-- td class='last'><a onclick='obtenerEnvio(this)' href='#' value='"+data[i].Shipment.id+"'data-toggle='modal' data-target='#modalShipment'>Ver más</a></td>  -->
        </tr> 
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="modalBill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de Factura</h4>
      </div>
      <div class="modal-body">
      <ul id="detallesEnvio" class="list-group">
        <li class = 'list-group-item'><strong>Rif Distribudor: </strong><span id="rif_distribuidor"></span></li>
        <li class = 'list-group-item'><strong>Rif Comercio: </strong><span id="rif_comercio"></span></li>
        <li class = 'list-group-item'><strong>Nombre del comercio: </strong><span id="nombre_comercio"></span></li>
        <li class = 'list-group-item'><strong>referencia de factura: </strong><span id="ref_factura"></span></li>
        <li class = 'list-group-item'><strong>Fecha Emision: </strong><span id="fecha_emision"></span></li>
        <li class = 'list-group-item'><strong>Fecha Plazo: </strong><span id="fecha_plazo"></span></li>

      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-oma" onclick="enviarFactura()">Enviar Factura</button>
        <button type="button" class="btn btn-oma" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php
echo $this->Html->script('script');
?>