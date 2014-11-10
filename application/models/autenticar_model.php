<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.

class Autenticar_model extends CI_Model{
    
    public function verifica($senha=NULL,$login=NULL){
        if(($senha!=NULL)&&($login!=NULL)){
            
            $query = $this->db->query("SELECT * FROM usuarios where  usuario='$login' and senha='$senha'");
            
            if ($query->num_rows() > 0){
                $row = $query->row();
                $id_usuario      = $row->id_usuario;
                $permissao = $row->permissao;
                 $query2 = $this->db->query("SELECT * FROM colaboradores  where  usuarios_id_usuario=$id_usuario");
                $row2   = $query2->row();
                
                if ($query2->num_rows() > 0){
                    
                     $id_colaborador= $row2->id_colaborador;
                     $nome_colaborador=$row2->nome_colaborador;
                
                     $session_id = $this->session->userdata('session_id');
                     $this->session->set_userdata('permissao_login',$permissao);
                     $this->session->set_userdata('nome_login',$nome_colaborador);
                     $this->session->set_userdata('id_colaborador',$id_colaborador);
                     $this->session->set_userdata('id_usuario',$id_usuario);
                }else{
                    
                      $session_id = $this->session->userdata('session_id');
                       $this->session->set_userdata('id_usuario',$id_usuario);
                       $this->session->set_userdata('permissao_login','4');
                     redirect('colaboradores/criar_colaborador');
                }
                
              
                
                if($permissao==0){
                     redirect('atualizacoes/listar');
                    
                }else{
                    
                     redirect('competencias/listar');
                }
              
              
              //redireciona pra pagina.
      
               
            }else{
                
              ECHO '<div class="avisos-erro" style="width: 200px;display:inline-block">USUARIO OU SENHA INCORRETA</div>';
           
            }
        }
        
        
    }


    public function esqueci_minha_senha($cpf,$matricula){
           
           if(($cpf!=NULL)&&($matricula!=NULL)){
               
                   
               return  $this->db->query("select * from colaboradores inner join usuarios  on (colaboradores.usuarios_id_usuario=usuarios.id_usuario) where cpf='$cpf' and matricula='$matricula' ");
          

           }
       }
    
    
}