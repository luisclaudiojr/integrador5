<?php  
echo form_open('competencias/inserir_competencia_colaboradores');
echo validation_errors('<div class="avisos-erro">','</div>'); // imprime o erro na tela

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('mensagem')){
    echo  $this->session->flashdata('mensagem');
    
}

echo '<h3>Marque as competências que você possui:</h3>';
foreach($competencias as $linhas){
    echo form_checkbox(array('name'=>'competencias_id_competencia[]','value'=>"$linhas->id_competencia"));
    echo "$linhas->nome_competencia <br>";
}
$id_login = $this->session->userdata ('id_colaborador');
echo form_hidden('colaboradores_id_colaborador',"$id_login");   

$data = date("Y-m-d H:i:s");
echo form_hidden('data_inserida',"$data ");    


echo form_submit(array('name'=>'Cadastrar','value'=>'Cadastrar','class'=>'btn-amarelo'));
echo anchor("competencias/listar", 'Voltar',' class="btn-azul"');
ECHO'<BR>';
 echo anchor('competencias/criar_competencia', 'Adicionar NOVA Competência', 'class="btn"');
echo	form_close();


