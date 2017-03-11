<?php

   namespace X\App\Controllers;

   use X\Sys\Controller; // Home hereda de controller
   

   class Dashboard extends Controller{
   		

   		public function __construct($params){
                    
   			parent::__construct($params);
                        $this->addData(array('page'=>'Dashboard'));
   			$this->model=new \X\App\Models\mDashboard();
   			$this->view =new \X\App\Views\vDashboard($this->dataView,$this->dataTable);  
                        
   		}

   }
