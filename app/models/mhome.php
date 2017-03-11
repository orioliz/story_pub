<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mHome extends Model{
		public function __construct(){
			parent::__construct();
			
		}   
	
         public function getRoles(){
		 
		 //la función getRoles retorna el número de roles que tenemos en la base de datos
		 //Gracias a la sentencia.
                
                $sql = "SELECT * FROM roles";
                $this->query($sql);
                
                $res=$this->execute();

                if($res){
                    $result=$this->resultset();
                }
                else{
                    $result=null;
                }
                
                
                return $result;
            }
            
            
        
        }
