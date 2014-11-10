<?php  
echo form_open('formacoes/inserir_formacao_colaboradores');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}
echo form_label('Tipo de Formação');
 $x=1;
foreach ($tipo_formacao as $linha){
   
  $options[$x] = array ("$linha->id_tipo_formacao"  => "$linha->tipo_formacao");
       $x++;          
}                
  
echo form_dropdown('id_tipo_formacao', $options, '1');
echo br(2);

echo form_label('Curso:');
 $x=1;
foreach ($cursos as $linha){
   
  $options[$x] = array ("$linha->id_curso"  => "$linha->nome_curso");
       $x++;          
}                

  
echo form_dropdown('id_curso', $options, '1');
echo '&nbsp;';
echo anchor('formacoes/criar_cursos', '  Adicionar Curso', 'class="btn-amarelo"');
echo br(2);

$id_login = $this->session->userdata ('id_colaborador');
echo form_hidden('colaboradores_id_colaborador',"$id_login");   

$data = date("Y-m-d H:i:s");
echo form_hidden('data_inserida',"$data ");    

echo form_label('Data Ínicio:');
echo form_date(array('name'=>'data_inicio','required'=>'required'));
echo br(2);
echo form_label('Data Termino:');
echo form_date(array('name'=>'data_termino','required'=>'required'));

echo br(2); 
echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));
echo anchor("formacoes/listar", 'Voltar',' class="btn-azul"');
echo	form_close();


