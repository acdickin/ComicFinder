class randomHero(){
			var rand =Math.floor((Math.random() * num) + 1);
			<?php
			session_start(); 
			$_SESSION['rand'] ?>= rand;
			
			}	