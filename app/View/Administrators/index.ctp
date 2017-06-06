<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-caret-square-o-down"></i>  Solicitudes Recibidas</span>
    <div class="count"><?php echo $envios_solicitados ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-caret-square-o-down"></i>  Solicitudes Procesadas</span>
    <div class="count"><?php echo $envios_enviados ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-caret-square-o-down"></i>  Solicitudes Pendientes</span>
    <div class="count"><?php echo $envios_enproceso ?></div>
</div>
<div class="col-md-3 col-sm-12 col-xs-12">
  <div>
    <div class="x_title">
      <h2>Token para servicifos</h2>

      <div class="clearfix"></div>
    </div>
    <ul class="list-unstyled top_profiles scroll-view">
      <li class="media event">
        <div class="media-body">
          <p class="title">Token</p>
          <p><strong><?php echo $user['User']['token']; ?></strong>
          </p>
        </div>
      </li>
    
    </ul>
  </div>
</div>
    

