<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>" />
    
    </head>
    <body class="login">
        
        <?php
         $sessao = $this -> uri -> segment(3);
         if(($sessao=='incluido')){
             
          echo'  <p> <div class="avisos-sucesso" >Cadastro Efetuado com Sucesso,Logue novamente para ajustarmos seu cadastro</div></p>';
         }
        ?>
        
<div class="conteudo">
<img src="<?php echo base_url('img/logo.png'); ?>" height="80px" />
    <?php
   //TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
    if(($sessao=='sessao')){
        echo '<p><div class="avisos-erro" style="width: 200px;display:inline-block"> SESSÃO EXPIRADA OU NÃO CRIADA, FAÇA LOGIN PARA UTILIZAR O SISTEMA</div></p>';      
    }
    echo validation_errors('<p><div class="avisos-erro" style="width: 200px;display:inline-block">','</div></p>'); // imprime o erro na tela
    echo form_open('integrador/autenticar');
    echo form_label('Login');
    echo form_input(array('name'=>'login'));
    echo br(2);
    echo form_label('Senha');
    echo form_password(array('name'=>'senha'));
    echo br(2);
     echo anchor('integrador/esqueci_minha_senha','Esqueci minha Senha','class="btn-amarelo"');
    echo form_submit(array('name'=>'Entrar','value'=>'Entrar','class'=>'btn-azul'));
    
   
    echo    form_close();
    
    ?>
</div>
        
        
        
    </body>
</html>