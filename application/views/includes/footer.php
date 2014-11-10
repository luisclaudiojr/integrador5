			 </div>
			 <div class="footer">
                <div class="nome-usuario">
                    <h1><?php echo "Bem vindo  " . $this -> session -> userdata('nome_login'); ?></h1>
                </div>
                <div class='copyright'>
                   &copy; Desenvolvido por: Beatriz Rodrigues, Luís Cláudio Padilha, Stefano Correa - TSI12   - <?php echo anchor(base_url('documentacao/ProjetoIntegradorIV.pdf'),'Clique aqui para ver a documentação',('target="_blank"')); ?>
                   
                </div>     
            </div>
            <?php
            echo' 
                <div class="topo">
                    ';
         
        
            echo'
                    
                </div>';
          
        ?>
        <div class="logo">
            <img src="<?php echo base_url('img/logo.png'); ?>" height="100%" />
            <div class="nome-do-sistema"></div>
        </div>
        
        
    </body>
</html>