<?php

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h1>ÚLTIMAS ATUALIZAÇÕES</h1>';

ECHO br(4);

echo '<h2>COMPETÊNCIAS:</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );

$this->table->set_heading(' Colaborador ','Competência inserida','Data');

foreach ($atualizacoes_competencias as $linha){
    $this->table->add_row($linha->nome_colaborador,$linha->nome_competencia,date("d/m/Y H:i", strtotime($linha->data_inserida)));

}
    echo $this->table->generate();
    
    echo '<h2>FORMACÕES:</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );

$this->table->set_heading(' Colaborador ','Tipo','Curso','Data Inicio','Data Termino','Data Inserida');

foreach ($atualizacoes_formacoes as $linha2){
    $this->table->add_row($linha2->nome_colaborador,$linha2->tipo_formacao,$linha2->nome_curso,date("d/m/Y H:i", strtotime($linha2->data_inicio)),date("d/m/Y H:i", strtotime($linha2->data_termino)), date("d/m/Y H:i", strtotime($linha2->data_inserida)));

}
    echo $this->table->generate();
    




    