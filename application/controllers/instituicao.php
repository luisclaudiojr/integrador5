<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class instituicao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this -> load -> helper('form');
        $this -> load -> helper('array');
        $this -> load -> helper('html');
        $this -> load -> library('form_validation');
        $this -> load -> library('table');
        $this -> load -> library('session');
        $this -> load -> helper('date');
        $this -> load -> library('pdf');
        

        //carrega o model e no segundo parametro passo o apelido dele..
        $this -> load -> model('instituicao_model', 'instituicao');

    }

    public function listar() {
    
        $dados = array('titulo_pagina' => 'Instituição', 
                         'view_principal' => 'RETRIEVE', 
                         'tela' => 'listar', 
                          'pasta' => 'instituicao',
         'instituicao' => $this -> instituicao -> get_all() -> result(),);

        $this -> load -> view('integrador', $dados);
    }

    



    public function alterar() {
       $this -> form_validation -> set_rules('nome_instituicao', 'NOME INSTITUIÇÃO', 'trim|required|maxlenght[200]');
        if ($this -> form_validation -> run() == TRUE) {

            //faz a insercao no banco mandando pra model..
            //passa os dados do form
            $dados = elements(array('nome_instituicao', 'endereco', 'cidade','estado','telefone','cnpj','tempo_sem_atualizar'), $this -> input -> post());
         
            $this -> instituicao -> alterar($dados, array('id_instituicao' => $this -> input -> post('id_instituicao')));

        }

        $id_instituicao = $this -> uri -> segment(3);
        $dados = array('titulo_pagina' => 'Alterar Instituição', 
        'view_principal' => 'Alterar',
         'pasta' => 'instituicao', 
        'tela' => 'alterar_instituicao', 
        'segmento' => "$id_instituicao", );
        $this -> load -> view('integrador', $dados);
    }

         
         }