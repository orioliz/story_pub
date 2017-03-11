<?php

   namespace X\App\Controllers;

   use X\Sys\Controller; //hay que poner use porque la class home hereda de controller

   //En los controladores llamaremos a todas las funciones necesarias para la clase (Que están en el modelo)
   //Y además también podemos tener nuestras propias funciones con llamadas a otras funciones del modelo.
   //En este caso tenemos la funcion home que nos devolverá cuantos roles hay en nuestro storypub.


   class Home extends Controller{
   		

   		public function __construct($params){
                    
   			parent::__construct($params);
                        $this->addData(array('page'=>'Home'));
   			$this->model=new \X\App\Models\mHome();
   			$this->view =new \X\App\Views\vHome($this->dataView,$this->dataTable);  
                        
   		}


   		function home(){
          
                    $data=$this->model->getRoles();
                    $this->addData($data);
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
            
   		}

         
   }
