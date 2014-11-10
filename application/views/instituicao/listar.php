<?php

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h2>INSTITUICAO</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('ID ',' Nome ','endereço',' Cidade','Estado','Telefone','CNPJ','Operações');

foreach ($instituicao as $linha){
    $this->table->add_row($linha->id_instituicao,$linha->nome_instituicao,$linha->endereco,$linha->cidade,$linha->estado,$linha->telefone,$linha->cnpj,anchor("instituicao/alterar/$linha->id_instituicao",'Editar','class="btn"'));

}
    echo $this->table->generate();

    