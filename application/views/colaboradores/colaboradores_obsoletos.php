<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
$a=0;
$c=1;
//usa os parametros de sessao.. se existir o parametro ele pega  a mensagem setada no model.
if($this->session->flashdata('cadastrook')){
    echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
    
}

if(isset($enviado)){
    
    echo '<div class="avisos-sucesso">EMAIL ENVIADO COM SUCESSO </div>';
}

echo '<h2>COLABORADORES OBSOLETOS</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
   // $this->table->set_template($template);
$this->table->set_heading('COLABORADOR','ULTIMA COMPETENCIA','GERAR EMAIL');

foreach ($colaboradores as $linha){

//if( $data_competencia > $linha->tempo_sem_atualizar){

//NÃO CONSEGUI FAZER PELO CODEIGNITER(SEI QUE AQUI NÃO PODE BANCO DE DADOS.) 
//pego maximo id do colaborador que ta listando.
$sql44  =   mysql_query("select max(id_competencias_colaboradores) as id_competencia from competencias_colaboradores where colaboradores_id_colaborador='$linha->colaboradores_id_colaborador'");
    while($linha3   =   mysql_fetch_array($sql44)){
           
           $id      =   $linha3['id_competencia'];
        //mando trazer de novo
           $sql5    =   mysql_query("select *  from competencias_colaboradores A INNER JOIN competencias AS B ON (A.competencias_id_competencia=B.id_competencia) inner join colaboradores AS C on (A.colaboradores_id_colaborador=C.id_colaborador) where id_competencias_colaboradores='$id'");
           $sql5row =   mysql_num_rows($sql5);
              
        while($linha5=mysql_fetch_array($sql5)){
            $data_inserida      =   $linha5['data_inserida'];
             $nome_colaborador  =   $linha5['nome_colaborador'];
            
                $data = date("Y-m-d H:i:s"); 
             //pega data do banco
            $one= new DateTime($data_inserida);
            $two = new DateTime($data);
            // Resgata diferença entre as datas
            $dateInterval       =   $one->diff($two);
            $data_competencia   =   $dateInterval->days;
            //comparo as datas
    if($data_competencia >$linha->tempo_sem_atualizar){
        $c=0;
        
            $this->table->add_row($nome_colaborador,date("d/m/Y", strtotime($linha->data_inserida)),anchor("competencias/gerar_email/$linha->id_colaborador", 'Gerar E-mail',' class="btn-azul"'));
                  
        
    }
                
    }
  
 
}
}

if($c==1){
       $this->table->add_row('NÃO HÁ PENDENCIAS DE OBSOLESCENCIA','','');
             
    
}
    echo $this->table->generate();
    
    
    echo BR(5);
 echo '<h2>COLABORADORES SEM COMPETÊNCIAS</h2>';
 $template =  array (
                    'table_open'          => '<table class="data-table" id="tabela">'
                    ,
    );
       
$this->table->set_heading('COLABORADOR','GERAR EMAIL');   

foreach ($colaboradores_sem_competencia as $linha2){
        
    $a++;
            $this->table->add_row($linha2->nome_colaborador,anchor("competencias/gerar_email/$linha2->id_colaborador", 'Gerar E-mail',' class="btn-azul"'));
          
}

if($a==0){
    
      $this->table->add_row('TODOS OS COLABORADORES POSSUEM COMPETÊNCIAS','');
}
    
    
     echo $this->table->generate();
    
    
    
    
   
    
      
