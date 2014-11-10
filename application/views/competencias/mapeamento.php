<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h2>MAPEAMENTO DE COMPETÊNCIAS</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    
$this->table->set_heading('Competência','NÚMERO DE COLABORADORES','Operacões');

foreach ($competencias as $linha){
    $competencia = strtoupper($linha->nome_competencia);
    $this->table->add_row($competencia,$linha->teste,anchor("competencias/competencias_colaboradores/$linha->competencias_id_competencia",'Ver Colaboradores','class="btn"'));

}
    echo $this->table->generate();
    
$x=0;
echo '<h2>COMPETÊNCIAS SEM COLABORADORES</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );

$this->table->set_heading('Competência','Operações');

foreach ($competencias_semcolaborador as $linha2){
     $competencia2 = strtoupper($linha2->nome_competencia);
    $this->table->add_row($competencia2,anchor("competencias/excluir_competencia/$linha2->id_competencia",'Excluir Competência','class="btn"'));
$x++;
}
if($x==0){
    $this->table->add_row('NÃO HÁ COMPETÊNCIAS SEM COLABORADORES');
}
    echo $this->table->generate();
     
    
    
   
      
