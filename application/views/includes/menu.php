<div class="menu-titulo">Banco de competências</div>
        <div class="menu">
           <ul>
             <?php if($this->session->userdata ('permissao_login')==0){
           echo '<li>'; echo anchor('atualizacoes/listar','Atualizações'); echo '</li>'; 
             echo '<li>'; echo anchor('competencias/mapeamento','Mapear Competências'); echo '</li>';
             echo '<li>'; echo anchor('colaboradores/obsoletos','Obsolescência'); echo '</li>'; 
              echo '<li>'; echo anchor('colaboradores/listar_usuario','<i></i><span>Colaboradores</span>');  echo '</li>'; 
              echo '<li>'; echo anchor('competencias/listar','<i></i><span>Competências</span>');  echo '</li>'; 
              echo '<li>'; echo anchor('formacoes/listar','<i></i><span>Formações</span>');  echo '</li>'; 
             
               echo '<li>'; echo anchor('instituicao/listar','Instituição'); echo '</li>';
            
             } ?> 
                  
            <?php if(($this->session->userdata ('permissao_login')!=0) && ($this->session->userdata ('permissao_login')!=4)){ 
            
                echo '<li>'; echo anchor('competencias/listar','<i></i><span>Minhas Competências</span>');  echo '</li>'; 
                echo '<li>'; echo anchor('formacoes/listar','<i></i><span>Minhas Formações</span>');  echo '</li>'; 
                echo '<li>'; echo anchor('colaboradores/listar_colaboradores','<i></i><span>Colaboradores</span>');  echo '</li>'; 
               if ($this->session->userdata ('permissao_login')==1){       
                     echo '<li>'; echo anchor('competencias/mapeamento','Mapear Competências'); echo '</li>';
                     echo '<li>'; echo anchor('colaboradores/obsoletos','Obsolescência'); echo '</li>'; 
                }
          
            
            }if($this->session->userdata ('permissao_login')==4){
                
                
            } 
            echo "<li>"; echo anchor('colaboradores/conta','<i></i><span>Conta</span>');  echo'</li>';
            echo "<li>"; echo anchor('integrador/logout','<i></i><span>Sair</span>');  echo'</li>';
           echo' </ul>
            <hr />';
           
            ?>
            
        </div>

