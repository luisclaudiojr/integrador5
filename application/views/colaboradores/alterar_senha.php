<?php  

   if ($this -> uri -> segment(3)) {
       
       $segmento =  $this -> uri -> segment(3);
       
       echo form_open("colaboradores/alterar_senha/$segmento");
   }else{
       
        echo form_open("colaboradores/alterar_senha/");
   }

echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('edicaook')){
    echo '<p>'. $this->session->flashdata('edicaook').'</p>';
    
}
   foreach ($colaborador as $linha){
       
      echo '<h3>Usuario:'.$linha->usuario.'</h3>';  
       
   }
             
  
echo br(2);
echo form_label('Senha:');
echo form_password(array('name'=>'senha'));
echo br(2);
echo form_label('Confirma a Senha');
echo form_password(array('name'=>'senha2'));
echo br(2);



echo form_submit(array('name'=>'Cadastrar','value'=>'Alterar Cadastro','class'=>'btn-amarelo'));


echo    form_close();


