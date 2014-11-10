<?php  
echo form_open('formacoes/criar_cursos');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}

echo br(2);
echo form_label('Descrição do curso:');

echo form_input(array('name'=>'nome_curso'));
echo br(2);

echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));
echo anchor("formacoes/inserir_formacao_colaboradores", 'Voltar', 'class="btn-azul"');
echo	form_close();

