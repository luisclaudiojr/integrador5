<?php

//TODOS OS CREDITOS RESERVADOS A: LUÍS CLAUDIO PADILHA JUNIOR.



//if($this->session->userdata ('permissao_login')){
     $this->load->view('includes/header');
    
    $this->load->view('includes/menu');
    
    if(($pasta!='') and ($tela!='')){
        $this->load->view($pasta.'/'.$tela);
    }
    
    $this->load->view('includes/footer');
    
    
//}else{
    
  // redirect('integrador/logout/sessao');
//}
   

