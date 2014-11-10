<?php
//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class competencias extends CI_Controller {

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
        $this -> load -> model('competencias_model', 'competencias');

    }

    public function listar() {
        
    
        $dados = array('titulo_pagina' => 'Competências', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'listar', 
                       'pasta' => 'competencias', 
                       'competencias'=> $this -> competencias -> get_competencia() -> result(),);
                    

        $this -> load -> view('integrador', $dados);
    }
    

    

    public function criar_competencia() {
        //validacao do nome  trim= tira espacos
        $this -> form_validation -> set_rules('nome_competencia','ucwords|trim|required|maxlenght[150]');
     
        //    $this->form_validation->set_rules('data_atendimento','Data','required');
     //   $this -> form_validation -> set_rules('obs', 'obs', 'trim|required|maxlenght[200]');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('nome_competencia'), $this -> input -> post());
           
            $this -> competencias -> inserir($dados);

        }
       
            
            
        $dados = array('titulo_pagina' => 'Registrar Competência', 
        'view_principal' => 'Criar', 
        'pasta' => 'competencias',
         'tela' => 'criar_competencia',
        );

        $this -> load -> view('integrador', $dados);

    }


   public function inserir_competencia_colaboradores() {
        //validacao do nome  trim= tira espacos
     
        //    $this->form_validation->set_rules('data_atendimento','Data','required');
        $this -> form_validation -> set_rules('competencias_id_competencia', 'competencia', 'required');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
         
         
         $competencias = $this -> input -> post('competencias_id_competencia');
         foreach ( $competencias as $linhas ) {
             
              
                $competencia[] = $linhas ;
                $colaborador = $this -> input -> post('colaboradores_id_colaborador');
                $data        = $this -> input -> post('data_inserida');
           
         
          }
           $this -> competencias -> inserir_competencias_colaboradores($competencia,$colaborador,"$data");
           
        }
       
            
            
        $dados = array('titulo_pagina' => 'Inserir Competência Colaboradores', 
        'view_principal' => 'Criar', 
        'pasta' => 'competencias',
         'tela' => 'inserir_competencia_colaboradores',
         'competencias'=> $this -> competencias -> get_all() -> result(),
        );

        $this -> load -> view('integrador', $dados);

    }
  
  
    public function excluir_comp_colaborador() {
        if ($this -> uri -> segment(3)) {

            //chama funcao pra excluir no model
            $this -> competencias -> excluir_comp_colaborador($this -> uri -> segment(3));

        }

    }
    
     public function mapeamento() {
        
                $dados = array('titulo_pagina' => 'Competências', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'mapeamento', 
                       'pasta' => 'competencias', 
                       'competencias'=> $this -> competencias -> mapeamento() -> result(),
                       'competencias_semcolaborador'=> $this -> competencias -> mapeamento_semcolaborador() -> result(),
                       );
                    

        $this -> load -> view('integrador', $dados);
        

    }
    public function competencias_colaboradores() {
        
         if ($this -> uri -> segment(3)) {
             
             $id_competencia=$this -> uri -> segment(3);
         }
         
                    $dados = array('titulo_pagina' => 'Mapeamento de competências', 
                           'view_principal' =>'RETRIEVE', 
                           'tela' => 'competencias_colaboradores', 
                           'pasta' => 'competencias', 
                           'colaboradores'=> $this -> competencias -> competencias_colaboradores($id_competencia) -> result(),
                           'competencia'=> $this -> competencias -> get_competencia_byID($id_competencia) -> result(),
                           
                          
                           );
                        
    
            $this -> load -> view('integrador', $dados);
            
    
        }
    
  
    public function gerar_email (){
        $id_colaborador =   $this -> uri -> segment(3);
        $dados = $this -> competencias -> get_dados_colaboradores($id_colaborador)->result();
       foreach ($dados as $linhas) {
           $nome_colaborador    =   $linhas->nome_colaborador;
           $instituicao         = $linhas->nome_instituicao;
           $tempo_sem_atualizar = $linhas->tempo_sem_atualizar;
           $email               = $linhas->email;
           
       }
           $msg    = "Olá, Caro Colaborador $nome_colaborador, informamos que as suas informações no nosso sistema de banco de competências da instituição: $instituicao encontram-se desatualizadas, há mais de $tempo_sem_atualizar dias, favor atualizar o sistema para que possamos administrar nossas competências da melhor forma. <br><br> Att, Administração " ;
        $this -> load -> library('email');
        $this->email->initialize();
        $this->email->from('email_automatico@dbfrete.com.br', 'email_automatico@dbfrete.com.br');
        $this->email->to("$email", 'Alerta de Obsolescencia');
         $this->email->subject('Alerta de Obsolescencia');
        $this->email->message($msg);
        $this->email->send(); 
      
          $this -> load -> model('colaboradores_model', 'colaboradores');
         $dados2 = array('titulo_pagina' => 'Mapeamento de competências', 
                           'view_principal' =>'RETRIEVE', 
                           'tela' => 'colaboradores_obsoletos', 
                           'pasta' => 'colaboradores', 
                           'enviado'=> 'true',   
                           'colaboradores'=> $this -> colaboradores -> colaboradores_obsoletos() -> result(),
                           'colaboradores_sem_competencia'=> $this -> colaboradores -> colaboradores_sem_competencia() -> result(),
                      
                           );
        
        $this->load->view('integrador', $dados2); 
    }

 public function excluir_competencia() {
     
      if ($this -> uri -> segment(3)) {
             $id_competencia =   $this -> uri -> segment(3);
            //chama funcao pra excluir no model
            $this -> competencias -> excluir_competencia($id_competencia);

        }
    
             
        

    }
 

}   
