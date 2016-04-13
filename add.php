<html> 
	<head>
	<?php
	include "add.php"
	?>
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">
	</head>

    <body> 
        <form action="add.php" method="post"> 
           <div class="col-lg-3 col-xs-1">
		   </div>
			<div class="col-xs-10 col-lg-6 fun center" >
				<h1> Create New User</h1>
				<BR><BR>
				First Name :
				<BR> 
				<div class="col-sm-offset-1 col-sm-10 "> 
				<input type="text" name="firstname" size="40" ><BR> 
				</div>
				<BR> <BR> 
				Last Name : 
				<BR> 
				<div class="col-sm-offset-1 col-sm-10 "> 
				<input type="text" name="lastname" size="40"  ><BR> 
				</div>
				<BR> <BR>
				User Name: 
				<BR>
				<div class="col-sm-offset-1 col-sm-10" > 
				<input type="text" name="login" size="40"  ><BR> 
				</div>
				<BR> <BR> 				
				Email Address : 
				<BR>
				<div class="col-sm-offset-1 col-sm-10" > 
				<input type="text" name="email" size="40"  ><BR> 
				</div>
				<BR> <BR> 
				Password :
				<BR> 
				<div class="col-sm-offset-1 col-sm-10"> 
				<input type="password" name="password" size="40" ><BR> 
				</div>
				<BR> <BR> 
				<input type="submit" name="submit" value="Submit">
				<input type="reset" name="reset" value="Clear It">
			</div>
			<div class="col-lg-3 col-xs-1">
			</div>
			
			
			
        </form> 
    </body> 
</html> 