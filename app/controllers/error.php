<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;

//El controlador de error nos sirve para que nos muestre esta pantalla cuando suceda algún error

   class Error extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Error'));
   			$this->model=new \X\App\Models\mError();
   			$this->view =new \X\App\Views\vError($this->dataView);
            
   		}
   }
