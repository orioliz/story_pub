<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->page;?></title>
       
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="/stp/pub/js/jquery.md5.js" type="text/javascript"></script>
	     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/stp/pub/css/style.css">
        <script src="/stp/pub/js/app.js" type="text/javascript"> </script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        

</head>
<body>
    
   <nav class="navbar navbar-light" >
        <div class="container">
            <a class="navbar-brand" href="/stp">
                <image class="storypub" src="/stp/pub/images/logo_hor.png">
            </a>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home"><?= $this->page;?></a></li>
                </ul>
             
                    <?php if($this->page=="Home")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                              </ul>');
                        }
                    ?>
            
                    <?php if($this->page=="Login")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              </ul>');
                        }
                    ?>
            
                    <?php if($this->page=="SignUp")
                        {
                        echo('<ul class="nav navbar-nav navbar-right">
                              <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                              </ul>');
                        }
                    ?>
        </div>
    </nav>
    <div id="container">