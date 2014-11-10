<?php  

if($segmento==NULL ){
redirect('instituicao/listar');
}

$query = $this->instituicao->get_byId($segmento)->row();


echo form_open("instituicao/alterar/$segmento");
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('edicaook')){
    echo '<p>'. $this->session->flashdata('edicaook').'</p>';
    
}
              
    
echo br(2);
echo form_label('Nome da Instituição');
echo form_input(array('name'=>'nome_instituicao'),set_value('nome_instituicao',$query->nome_instituicao));
echo br(2);
echo form_label('Endereço');
echo form_input(array('name'=>'endereco'),set_value('endereco',$query->endereco));
echo br(2);
echo form_label('Cidade');
echo form_input(array('name'=>'cidade'),set_value('cidade',$query->cidade));
echo form_label('Estado');
echo form_input(array('name'=>'estado'),set_value('estado',$query->estado));
echo br(2);
 echo form_label('Telefone');
echo form_input(array('name'=>'telefone'),set_value('telefone',$query->telefone)); 
echo br(2);
echo form_label('CNPJ');
echo form_input(array('name'=>'cnpj'),set_value('cnpj',$query->cnpj));
echo br(2);

echo form_label('Quantos meses o colaborador pode ficar sem atualizar o sistema?');
echo form_input(array('name'=>'tempo_sem_atualizar'),set_value('tempo_sem_atualizar',$query->tempo_sem_atualizar));

echo br(2);
echo form_hidden('status','P');     


//é feito isso pra ter certeza que vai pegar o id correto.
echo form_hidden('id_instituicao',$query->id_instituicao);            
      
echo form_submit(array('name'=>'Cadastrar','value'=>'Alterar Cadastro','class'=>'btn-amarelo'));
echo anchor("instituicao/listar", 'Voltar', ' class="btn-azul"');
echo    form_close();


