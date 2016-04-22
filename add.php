<html> 
	<head>
	<?php
	require ("classes/config.php");
	require ("classes/clean.php")

	?>
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">
	</head>
    <body> 
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
                <a class="navbar-brand" href="index.php"> COMIC FINDER</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="welcome.php">Favorites</a>
                    </li>
                    <li>
                        <a href="heros.php">Heros</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
				</ul>
			</div>		
			</div>
		</nav>
	<?php 
	if(isset($_POST['submit'])){
	
			$psql=pg_query($conn, "select * from char where charname='$charname'");
				if( pg_num_rows($psql)>0){
					echo "Sorry that email is already in use";
				} 
				
				else{
					
					$charname =$_POST['charname'];
					$charreal =$_POST['charreal'];
					$picture =$_POST['picture'];
					$earthname=$_POST['earthname'];
					$x=0;
					while ($x<$i)
					{
						$key =$_POST['key$x'];
						$pair=$_POST['pair$x'];
						$strnum=substr_count($my_string, ",");
						if (is_numeric ($strnum))
						{
							
						}
						elseif($strnum==0)
						{
							$pair="'".$pair."'";
						}
						else{
							$pair= "[".(str_replace(",","','")) ."]";
						}
						
						$extra=$extra.",".$key.",".$pair ;
						$x++;
					}
					
					
					
					$query = "INSERT INTO char(charname, charreal, picture, earthname, extra) VALUES('" . $charname . "', '" . $charreal . "', '" . $picture . "','" . $earthname . "', '" . $extra . "' )";
					$result=pg_query($query);
					if (!$result) { 
						$errormessage = pg_last_error(); 
						echo "Error with query: " . $errormessage; 
						exit(); 
					}	 
					pg_close($conn);
				}
	}	
	else{
	?>
<div class="container">
	<div class="col-xs-12 col-lg-12 fun center" >	
		<form action="CreateLogin.php" method="POST" autocomplete="off"> 
				<h1> Create New User</h1>
				
				<label for="inputchar" class="sr-only">Hero's Name</label>
				<input type="text" name="charname" class="form-control" placeholder="charname" required autofocus>
				<br/>
				
				<label for="inputchar" class="sr-only">Real Name</label>
				<input type="text" name="charreal" class="form-control" placeholder="charreal" required >
				<br/>
				
				<label for="inputchar" class="sr-only">Picture</label>
				
				<input type="text" name="picture" class="form-control" placeholder="picture" required >
				<br/>
				
				<label for="inputchar" class="sr-only">earthname</label>
				
				<input type="email" name="earthname" class="form-control" placeholder="earthname" required >
				<br/>
				<br/>
				
				<button class="btn btn-sm btn-primary btn-block" type="submit" name="add" value="add">Add more details</button>
				
				<button class="btn btn-md btn-primary btn-block" type="submit" name="add" value="add"></button>
				
				
				
				<button class="btn btn-md btn-primary btn-block" type="submit" name="detail" value="detail">Add more details</button
				<?php
				$count=0;
				if(isset($_POST['add']))	
				{
					$count++;	
					$i=0;
					while ($i<$count)
					
					echo'
					<label for="inputchar" class="sr-only">Detail Type</label>
					<input type="text" name="key$i" class="form-control" placeholder="Detail" required >
					
					<label for="inputchar" class="sr-only">Detail</label> 
					
					<input type="text" name="pair$i" class="form-control" placeholder="Detail" required >
					
					';
					$i++;
				}
				?>
				
				<br/>
				
				<label for="Password" class="sr-only">Verify Password </label>
				<input type="password" name="passwordv" class="form-control" placeholder="Password Verify" required >
				<br/>
				
				
				
				<button class="btn btn-md btn-primary btn-block" type="submit" name="submit" value="submit">Submit</button>
				<button class="btn btn-md btn-primary btn-block" type="reset" name="Reset" value="clear it"> Clear Form</button>
				<input type="submit" name="submit" value="Submit">
				<input type="reset" name="reset" value="Clear It">
        </form> 
    </div>
</div>
	<?php
	}
		?>
    </body> 
</html> 