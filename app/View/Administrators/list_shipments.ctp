<h3>Lista de Envíos</h3>
<p>Pronto estará disponible el filtro a través de búsqueda.</p>
<div class="x_content">
<div class="table-responsive">
  <table class="table table-striped jambo_table">
    <thead>
      <tr class="headings">
        <th class="column-title">#Guía </th>
        <th class="column-title">Responsable</th>
        <th class="column-title">Destinatario</th>
        <th class="column-title">Teléfono</th>
        <th class="column-title">Status</th>
        <th class="column-title">Monto s cobrar </th>
        <th class="column-title no-link last"><span class="nobr">Info</span>
        </th>
      </tr>
    </thead>
    <tbody id ="lista-envios">      
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="modalShipment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles del Envío</h4>
      </div>
      <div class="modal-body">
      <ul id="detallesEnvio" class="list-group">
        
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-oma" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
echo $this->Html->script('script');
?>