<div class="x_panel" style="">
  <div class="x_title">
    <h2>Facturas</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">


    <div class="well" style="overflow: auto">
      <div class="col-md-3">
        <p>Escoja el rango  de fechas para las facturas</p>
      </div>
      <form action="/admin/lista-facturas" method="POST" class="col-md-3">
        <div class="form-group" >
          <div class="form-group">
            <input type="hidden" id = "firstDate" name="data[firstDate]" >
            <input type="hidden" id="secondDate" name="data[secondDate]" >
            <input type="date" id="primerafecha"  class="form-control ">
          </div>
          <div class="form-group">
            <input type="date" id="segundafecha"  class="form-control">
          </div>
          <button target="_blank" class="btn btn-success pull-right">Ver facturas</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
  echo $this->Html->Script('facturas');
?>