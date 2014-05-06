<?php include("header.php");?>
<?php include("stock_function.php");?>
<?php include("functions.php");?>
<?php include("stock_data.php");?>

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
              <li><a href="http://www.facebook.com/rohit293" class="icon icon-facebook"><span>Facebook</span></a></li>
              <li><a href="#" class="icon icon-github"><span>Github</span></a></li>
              <li><a href="rohitkrai03@gmail.com" class="icon icon-envelope"><span>Email</span></a></li>
            </ul>
        
        </div>
      
      </div>
<?php
	global $yahoo_finance_tags;
	if ( isset($_POST["symbol"]) && !(trim($_POST["symbol"]) === "" )) {
	 	$symbol = $_POST["symbol"];
		// Getting Facebook Data
		$stock_data = get_stock_data_from_yahoo_finance_pv($symbol, $e);
		
	 }else{
	 	redirect_to("index.php");
	 }

?>
<!-- Main -->
			<div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
						<header><h2>Current Stock Quotes For <?php echo $stock_data["n"];?></h2></header>
						<?php 
							if ($stock_data != -1) {
	    				?>
	    				<table>
	    					<?php 
		    					foreach ($stock_data as $key => $value) {
		    						$string = "<tr>";
		    						$string .= "<td>" . $yahoo_finance_tags[$key] . "  : -</td>";
		    						$string .= "<td>" . $value . "</td>";
		    						$string .= "<tr>";
		    						echo $string;
		    					}
	    					?>
	    				</table>

	    				<?php		
							} else{
							    echo "<h2>No stock data is available. The detail of the error is: {$e}</h2>";
							}
						?>
							

						</div>
					</section>
			</div>

	</body>
</html>