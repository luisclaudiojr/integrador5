<?php
$a = 0;
$b = 0;
$c = 0;
//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}

$permissao = $this->session->userdata ('permissao_login');


    echo '<h2>COLABORADOR</h2>';
     $template =  array (
                        'table_open'          => '<table class="data-table" id="tabela">'
                        ,
        );
        $this->table->set_template($template);
        
      if($permissao==2){  
            $this->table->set_heading('NOME ','TELEFONE','MATRICULA','EMAIL','DATA ADMISSÃO','LINK LATTES');
            
               foreach ($colaboradores as $linha2){
                    
                $this->table->add_row($linha2->nome_colaborador,$linha2->telefone,$linha2->matricula,$linha2->email,date("d/m/Y ", strtotime($linha2->data_admissao)),"<a href='$linha2->link_lattes' target='_blank' class='btn'>Link Lattes</a>");
            
                }
    }else{
        
        $this->table->set_heading('SITUAÇÃO ','NOME ','TELEFONE','MATRICULA','EMAIL','DATA ADMISSÃO','LINK LATTES','Operacões');
        $x=0;
        foreach ($colaboradores as $linha2){
            
            $status =   $linha2->status_colaborador;
            if($status==0){
                
                $status='ATIVO';
        
            }ELSE{
                $status='INATIVO';
                
            }
            
            $this->table->add_row($status,$linha2->nome_colaborador,$linha2->telefone,$linha2->matricula,$linha2->email,date("d/m/Y ", strtotime($linha2->data_admissao)),"<a href='$linha2->link_lattes' target='_blank' class='btn'>Link Lattes</a>",anchor("colaboradores/alterar_status/$linha2->usuarios_id_usuario/$linha2->status_colaborador",'Mudar Status','class="btn"'));
        
            $x++;
        }
              
         if($x==0){
             
                $this->table->add_row('AINDA NÃO FOI CADASTRADO COLABORADOR PARA ESSE USUARIO',' ',' ',' ',' ',' ',' ',' ');
             
             
         }    
    }

echo $this->table->generate();

echo '<h2>FORMAÇÕES</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('Tipo','Curso','Data Inicio','Data Término');

foreach ($formacoes as $linha){
    $a++;
    $this->table->add_row($linha->tipo_formacao,$linha->nome_curso,date("d/m/Y", strtotime($linha->data_inicio)),date("d/m/Y ", strtotime($linha->data_termino)));

}
if($a==0){
    
    $this->table->add_row('NÃO HÁ FORMAÇÕES CADASTRADAS PRA ESSE COLABORADOR','','','');
}
   
    echo $this->table->generate();
    
      
      
    Echo '<h2>COMPETÊNCIAS</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
    $this->table->set_template($template);
$this->table->set_heading('ID ','Competência','Data Inserida');

foreach ($competencias as $linha3){
    $b++;
    $this->table->add_row($linha3->id_competencias_colaboradores,$linha3->nome_competencia,date("d/m/Y H:i", strtotime($linha3->data_inserida)));

}

if($b==0){
    
    $this->table->add_row('NÃO HÁ COMPETÊNCIAS CADASTRADAS PRA ESSE COLABORADOR','','');
}
   
   

   

    echo $this->table->generate();
    
    
   
       echo anchor('colaboradores/listar_colaboradores', 'Voltar', 'class="btn-amarelo"');

    
