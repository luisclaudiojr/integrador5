<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Integrador extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
         $this->load->library('table');
         $this->load->library('session');
         $this->load->helper('html');
    
        
         $this->load->model('autenticar_model','autentica');
         $this->load->model('colaboradores_model','colaborador');
      
 
      
           
    }
    public function index()
    {
          $dados = array(
        
            'titulo_pagina' => 'Login',
            'view_principal' => 'home',
            'tela'=>'',
            'pasta'=>'',
        );
        
        $this->load->view('login',$dados);
    }
    
    public function autenticar()
    {
            $this->form_validation->set_message('required','O  %s é Obrigatório. ');
 
           $this->form_validation->set_rules('login','NOME','trim|required|ucwords');
           $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        
          if($this->form_validation->run()== TRUE){
                 
             $dados  = elements(array('login','senha'),$this->input->post());
           //  $dados['senha'] = md5($dados['senha']);
            $senha =  $dados['senha'];
            $login =  $dados['login'];
            $this->autentica->verifica($senha,$login);
            
        }
            $dados = array(
        
            'titulo_pagina' => 'Login',
            'view_principal' => 'home',
            'tela'=>'',
            'pasta'=>'',
        );
              $this->load->view('login',$dados);
          
          
    }
    
    public function inicio(){
        

          $dados = array(
        
            'titulo_pagina' => 'Ínicio',
            'view_principal' => 'home',
            'tela'=>'',
            'pasta'=>'',
        );
        
        $this->load->view('integrador',$dados);
    }
    public function esqueci_minha_senha(){
            
       
            $this->form_validation->set_message('required','O  %s é Obrigatório. ');
           $this->form_validation->set_rules('cpf','CPF','trim|required');
           $this->form_validation->set_rules('matricula','MATRICULA','trim|required');
           
            if($this->form_validation->run()== TRUE){
                
                      
             $dados  = elements(array('cpf','matricula'),$this->input->post());
       
             $cpf       =  $dados['cpf'];
             $matricula =  $dados['matricula'];
            //se bater os dados:
            $colaborador_autentica = $this->autentica->esqueci_minha_senha($cpf,$matricula)->result();
             if($colaborador_autentica){
                 
                   foreach ($colaborador_autentica as $linhas2) {
                        $email           =  $linhas2->email;
                       if($email==''){
                           
              
                           redirect('integrador/esqueci_minha_senha/erro');
                       }else{
                       
                           $id_colaborador  =  $linhas2->id_colaborador;
                          
                           $nome            =  $linhas2->nome_colaborador;
                           $senha           = $linhas2->senha;
                           $usuario         = $linhas2->usuario;
                             $msg    = "Olá, Caro Colaborador $nome , sua senha de acesso a suas competências é:$senha e seu usuario é: $usuario  <br><br>Recomendamos a troca da senha,ATT Administração" ;
                
                            $this -> load -> library('email');
                            $this->email->initialize();
                            $this->email->from('email_automatico@dbfrete.com.br', 'email_automatico@dbfrete.com.br');
                            $this->email->to("$email", 'Esqueci Minha Senha, Banco de competências');
                            $this->email->subject('Esqueci Minha Senha, Banco de competências');
                            $this->email->message($msg);
                            $this->email->send(); 
                             redirect('integrador/esqueci_minha_senha/enviado');
                       }    
                  }
             }else{
                 
                 
                echo' <div class="avisos-erro" style="width: 200px;display:inline-block">DADOS INCORRETOS</div>';
             }
                 
             
             }
                
            
           
              $dados = array(
            
                'titulo_pagina' => 'Esqueci Minha Senha',
                'view_principal' => 'esqueci_minha_senha',
                'tela'=>'',
                'pasta'=>'',
            );
            
            $this->load->view('esqueci_minha_senha',$dados);
        }
        public function logout(){
        
        $this->session->sess_destroy();
        
          $dados = array(
        
            'titulo_pagina' => 'Logout',
            'view_principal' => 'home',
            'tela'=>'',
            'pasta'=>'',
        );
        
        $this->load->view('login',$dados);
    }
}