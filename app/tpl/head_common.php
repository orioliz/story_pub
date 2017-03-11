<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $this->page;?></title>
       
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="/pub/js/jquery.md5.js" type="text/javascript"></script>
	     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="pub/css/style.css">
        <script src="/pub/js/app.js" type="text/javascript"> </script>        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        

</head>
<body>
    
   <nav class="navbar navbar-light" >
        <div class="container">
            <a class="navbar-brand" href="/pub">
                <img src="pub/images/logo.png" width="50px">
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