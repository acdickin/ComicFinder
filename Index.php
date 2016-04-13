<!DOCTYPE html>
<?php

require ("classes/config.php");

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comic Finder</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					
                </button>
				
                <a class="navbar-brand" href="#"> COMIC FINDER</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
				</ul>	
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="login.php">Sign in</a>
					</li>
				</ul>
                
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	
	
	
	
<div class="col-md-6 col-md-offset-3">
	<div class="carousel slide" id="myCarousel">
	<ol class ="carousel-indicators">
	<li data-target = "#my_carousel" data-slide-to = "0" class="active"></li>
	<li data-target = "#my_carousel" data-slide-to = "1"></li>
	</ol>

	

	<div class="carousel-inner row0">
	  
		<div class="item active">
		  <div class="col-xs-4"><a href="#"><img src="img/1.jpg"  class="img-responsive"alt="wow comics"></a></div>
			<div class="col-xs-4"><a href="#"><img src="img/2.jpg"  class="img-responsive"alt="wow comics"></a></div>
			<div class="col-xs-4"><a href="#"><img src="img/3.jpg"  class="img-responsive"alt="wow comics"></a></div>
		</div>

		<div class="item">
			  <div class="col-xs-4"><a href="#"><img src="img/4.jpg"   class="img-responsive"alt="wow comics"></a></div>
		  <div class="col-xs-4"><a href="#"><img src="img/5.jpg"   class="img-responsive"alt="wow comics"></a></div>
			<div class="col-xs-4"><a href="#"><img src="img/6.jpg"   class="img-responsive"alt="weird comics"></a></div>
		</div>
		
	</div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>

	

	

		
		
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
			
			
			<div class="col-lg-6 col-xs-6">
                <h1>Welcome to Comic Finder</h1>
               
                
            </div>
			<div class="col-lg-6 col-xs-6">
			 <p class="lead">Find a new comic, find out more info about your favorites or discover a new one!</p>
			</div>
			
			
			
		</div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
	<div  id= "bottom" class="navbar navbar-fixed-bottom text-center" >
		<p > <!--class-= "text-muted"--> Designed with you in mind</p>
	</div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

</body>

</html>
