<!DOCTYPE html>
<html>
<head>

<style>
    th{
        font-weight: bold;
        color: #747474;
    }

</style>

</head>
<body class="nav-md">

    <div class="right_col" role="main">
        <div class="row tile_count">
            <div id="content invoice">
                
                <div class="row">
                    <div class="col-xs-12 invoice-header">
                        <h1>
                            <i class="fa fa-cube"></i> OMA Envíos
                        </h1> 
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
                
            </div>      
        </div>
    </div>

</body>
</html>