<?php include("header.php");?>
<?php require_once("db_connection.php");?>
<?php require_once("functions.php");?>
<?php require_once("validation_functions.php");?>

<!-- Header -->
      <div id="header" class="skel-panels-fixed">

        <div class="top">

          <!-- Logo -->
            <div id="logo">
              <a href="index.php"><span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span></a>
              <a href="index.php"><h1 id="title">&lt;!ter@tors.!n&gt;</h1></a>
              <span class="byline">Predicting The Unpredictable</span>
            </div>

          <!-- Nav -->
            <nav>
              <ul>
                <li><a href="index.php"><span class="icon icon-home">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
                
              </ul>
            </nav>
            
        </div>
        
        <div class="bottom">

          <!-- Social Icons -->
            <ul class="icons">
              <li><a href="http://www.facebook.com/rohit293" target="_blank" class="icon icon-facebook"><span>Facebook</span></a></li>
              <li><a href="https://github.com/rohitkrai03/iterators" target="_blank" class="icon icon-github"><span>Github</span></a></li>
              <li><a href="mailto:rohitkrai03@gmail.com" class="icon icon-envelope"><span>Email</span></a></li>
            </ul>
        
        </div>
      
      </div>

      <div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
						
							<?php
							  if(isset($_POST['name'])){
							    
							    // Validations.
							    $required_fields = array("name", "email","message");
							    validate_presences($required_fields);

							    $fields_with_max_lengths = array("name" => 32, "email" => 64, "message" => 1024);
							    validate_max_lengths($fields_with_max_lengths);

							    
							    if(empty($errors)){
							      //Perform update.
							      	
							      $name = mysql_prep($_POST["name"]);
							      $email = mysql_prep($_POST["email"]);
							      
							      $message = mysql_prep($_POST["message"]);
							      
							      
							      

							      $query = "INSERT INTO messages ";
							      $query .= "(name, email, message) ";
							      $query .= "VALUES ('{$name}', '{$email}', '{$message}')";
							      
							      $result = mysqli_query($connection, $query);
							      // Test if there was a query error.
							      if($result && mysqli_affected_rows($connection) >= 0){
							        //Success
							        echo "<h2>Your Message has been sincerely recieved by Us!! Thank You...</h2";
							        
							      } else {
							        //Failure
							        echo "<h2>Due to some error, your request cannot be processed by us!! Please try again later...<h2>";
							      }

							    }
							  } else{
							    redirect_to("index.php");
							  }

							?>

							<h3>
							<?php echo form_errors($errors);?>
							</h3>
						</div>
					</section>
			</div>

	</body>
</html>


