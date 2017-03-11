<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mSignUp extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
           
          public function signuser($username, $password, $email){
                    
		  //Esta función és un poco más compleja porque he querido hacerla algo inteligente
		  //además de saber si el usuario coincide con su password, he querido comprobar si se 
		  //habian registrado ya con ese email, para controlar todos los aspectos.
		  
                    $this->query("SELECT * FROM users WHERE usersname=:username && password=:password");
                    
                    $this->bind(":username",$username);
                    
                    $this->bind(":password",$password);
                    
                    $this->execute();
                    $res_1=$this->rowCount();
                    
                    $this->query("SELECT * FROM users WHERE email=:email");
                    
                    $this->bind(":email",$email);
                    
                    $this->execute();
                    
                    $res_2=$this->rowCount();
                   
                   if($res_1==1 || $res_2==1){
                       
                       return false;
                       
                   }else{
                       //si el usuario y mail no están registrados llamaremos al procedimiento que creamos
			// anteriormente new user i crearemos el usuario.
			   
                       $this->query("call storypub.sp_new_user(1, :email, :password, :username)");
                       
                        $this->bind(":email",$email);
                    
                        $this->bind(":username",$username);

                        $this->bind(":password",$password);

                        $this->execute();
                        
                        return true;
                       
                   }
                    
                }
                
	}
