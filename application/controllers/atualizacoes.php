<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atualizacoes extends CI_Controller {

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
        $this -> load -> model('atualizacoes_model', 'atualizacoes');

    }

    public function listar() {
        
    
        $dados = array('titulo_pagina' => 'Colaboradores', 
                       'view_principal' =>'RETRIEVE', 
                       'tela' => 'listar', 
                       'pasta' => 'atualizacoes', 
                        'atualizacoes_competencias'=> $this -> atualizacoes -> atualizacoes_competencias()-> result(),
                        
                        'atualizacoes_formacoes'=> $this -> atualizacoes -> atualizacoes_formacoes()-> result(),
                       );

        $this -> load -> view('integrador', $dados);
    }
    
    
  

 

}   

