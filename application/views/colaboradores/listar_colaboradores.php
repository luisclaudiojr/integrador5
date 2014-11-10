<?php

//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}
echo '<h2>COLABORADORES</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('ID ','NOME','E-MAIL','TELEFONE','MATRICULA','CARGO','Operações');

foreach ($colaboradores as $linha){
    
    $permissao = $linha->permissao;
    
    if($permissao==0){
        $permissao ='Administrador';
    }else if($permissao==1){
        $permissao ='Coordenador';
        
    }else if($permissao==2){
        
        $permissao ='Professor';
    }
    

          $this->table->add_row($linha->id_usuario,$linha->nome_colaborador,$linha->email,$linha->telefone,$linha->matricula,$permissao,anchor("colaboradores/visualizar_colaborador_completo/$linha->id_usuario",'Ver Cadastro Completo','class="btn"'));
        
   
   

   
}
    echo $this->table->generate();
    
      $permissao_login = $this->session->userdata ('permissao_login');
  
     if($permissao_login==0){
       echo anchor('colaboradores/criar_usuario', 'Adicionar Usuario', 'class="btn-amarelo"');
     }
    
