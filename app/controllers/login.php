<?php


namespace X\App\Controllers;
use X\Sys\Controller;


class Login extends Controller{
    
    public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Login'));
   			$this->model=new \X\App\Models\mLogin();
   			$this->view =new \X\App\Views\vLogin($this->dataView,$this->dataTable);    
   		}
                
    public function log(){
     
        $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);        
        $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);        
        $res=$this->model->valeuser($username, $password);
        
        if($res){
            $this->ajax(array('msg'=>'Correct','class'=>'alert alert-success', 'redir'=>'/dashboard'));
            
        }else{
           $this->ajax(array('msg'=>'Usuario incorrecto', 'class'=>'alert alert-danger'));
        }
       
        
    }

}
