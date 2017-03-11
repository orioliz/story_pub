<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
                public function valeuser($username, $password){	
                    
                    $this->query("SELECT * FROM users WHERE username=:username && password=:password");                    
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
