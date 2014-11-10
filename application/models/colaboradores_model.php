<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
class Colaboradores_model extends CI_Model{
    
     public function inserir_usuario($dados=NULL){
        
       if($dados!=NULL){
           
            if($this->db->insert('usuarios',$dados)){           
               
             $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("colaboradores/criar_usuario"); //redireciona pra pagina.
            }
            
        }
        
        
    }
     
     public function inserir_colaborador($dados=NULL){
        
       if($dados!=NULL){
           
            if($this->db->insert('colaboradores',$dados)){           
               
             $this->session->set_flashdata('mensagem','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso,Logue novamente para ajustarmos seu cadastro</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("integrador/logout/incluido"); //redireciona pra pagina.
            }
            
        }
        
        
    }
    
        //condicao2 serve para passar o campo da outra tabela pois ambos sao a mesma coisa porém campos diferentes exemplo FUNCIONARIOS_id_func!=id_func
    public function alterar_senha($dados=NULL,$condicao=NULL){
        
              IF(($dados!=NULL) && ($condicao!=NULL) ){
                   
                  $this->db->update('usuarios',$dados,$condicao);
                 
                  
                  $this->session->set_flashdata('edicaook','<div class="avisos-sucesso">Cadastro Atualizado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect("colaboradores/conta"); //redireciona pra pagina.
              }
                   
          }
public function alterar_conta($dados=NULL,$condicao=NULL){
        
              IF(($dados!=NULL) && ($condicao!=NULL) ){
                   
                  $this->db->update('colaboradores',$dados,$condicao);
                 
                  
                  $this->session->set_flashdata('edicaook','<div class="avisos-sucesso">Cadastro Atualizado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect("colaboradores/conta"); //redireciona pra pagina.
              }
                   
          }
    
    public function alterar_status($login,$status){
        
              IF(($login!=NULL)&&($status!=NULL)){
                   

                
                 if($status==0){
                     
                 $this->db->query("update colaboradores set status_colaborador=1 where  usuarios_id_usuario=$login");
              
                 
                 }else if($status==1){
                      
                  $this->db->query("update colaboradores set status_colaborador=0 where  usuarios_id_usuario=$login");
            
                     
                 }
                  
                  $this->session->set_flashdata('edicaook','<div class="avisos-sucesso">Cadastro Atualizado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect("colaboradores/visualizar_colaborador_completo/$login"); //redireciona pra pagina.
                 
                 
              }
                   
          }
    
        
        public function excluir_colaborador($id=NULL){
            if($id!=NULL){
                //consulto pra ver se o usuario tem um cadastro de colaborador, se não tiver, ja exclui
            $consulta1 = $this->db->query("SELECT * FROM  colaboradores where usuarios_id_usuario=$id");
          $row1  = $consulta1->row();
          
          if($consulta1->num_rows()> 0) {
              //se tiver, ele passa o id do colaborador
               $id_colaborador = $row1->id_colaborador;
            //consulta pra ver se tem algum registro pertencente a ele
                $consulta = $this->db->query("SELECT * FROM  competencias_colaboradores where colaboradores_id_colaborador=$id_colaborador");
                 $consulta2 = $this->db->query("SELECT * FROM  formacoes_colaboradores where colaboradores_id_colaborador=$id_colaborador");
              
            
              
              if(($consulta->num_rows()== 0) && ($consulta2->num_rows()== 0)){
                  
                 $this->db->delete('usuarios', array('id_usuario' => $id));    
                 $this->db->delete('colaboradores', array('id_colaborador' =>  $id_colaborador));     
                 $this->session->set_flashdata('cadastrook',"<div class='avisos-sucesso'>Exclusão Efetuada com Sucesso</div>"); //manda  a mensagem que foi efetuado com sucesso
                 redirect("colaboradores/listar_usuario"); //redireciona pra pagina.
              }ELSE{
                      
                    $this->session->set_flashdata('cadastrook','<div class="avisos-erro">Existem dados que dependem desse registro(Formações ou Competências)</div>'); //manda  a mensagem que foi efetuado com sucesso
                    redirect("colaboradores/listar_usuario"); //redireciona pra pagina.
                  
              }
              
          }else{
                      
                 $this->db->delete('usuarios', array('id_usuario' => $id));        
                 $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Exclusão Efetuada com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                 redirect("colaboradores/listar_usuario"); //redireciona pra pagina.
              
          }
             
          
             
                 
            }
            
        }
      
    
        public function get_all(){
            $id_login = $this->session->userdata ('id_colaborador');
            //evita que o usuario marque mais de uma vez a mesma competência.
            return  $this->db->query("select * from competencias a where  not exists(select * from competencias_colaboradores as b where a.id_competencia=b.competencias_id_competencia and colaboradores_id_colaborador=$id_login)");
           // return  $this->db->get("curso_ci"); se fosse pegar tudo
            
     
        }
        public function get_usuarios(){
            
            return  $this->db->query("select * from usuarios"); 
            
        }
         public function colaboradores_obsoletos(){
           // $data = date("Y-m-d H:i:s");
           //where ((B.data_inserida-'$data') && (C.data_inserida-'$data') )>tempo_sem_atualizar
            return  $this->db->query("select * from colaboradores A inner join competencias_colaboradores AS B on (A.id_colaborador=B.colaboradores_id_colaborador) join instituicao where status_colaborador=0 group by colaboradores_id_colaborador order by B.data_inserida ");
        }
         
         public function colaboradores_sem_competencia(){
           // $data = date("Y-m-d H:i:s");
           //where ((B.data_inserida-'$data') && (C.data_inserida-'$data') )>tempo_sem_atualizar
            return  $this->db->query("select * from colaboradores A where not exists (select * from competencias_colaboradores B where A.ID_colaborador=B.colaboradores_id_colaborador)  and  status_colaborador=0");
        }
        
          public function get_status(){
            
            return  $this->db->query("select * from colaboradores"); 
            
        }
       public function get_conta(){
             $id_login = $this->session->userdata ('id_colaborador');
             
            return  $this->db->query("select * from colaboradores where id_colaborador=$id_login"); 
            
        }
        
          public function get_usuario($id_login){
            
            //pega os dados do usuario que esta tentanto alterar a seha
            return  $this->db->query("select * from usuarios where ID_USUARIO=$id_login"); 
            
        }
        
        
         public function get_colaboradores(){
            
            return  $this->db->query("select * from usuarios A inner join colaboradores AS B ON  (A.id_usuario=B.usuarios_id_usuario) "); 
            
        }
        
          public function get_colaboradores_id($id){
              
                if($id!=NULL){
            
                    return  $this->db->query("select * FROM  colaboradores  where usuarios_id_usuario=$id"); 
                }
        }
         public function get_colaboradores_id_colaborador($id){
                      
                        if($id!=NULL){
                    
                            return  $this->db->query("select * FROM  colaboradores  where id_colaborador=$id"); 
                        }
                }
         
         public function get_colaboradores_id_usuario($id){
                      
                        if($id!=NULL){
                    
                            return  $this->db->query("select * FROM  colaboradores  where usuarios_id_usuario=$id"); 
                        }
                }

      public function get_formacao_colaborador($id){
                  
                    if($id!=NULL){
                
                        return  $this->db->query("select * from formacoes_colaboradores A 
                                            inner join cursos AS B on (A.id_curso=B.id_curso) 
                                            INNER JOIN tipos_formacoes as C on (A.id_tipo_formacao=C.id_tipo_formacao)
                                              where A.colaboradores_id_colaborador=$id"); 
                    }
            }
       public function get_formacao_colaborador_usuario($id){
                  
                    if($id!=NULL){
                
                        return  $this->db->query("select * from formacoes_colaboradores A 
                                            inner join cursos AS B on (A.id_curso=B.id_curso) 
                                            INNER JOIN tipos_formacoes as C on (A.id_tipo_formacao=C.id_tipo_formacao)
                                            inner join colaboradores as D on (A.colaboradores_id_colaborador=D.id_colaborador)
                                              where usuarios_id_usuario=$id
                                             
                                             
                                             "); 
                    }
            }
       public function get_competencias_colaborador($id){
                  
                    if($id!=NULL){
                
                        return  $this->db->query("select id_competencias_colaboradores,nome_competencia,data_inserida from competencias_colaboradores A
                                                inner join competencias as B on (A.competencias_id_competencia=B.id_competencia)
                                              where colaboradores_id_colaborador=$id"); 
                    }
            }
       
       public function get_competencias_colaborador_usuario($id){
                  
                    if($id!=NULL){
                
                        return  $this->db->query("select id_competencias_colaboradores,nome_competencia,data_inserida from competencias_colaboradores A
                                                inner join competencias as B on (A.competencias_id_competencia=B.id_competencia) inner join colaboradores as C on (A.colaboradores_id_colaborador=C.id_colaborador)
                                              where usuarios_id_usuario=$id"); 
                    }
            }
       
       
   
}
