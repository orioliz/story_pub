<?php
	namespace X\App\Views;
	use \X\Sys\View;
	
	class vLogin extends View{
		function __construct($dataView){
			
			parent::__construct($dataView);
			echo $this->render('tlogin.php');
		}
	}