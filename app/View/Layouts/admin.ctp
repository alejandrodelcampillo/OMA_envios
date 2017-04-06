<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        <?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('custom.min');


		echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"> <span>OMA Envíos</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                        	<?php echo $this->Html->image('OMA_logo.png', ['alt' => 'OMA_logo', 'class' => 'img-circle profile_img']); ?>
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido.</span>
                            <h2><?php echo $user['User']['name']." ".$user['User']['last_name']; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <!--  Sidebar Menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menú</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li><a><i class="fa fa-cube"></i> Envíos <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="form.html">Todos</a></li>
                                        <li><a href="form_advanced.html">Pendientes</a></li>
                                        <li><a href="form_advanced.html">Procesados</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-wpforms"></i> Reportes</a></li>
                                <li><a><i class="fa fa-file-text-o"></i> Log</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/ Side Bar -->
                    <!-- menu footer-->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Configuraciones">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Salir" href="/home/logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i>  <?php echo $user['User']['name']." ".$user['User']['last_name']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Perfil</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span>Opciones</span>
                                        </a>
                                    </li>
                                    <li><a href="/home/logout"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <div class="right_col" role="main">
            	<div class="row tile_count">
            		<?php //echo $this->element('sql_dump'); ?>
 				</div>
    		</div>
        </div>
  </div>


<?php 
	echo $this->Html->script('jquery.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('custom.min');
?>
</body>
</html>
