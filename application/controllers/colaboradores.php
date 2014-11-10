<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class colaboradores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this -> load -> helper('form');
        $this -> load -> helper('array');
        $this -> load -> helper('html');
        $this -> load -> library('form_validation');
        $this -> load -> library('table');
        $this -> load -> library('session');
        $this -> load -> helper('date');

        //carrega o model e no segundo parametro passo o apelido dele..
        $this -> load -> model('colaboradores_model', 'colaboradores');

    }

    public function listar_usuario() {
        
    
        $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'listar_usuario', 
                       'pasta' => 'colaboradores', 
                       'colaboradores'=> $this -> colaboradores -> get_usuarios() -> result(),
                       'status'   => $this -> colaboradores -> get_status() -> result(),
                       );

        $this -> load -> view('integrador', $dados);
    }
     public function obsoletos() {
        
    
        $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'colaboradores_obsoletos', 
                       'pasta' => 'colaboradores', 
                       'colaboradores'=> $this -> colaboradores -> colaboradores_obsoletos() -> result(),
                       'colaboradores_sem_competencia'=> $this -> colaboradores -> colaboradores_sem_competencia() -> result(),
                       
                       );

        $this -> load -> view('integrador', $dados);
    }
    public function listar_colaboradores() {
        
    
        $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'listar_colaboradores', 
                       'pasta' => 'colaboradores', 
                       'colaboradores'=> $this -> colaboradores -> get_colaboradores() -> result(),
                       
                       );

        $this -> load -> view('integrador', $dados);
    }
    
 public function conta() {
      $id_login = $this->session->userdata('id_colaborador');
      
         $this -> form_validation -> set_rules('nome_colaborador','Nome Completo','ucwords|trim|required|maxlenght[150]');
         $this -> form_validation -> set_rules('email','E-mail:','ucwords|trim|required|maxlenght[150]');
         $this -> form_validation -> set_rules('telefone','Telefone','ucwords|trim|required|maxlenght[150]');
        
          

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('link_lattes','nome_colaborador','email','telefone','data_admissao'), $this -> input -> post());
           
           
            $this -> colaboradores -> alterar_conta($dados,array('id_colaborador' => $id_login));

        }
    
    
        $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'conta', 
                       'pasta' => 'colaboradores', 
                       'colaborador'=> $this -> colaboradores -> get_conta() -> result(),
                       
                       );

        $this -> load -> view('integrador', $dados);
    }
    


     public function alterar_senha() {
         
         if ($this -> uri -> segment(3)) {
             
           $id_login=$this -> uri -> segment(3);
         }else{
             
             $id_login = $this->session->userdata('id_usuario');
         }
         
           $this -> form_validation -> set_rules('senha','SENHA','ucwords|trim|required|maxlenght[150]');
         $this->form_validation->set_message('matches','O Campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','CONFIRMA A SENHA','trim|required|strtolower|matches[senha]');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('senha'), $this -> input -> post());
           
            $this -> colaboradores -> alterar_senha($dados,array('id_usuario' => $id_login));

        }
    
        $dados = array('titulo_pagina' => 'Alterar a Senha', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'alterar_senha', 
                       'pasta' => 'colaboradores', 
                       'colaborador'=> $this -> colaboradores -> get_usuario($id_login) -> result(),);

        $this -> load -> view('integrador', $dados);
    }

    public function alterar_status() {
             
             if ($this -> uri -> segment(3)) {
                 
               $id_login = $this -> uri -> segment(3);
               $status   = $this -> uri -> segment(4);  
                 
             }
             
              
               
                $this -> colaboradores -> alterar_status($id_login,$status);
    
          
            $dados = array('titulo_pagina' => 'Alterar a Senha', 
                           'view_principal' =>'RETRIEVE', 
                           'tela' => '', 
                           'pasta' => 'colaboradores', 
                           );
    
            $this -> load -> view('integrador', $dados);
        }
    
    public function criar_usuario() {
        //validacao do nome  trim= tira espacos
        
        $this -> form_validation -> set_rules('senha','SENHA','ucwords|trim|required|maxlenght[150]');
          $this->form_validation->set_message('is_unique','O  %s Já está registrado ');
         $this->form_validation->set_rules('usuario','usuario','trim|required|alpha|maxlenght[50]|ucwords|is_unique[usuarios.usuario]');
        $this->form_validation->set_message('matches','O Campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','CONFIRMA A SENHA','trim|required|strtolower|matches[senha]');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('usuario','senha','permissao'), $this -> input -> post());
           
            $this -> colaboradores -> inserir_usuario($dados);

        }
       
            
            
        $dados = array('titulo_pagina' => 'Criar Usuário', 
        'view_principal' => 'Criar', 
        'pasta' => 'colaboradores',
         'tela' => 'criar_usuario',
        );

        $this -> load -> view('integrador', $dados);

    }

 public function criar_colaborador() {
        //validacao do nome  trim= tira espacos
        
     
          $this->form_validation->set_message('is_unique','O  %s Já está registrado ');
          $this->form_validation->set_rules('matricula','Matricula','trim|required|numeric|maxlenght[50]||is_unique[colaboradores.matricula]');
          $this -> form_validation -> set_rules('nome_colaborador','Nome Completo','ucwords|trim|required|maxlenght[150]');
           $this -> form_validation -> set_rules('email','E-mail:','ucwords|trim|required|maxlenght[150]');
            $this -> form_validation -> set_rules('telefone','Telefone','ucwords|trim|required|maxlenght[150]');
          

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('link_lattes','nome_colaborador','email','telefone','data_admissao','matricula','status_colaborador','usuarios_id_usuario','cpf'), $this -> input -> post());
           
            $this -> colaboradores -> inserir_colaborador($dados);

        }
       
            
            
        $dados = array('titulo_pagina' => 'Criar Colaboradores', 
        'view_principal' => 'Criar', 
        'pasta' => 'colaboradores',
         'tela' => 'criar_colaborador',
        );

        $this -> load -> view('integrador', $dados);

    }


   public function inserir_competencia_colaboradores() {
        //validacao do nome  trim= tira espacos
     
        //    $this->form_validation->set_rules('data_atendimento','Data','required');
        $this -> form_validation -> set_rules('competencias_id_competencia', 'colaborador', 'required');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
         
         
         $colaboradores = $this -> input -> post('competencias_id_competencia');
         foreach ( $colaboradores as $linhas ) {
             
              
                $colaborador[] = $linhas ;
                $colaborador = $this -> input -> post('colaboradores_id_colaborador');
                $data        = $this -> input -> post('data_inserida');
           
         
          }
           $this -> colaboradores -> inserir_competencias_colaboradores($colaborador,$colaborador,"$data");
           
        }
       
            
            
        $dados = array('titulo_pagina' => 'Inserir Colaboradores', 
        'view_principal' => 'Criar', 
        'pasta' => 'colaboradores',
         'tela' => 'inserir_competencia_colaboradores',
         'colaboradores'=> $this -> colaboradores -> get_all() -> result(),
        );

        $this -> load -> view('integrador', $dados);

    }
  
  
    public function excluir_colaborador() {
        if ($this -> uri -> segment(3)) {

            //chama funcao pra excluir no model
            $this -> colaboradores -> excluir_colaborador($this -> uri -> segment(3));

        }

    }
    
    public function visualizar_colaborador() {
         if ($this -> uri -> segment(3)) {
             
             $id = $this -> uri -> segment(3);
        
         }
          $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'visualizar_colaborador', 
                       'pasta' => 'colaboradores', 
                       'colaboradores'=> $this -> colaboradores -> get_colaboradores_id($id) -> result(),
                       'usuarios'=> $this -> colaboradores -> get_usuario($id) -> result(),
                       
                       );

        $this -> load -> view('integrador', $dados);

    }
       public function visualizar_colaborador_completo() {
         if ($this -> uri -> segment(3)) {
             
             $id = $this -> uri -> segment(3);
        
         }
          $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'visualizar_colaborador_completo', 
                       'pasta' => 'colaboradores', 
                       'colaboradores'=> $this -> colaboradores -> get_colaboradores_id_usuario($id) -> result(),
                       'formacoes'=> $this -> colaboradores -> get_formacao_colaborador_usuario($id) -> result(),
                       'competencias'=> $this -> colaboradores -> get_competencias_colaborador_usuario($id) -> result(),
                       
                       );

        $this -> load -> view('integrador', $dados);

    }
    
    
  

 

}   

