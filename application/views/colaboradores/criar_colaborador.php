<?php  
$id_login = $this->session->userdata ('id_usuario');



if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo form_open('colaboradores/criar_colaborador');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}
echo '<h2>Preencha seus dados corretamente, para que consiga usar o sistema.</h2>';

echo br(2);
echo form_label('Nome Completo:');
echo form_input(array('name'=>'nome_colaborador'));
echo br(2);
echo form_label('Email:');
echo form_input(array('name'=>'email'));
echo br(2);
echo form_label('Telefone:');
echo form_input(array('name'=>'telefone'));
echo br(2);
echo form_label('Matricula:');
echo form_input(array('name'=>'matricula'));
echo form_label('CPF:');
echo form_input(array('name'=>'cpf','maxlength'=>'11','placeholder'=>'SEM PONTOS'));
echo br(2);
echo form_label('Data_admissão:');
echo form_date(array('name'=>'data_admissao'));
echo br(2);
echo form_label('Curriculum Lattes:');
echo form_input(array('name'=>'link_lattes'));
echo br(2);
echo form_hidden('status_colaborador','0');


echo form_hidden('usuarios_id_usuario',$id_login);

echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));

echo	form_close();

