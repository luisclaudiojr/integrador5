<?php  
echo form_open('competencias/criar_competencia');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}

echo br(2);
echo form_label('Descrição da competência:');

echo form_input(array('name'=>'nome_competencia'));
echo br(2);

echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));
echo anchor("competencias/listar", 'Voltar', ' class="btn-azul"');
echo	form_close();

