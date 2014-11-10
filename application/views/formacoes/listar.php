<?php

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h2>MINHAS FORMAÇÕES</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('ID ','Tipo','Curso','Data Inicio','Data Término','Operacões');

foreach ($formacoes as $linha){
    $this->table->add_row($linha->id_formacoes_colaboradores,$linha->tipo_formacao,$linha->nome_curso,date("d/m/Y", strtotime($linha->data_inicio)),date("d/m/Y ", strtotime($linha->data_termino)),anchor("formacoes/excluir/$linha->id_formacoes_colaboradores",'Excluir','class="btn"'));

}
    echo $this->table->generate();
    
    
      
       echo anchor('formacoes/inserir_formacao_colaboradores', 'Adicionar Formação Colaborador', 'class="btn-amarelo"');

    
