<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class instituicao_model extends CI_Model{
    
     public function inserir($dados=NULL){
        
        IF($dados!=NULL){
            
            
           
            if($this->db->insert('compromissos',$dados)){           
               
             
             $this->session->set_flashdata('mensagem','<div class="avisos-sucesso">Cadastro Efetuado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
            redirect('compromissos/criar_compromisso'); //redireciona pra pagina.
            }
            
        }
        
        
    }
     
        //condicao2 serve para passar o campo da outra tabela pois ambos sao a mesma coisa porém campos diferentes exemplo FUNCIONARIOS_id_func!=id_func
    public function alterar($dados=NULL,$condicao=NULL){
       
      
              IF(($dados!=NULL)&& ($condicao!=NULL)){
                   
                  $this->db->update('instituicao',$dados,$condicao);
                  
                  $this->session->set_flashdata('edicaook','<div class="avisos-sucesso">Cadastro Atualizado com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                  redirect(current_url()); //redireciona pra pagina.
              }
                
          }
    
        
        public function excluir($id=NULL){
            if($id!=NULL){
            
                    $this->db->delete('compromissos', array('id_compromisso' => $id)); 
                        $this->session->set_flashdata('cadastrook','<div class="avisos-sucesso">Exclusão Efetuada com Sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                        redirect('compromissos/listar'); //redireciona pra pagina.
             
            }
            
        }
      
    
        public function get_all(){
            
            return  $this->db->query(" select  *  from instituicao "); 
           
            
            
        }

        
     
        
        public function encerrar($id=null){
                if($id!=NULL){
                        
                    $this->db->query( "update compromissos set status='R' WHERE id_compromisso=$id");
                      $this->session->set_flashdata('mensagem','<div class="avisos-sucesso">Compromisso encerrado com sucesso</div>'); //manda  a mensagem que foi efetuado com sucesso
                     redirect('compromissos/listar'); //redireciona pra pagina.
           
                }
        }
        
  
       public function get_byId($id=NULL){
        
        if($id!=NULL){
            
          return   $this->db->query(" select  *  from instituicao where id_instituicao=$id");
           
            
        }else{
            return false;
        }
    }
       
       
    
    
}
