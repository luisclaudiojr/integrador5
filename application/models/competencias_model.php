<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.

class Competencias_model extends CI_Model{
    
     public function inserir($dados=NULL){
        
       if($dados!=NULL){
           
            if($this->db->insert('competencias',$dados)){           
               
             $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("competencias/inserir_competencia_colaboradores"); //redireciona pra pagina.
            }
            
        }
        
        
    }
     public function inserir_competencias_colaboradores($competencia,$colaborador,$data){
        
       if(($competencia!=NULL)&&($colaborador!=NULL)&&($data!=NULL)){
           
          
            foreach ( $competencia as $linhas ) {
                  
              $this->db->query("INSERT INTO competencias_colaboradores (competencias_id_competencia,colaboradores_id_colaborador,data_inserida) values ($linhas,$colaborador,'$data')");

                }
            
                $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect("competencias/listar"); //redireciona pra pagina.
            
        }
        
    }
        //condicao2 serve para passar o campo da outra tabela pois ambos sao a mesma coisa porém campos diferentes exemplo FUNCIONARIOS_id_func!=id_func
    public function alterar($dados=NULL,$id_proprietario=NULL,$condicao=NULL){
        
              IF(($dados!=NULL) && ($condicao!=NULL) && ($id_proprietario!=NULL)){
                   
                  $this->db->update('animais',$dados,$condicao);
                 
                  
                  $this->session->set_flashdata('edicaook','<div class="avisos-sucesso">Cadastro Atualizado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect("animais/listar/$id_proprietario"); //redireciona pra pagina.
              }
                   
          }
    
        
        public function excluir_comp_colaborador($id=NULL){
            if($id!=NULL){
            
                 $this->db->delete('competencias_colaboradores', array('id_competencias_colaboradores' => $id)); 
              
            
                 $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Exclusão Efetuada com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                 redirect("competencias/listar"); //redireciona pra pagina.
                 
            }
            
        }
      
    
        public function get_all(){
            $id_login = $this->session->userdata ('id_colaborador');
            //evita que o usuario marque mais de uma vez a mesma competência.
            return  $this->db->query("select * from competencias a where  not exists(select * from competencias_colaboradores as b where a.id_competencia=b.competencias_id_competencia and colaboradores_id_colaborador='$id_login') order by nome_competencia");
           // return  $this->db->get("curso_ci"); se fosse pegar tudo
            
     
        }
        public function get_competencia_byID($id_competencia){
          
            //evita que o usuario marque mais de uma vez a mesma competência.
            return  $this->db->query("SELECT * FROM competencias A WHERE  id_competencia=$id_competencia");
           // return  $this->db->get("curso_ci"); se fosse pegar tudo
            
     
        }
        public function get_competencia($id_login=NULL){
            
            $id_login = $this->session->userdata ('id_colaborador');
            
             IF($id_login!=NULL){
                    return  $this->db->query("select id_competencias_colaboradores,nome_competencia,data_inserida from competencias_colaboradores A
                                                inner join competencias as B on (A.competencias_id_competencia=B.id_competencia)
                                              where colaboradores_id_colaborador=$id_login"); 
             }else{
                 return false;
             }
            
        }
 
 public function mapeamento(){
 
         
     return  $this->db->query(" SELECT competencias_id_competencia, COUNT( competencias_id_competencia ) as teste, nome_competencia
                                FROM competencias_colaboradores A
                                INNER JOIN competencias AS B ON ( A.competencias_id_competencia = B.id_competencia ) 
                                inner join colaboradores AS C on (A.colaboradores_id_colaborador=C.id_colaborador) where status_colaborador=0
                                GROUP BY competencias_id_competencia");
 }
 
 public function mapeamento_semcolaborador(){
 
         
     return  $this->db->query(" SELECT * from competencias A  where  not exists (select * from competencias_colaboradores B inner join colaboradores as C on (B.colaboradores_id_colaborador=C.id_colaborador) where A.id_competencia=B.competencias_id_competencia  and status_colaborador=0)  ");
 }
 
  public function competencias_colaboradores($id_competencia=Null){
 
         IF($id_competencia!=NULL){
             return  $this->db->query("  SELECT * from colaboradores A inner join usuarios on (A.usuarios_id_usuario=usuarios.id_usuario) inner join competencias_colaboradores AS B on (A.id_colaborador=B.colaboradores_id_colaborador)  where  B.competencias_id_competencia=$id_competencia and status_colaborador=0 ");
     }
 }
  
  public function get_dados_colaboradores($id_colaborador){
              
            if($id_colaborador!=NULL){
        
                return  $this->db->query("select email,nome_colaborador,tempo_sem_atualizar,nome_instituicao FROM  colaboradores join instituicao where id_colaborador=$id_colaborador"); 
            }
  }
  
  public function excluir_competencia($id_competencia){
              
            if($id_competencia!=NULL){
        
                 $this->db->delete('competencias', array('id_competencia' => $id_competencia)); 
              
            
                  $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Exclusão Efetuada com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                redirect("competencias/mapeamento"); //redireciona pra pagina.
                
                
            }
  }
  
    
}
