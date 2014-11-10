<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>" />
    
    </head>
    <body class="login">
        
        <?php
         $sessao = $this -> uri -> segment(3);
         if(($sessao=='enviado')){
             
          echo'  <p> <div class="avisos-sucesso" >Email Enviado com Sucesso.</div></p>';
         }else if($sessao=='erro'){
             
           echo'  <div class="avisos-erro" style="width: 200px;display:inline-block">NÃO HÁ EMAIL CADASTRADO PARA RECEBER A SENHA,ENTRE EM CONTATO COM O ADMINISTRADOR.</div>';
         }
        ?>
        
<div class="conteudo">
<img src="<?php echo base_url('img/logo.png'); ?>" height="80px" />
    <?php
   
   
    echo validation_errors('<p>','</p>'); // imprime o erro na tela
    echo form_open('integrador/esqueci_minha_senha');
    echo '<p>Informe os dados abaixo para recuperar sua senha.</p>';
     echo br(2);
     echo form_label('CPF:');
    echo form_input(array('name'=>'cpf'));
    echo br(2);
     echo form_label('Matricula');
    echo form_input(array('name'=>'matricula'));
    echo br(2);
     
    echo form_submit(array('name'=>'Solicitar','value'=>'Solicitar','class'=>'btn-azul'));
    
   echo anchor('integrador','Voltar','class="btn-amarelo"');
    echo    form_close();
    
    ?>
</div>
        
        
        
    </body>
</html>