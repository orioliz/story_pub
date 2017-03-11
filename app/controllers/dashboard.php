<?php

   namespace X\App\Controllers;

   use X\Sys\Controller; //hay que poner use porque la class home hereda de controller
   
//Este controlador no tiene ningún misterio, únicamente desde el constructor hacemos un nuevo modelo y vista.

   class Dashboard extends Controller{
   		

   		public function __construct($params){
                    
   			parent::__construct($params);
                        $this->addData(array('page'=>'Dashboard'));
   			$this->model=new \X\App\Models\mDashboard();
   			$this->view =new \X\App\Views\vDashboard($this->dataView,$this->dataTable);  
                        
   		}

   }
