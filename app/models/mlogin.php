<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
                public function valeuser($username, $password){
			
			//con la información que nos envía el controlador realizaremos una sentencia con pdo
			//esto quiere decir que utilizaremos la variable :username y más adelante con bind le diremos
			//cual es el campo que tiene que cambiar por esta variable.
			
			//después contaremos el número de filas que nos devuelve, y si nos devuelve 1 retornaremos true.
                    
                    $this->query("SELECT * FROM users WHERE usersname=:username && password=:password");
                    
                    $this->bind(":username",$username);
                    
                    $this->bind(":password",$password);
                    
                    $this->execute();
                    $res=$this->rowCount();
                   
                   if($res==1){
                       return true;
                   }else{
                       return false;
                   }
                    
                }
            
	}
