<!DOCTYPE HTML>
<html lang="es">
<head>
    <title>.:SSZ Consulta de Derechohabientes:.</title>
    <!-- JQUERY -->
    <script type="text/javascript" src="<?php echo base_url('js/jquery.js') ?>"></script>
    
    <!-- LIBRERIA PERSONAL -->
    <script type="text/javascript" src="<?php echo base_url('js/busqueda.js') ?>"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/css/font-awesome.css') ?>" rel="stylesheet" />
    
    <style type="text/css">
<!--
	.jumbotron {
	   background-image: url('../img/textura.jpg');
       box-shadow: 5px 5px 10px grey;
	}
-->
</style>
</head>
<body>
<div class="container">
    <form role="form form-inline">
        <div class="jumbotron"><h1 class="page-header text-center">Consulta de Derechohabientes</h1>
        
        <div class="form-group col-xs-3">
            <label for="curp">CURP:</label>
            <?php echo form_input('curp','','id="curp" class="form-control" placeholder="Introduce un CURP"'); ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="paterno">APELLIDO PATERNO:</label>
            <?php echo form_input('paterno','','id="paterno" class="form-control" placeholder="Introduce un Apellido"'); ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="materno">APELLIDO MATERNO:</label>
            <?php echo form_input('materno','','id="materno" class="form-control" placeholder="Introduce un Apellido"'); ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="nombre">NOMBRE:</label>
            <?php echo form_input('nombre','','id="nombre" class="form-control" placeholder="Introduce un Nombre"'); ?>
        </div>
        <div class="form-group col-xs-offset-4 col-xs-4">
            <?php echo form_button('','BUSCAR','onclick="buscar()" id="btn_buscar" class="form-control btn btn-danger"') ?>
        </div></div>
        
    </form>
    <div id="buscando" class="text-center"><?php echo img('/img/loading.gif') ?><h1>Buscando...</h1></div>
    
</div>
<div id="resultado" class="col-xs-12"></div>
</body>
</html>
