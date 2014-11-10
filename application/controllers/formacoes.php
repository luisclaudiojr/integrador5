<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class formacoes extends CI_Controller {

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
        $this -> load -> model('formacoes_model', 'formacoes');

    }

    public function listar() {
        
    
        $dados = array('titulo_pagina' => 'Formações', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'listar', 
                       'pasta' => 'formacoes', 
                       'formacoes'=> $this -> formacoes -> get_formacoes() -> result(),);
                    

        $this -> load -> view('integrador', $dados);
    }

    public function criar_cursos() {
        //validacao do nome  trim= tira espacos
        $this -> form_validation -> set_rules('nome_curso','ucwords|trim|required|maxlenght[150]');
     
        //    $this->form_validation->set_rules('data_atendimento','Data','required');
     //   $this -> form_validation -> set_rules('obs', 'obs', 'trim|required|maxlenght[200]');

        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('nome_curso'), $this -> input -> post());
           
            $this -> formacoes -> inserir_cursos($dados);

        }
       
            
            
        $dados = array('titulo_pagina' => 'Registrar Cursos', 
        'view_principal' => 'Criar', 
        'pasta' => 'formacoes',
         'tela' => 'criar_cursos',
        );

        $this -> load -> view('integrador', $dados);

    }


   public function inserir_formacao_colaboradores() {
        //validacao do nome  trim= tira espacos
     
      $this -> form_validation -> set_rules('data_inicio','required');
      $this -> form_validation -> set_rules('data_termino','required');
       
        if ($this -> form_validation -> run() == TRUE) {
            //faz a insercao no banco mandando pra model..
            //passa os dados do form
           $dados = elements(array('id_tipo_formacao','id_curso','colaboradores_id_colaborador','data_inserida','data_inicio','data_termino'), $this -> input -> post());
           
            $this -> formacoes -> inserir_formacao_colaboradores($dados);
         
         
        }
       
            
            
        $dados = array('titulo_pagina' => 'Inserir Competência Colaboradores', 
        'view_principal' => 'Criar', 
        'pasta' => 'formacoes',
         'tela' => 'inserir_formacao_colaboradores',
           'tipo_formacao' => $this -> formacoes -> get_tipoFormacao() -> result(),
            'cursos' => $this -> formacoes -> get_Cursos() -> result(),
        );

        $this -> load -> view('integrador', $dados);

    }
  
  
    public function excluir() {
        if ($this -> uri -> segment(3)) {

            //chama funcao pra excluir no model
            $this -> formacoes -> excluir($this -> uri -> segment(3));

        }

    }
    
  

 

}   

