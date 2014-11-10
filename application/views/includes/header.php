<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title><?php echo $titulo_pagina?></title>
		<meta name="description" content="" />
		<meta name="author" content="junior" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo base_url('css/table_jui.css'); ?>"/> 
       
		<script type="text/javascript" src="<?php echo base_url('js/jquery.mim.js'); ?> "></script>
        <script type="text/javascript" src=" <?php echo base_url('js/jquery-ui-1.10.3.custom.min.js'); ?> "></script>
        
        <script type="text/javascript" src=" <?php echo base_url('js/jquery.dataTables.min.js'); ?> "></script>
        <script type="text/javascript">
        $(document).ready(function() {
            oTable = $('#tabela').dataTable({
                "bPaginate": false,
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });
        });
        </script>
	</head>
	
	   <body>
	       <div class='conteudo'>
	           
	       <div class="titulo-da-pagina">
            <h1><?php echo $titulo_pagina?></h1>
            <div class="opcoes">
                <a href="<?php echo base_url('integrador/logout'); ?>" class="btn">Sair</a>
            </div>
        </div>
        