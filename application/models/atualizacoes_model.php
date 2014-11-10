<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class atualizacoes_model extends CI_Model{
    
   
   public function atualizacoes_competencias(){
       
       return  $this->db->query("
                                SELECT nome_colaborador,nome_competencia,data_inserida FROM colaboradores A 
                                inner join competencias_colaboradores  B on (A.id_colaborador=B.colaboradores_id_colaborador)
                                inner join  competencias as C on (B.competencias_id_competencia=C.id_competencia) order by data_inserida DESC limit 10
                                
       
       ");
       
       
   }
   
   public function atualizacoes_formacoes(){
       
         return  $this->db->query("
                                    SELECT nome_colaborador,data_inserida,nome_curso,tipo_formacao,data_inicio,data_termino FROM  colaboradores A 
                                    inner join formacoes_colaboradores AS  B on (A.id_colaborador=B.colaboradores_id_colaborador)
                                    inner join tipos_formacoes AS C on (B.id_tipo_formacao=C.id_tipo_formacao)
                                    inner join cursos AS D on (B.id_curso=D.id_curso)
                                    order by data_inserida DESC limit 10
         
         ");
       
   }
   
}
