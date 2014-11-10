<?php  

if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo form_open('colaboradores/criar_usuario');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}

echo br(2);
echo form_label('Usuario:');
echo form_input(array('name'=>'usuario'));
echo br(2);
echo form_label('Senha:');

echo form_password(array('name'=>'senha'));
echo br(2);
echo form_label('Confirma a Senha:');
echo form_password(array('name'=>'senha2'));
echo br(2);

echo form_label('Permissão');
    
    $options = array(
                      '0'  => 'Administrador',
                      '1'    => 'Coordenador',
                      '2'   => 'Professor',
                     
                    );
                    
    echo form_dropdown('permissao', $options, '2');
echo br(2);

echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));
echo anchor("colaboradores/listar_usuario", 'Voltar', ' class="btn-azul"');
echo	form_close();

