<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Formacoes_model extends CI_Model{
    
     public function inserir($dados=NULL){
        
       if($dados!=NULL){
           
            if($this->db->insert('formacoes',$dados)){           
               
             $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("competencias/listar"); //redireciona pra pagina.
            }
            
        }
        
        
    }
     public function inserir_cursos($dados=NULL){
        
       if($dados!=NULL){
           
            if($this->db->insert('cursos',$dados)){           
               
             $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("formacoes/inserir_formacao_colaboradores"); //redireciona pra pagina.
            }
            
        }
        
        
    }
     public function inserir_formacao_colaboradores($dados=NULL){
        
       if($dados!=NULL){
           
          
           
            if($this->db->insert('formacoes_colaboradores',$dados))
            {           
               
             $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect("formacoes/listar"); //redireciona pra pagina.
            }
            
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
    
        
        public function excluir($id=NULL){
            if($id!=NULL){
            
                 $this->db->delete('formacoes_colaboradores', array('id_formacoes_colaboradores' => $id)); 
              
            
                 $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Exclusão Efetuada com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                 redirect("formacoes/listar"); //redireciona pra pagina.
                 
            }
            
        }
      
    
        public function get_all(){
            
            return  $this->db->get("competencias"); 
           // return  $this->db->get("curso_ci"); se fosse pegar tudo
            
            
        }
        public function get_formacoes($id_login=NULL){
            
            $id_login = $this->session->userdata ('id_colaborador');
            
             IF($id_login!=NULL){
                    return  $this->db->query("select * from formacoes_colaboradores A 
                                            inner join cursos AS B on (A.id_curso=B.id_curso) 
                                            INNER JOIN tipos_formacoes as C on (A.id_tipo_formacao=C.id_tipo_formacao)
                                              where A.colaboradores_id_colaborador=$id_login"); 
             }else{
                 return false;
             }
            
        }
        
        public function get_tipoFormacao(){
            
            return  $this->db->query("select  * from tipos_formacoes "); 
           
            
            
        }
        public function get_Cursos(){
            
            return  $this->db->query("select  * from cursos order by nome_curso "); 
           
            
            
        }

  
    
}
