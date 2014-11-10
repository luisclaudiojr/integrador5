<?php  

$segmento=$this->session->userdata ('id_colaborador');

$query = $this -> colaboradores -> get_conta()->row();
echo form_open("colaboradores/conta");
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('edicaook')){
    echo '<p>'. $this->session->flashdata('edicaook').'</p>';
    
}
              
    
echo form_label('Nome Completo:');
echo form_input(array('name'=>'nome_colaborador'),set_value('nome_colaborador',$query->nome_colaborador));
echo br(2);
echo form_label('Email:');
echo form_input(array('name'=>'email'),set_value('email',$query->email));
echo br(2);
echo form_label('Telefone:');
echo form_input(array('name'=>'telefone'),set_value('telefone',$query->telefone));
echo br(2);
echo form_label('Matricula:');
echo form_input(array('name'=>'matricula','disabled'=>'true'),set_value('matricula',$query->matricula));
echo br(2);
echo form_label('CPF:');
echo form_input(array('name'=>'cpf','disabled'=>'true'),set_value('cpf',$query->cpf));
echo br(2);
echo form_label('Data_admissão:');
echo form_date(array('name'=>'data_admissao'),set_value('data_admissao',$query->data_admissao));
echo br(2);
echo form_label('Curriculum Lattes:');
echo form_input(array('name'=>'link_lattes'),set_value('link_lattes',$query->link_lattes));
echo br(2);  


//é feito isso pra ter certeza que vai pegar o id correto.
echo form_hidden('id_colaborador',$segmento);            
      
echo form_submit(array('name'=>'Cadastrar','value'=>'Alterar Cadastro','class'=>'btn-amarelo'));
echo anchor("colaboradores/alterar_senha", 'Alterar Senha', ' class="btn-azul"');
echo    form_close();


