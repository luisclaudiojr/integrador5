<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h2>MINHAS COMPETÊNCIAS</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('ID ','Competência','Data Inserida','Operacões');

foreach ($competencias as $linha){
    $competencia = strtoupper($linha->nome_competencia);
    $this->table->add_row($linha->id_competencias_colaboradores,$competencia,date("d/m/Y H:i", strtotime($linha->data_inserida)),anchor("competencias/excluir_comp_colaborador/$linha->id_competencias_colaboradores",'Excluir','class="btn"'));

}
    echo $this->table->generate();
    
    
   
       echo anchor('competencias/inserir_competencia_colaboradores', 'Adicionar Competência Colaborador', 'class="btn-amarelo"');

    
