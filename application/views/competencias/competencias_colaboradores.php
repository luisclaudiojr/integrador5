<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
   foreach ($competencia as $linha){
     $nome_competencia=$linha->nome_competencia;
   }
     
echo "<h2>COLABORADORES QUE POSSUEM A COMPETÊNCIA: $nome_competencia</h2>";
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('NOME DO COLABORADOR','DATA INSERIDA','OPERAÇÕES');

foreach ($colaboradores as $linha2){
    $this->table->add_row($linha2->nome_colaborador,date("d/m/Y H:i", strtotime($linha2->data_inserida)),anchor("colaboradores/visualizar_colaborador_completo/$linha2->usuarios_id_usuario", 'Ver Perfil Colaborador', 'class="btn"'));

}
    echo $this->table->generate();
    
   
echo anchor('competencias/mapeamento', 'Voltar', 'class="btn-amarelo"');

    
