<?php include("header.php");?>

<!-- Header -->
      <div id="header" class="skel-panels-fixed">

        <div class="top">

          <!-- Logo -->
            <div id="logo">
              <span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
              <h1 id="title">&lt;!ter@tors.!n&gt;</h1>
              <span class="byline">Predicting The Unpredictable</span>
            </div>

          <!-- Nav -->
            <nav id="nav">
              <ul>
                <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-home">Home</span></a></li>
                <li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-th">Predict The Future</span></a></li>
                <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-user">About</span></a></li>
                <li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">Contact</span></a></li>
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

		<!-- Main -->
			<div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">

														
							
							<img src="images/logo.png"/>
	
							
							<form name="quotes" role="form" method="post" action="get_stock.php">
								<div class="row half">
									<div class="12u"><input type="text" class="text" name="symbol" placeholder="Enter The Stock Symbol" /></div>
								</div>
								
								<div class="row half">
									<div class="12u">
										<a href="#" class="button submit">Get Quotes</a>
									</div>
									
								</div>
							</form>

							

						</div>
					</section>

					
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
							
							<p>Select On a Stock to Dive Into The Future of Stock Market Trading.</p>
						
							<div class="row">
								<div class="4u">
									<article class="item">
										<a href="predict.php?stock=microsoft" class="image full"><img src="img/microsoft_logo.jpg" alt="" /></a>
										<header>
											<h3>Microsoft</h3>
										</header>
									</article>
									<article class="item">
										<a href="predict.php?stock=facebook" class="image full"><img src="img/facebook_logo.jpg" alt="" /></a>
										<header>
											<h3>Facebook</h3>
										</header>
									</article>
								</div>
								<div class="4u">
									<article class="item">
										<a href="predict.php?stock=apple" class="image full"><img src="img/apple_vertical.png" alt="" /></a>
										<header>
											<h3>Apple</h3>
										</header>
									</article>
									
								</div>
								<div class="4u">
									<article class="item">
										<a href="predict.php?stock=general_electrics" class="image full"><img src="img/ge_logo.jpg" alt="" /></a>
										<header>
											<h3>General Electrics</h3>
										</header>
									</article>
									<article class="item">
										<a href="predict.php?stock=ibm" class="image full"><img src="img/ibm_logo.jpg" alt="" /></a>
										<header>
											<h3>IBM</h3>
										</header>
									</article>
								</div>
							</div>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>About The Project</h2>
							</header>

							<img src="images/pic08.jpg" alt="" />
							
							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus 
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae 
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem 
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper 
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec 
							ornare iaculis.</p>

						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<p>Feel free to drop a Message to Us!!!</p>
							
							<form method="post" action="contact.php">
								<div class="row half">
									<div class="6u"><input type="text" class="text" name="name" placeholder="Name" /></div>
									<div class="6u"><input type="text" class="text" name="email" placeholder="Email" /></div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<a href="#" class="button submit">Send Message</a>
									</div>
								</div>
							</form>

						</div>
					</section>
			
			</div>

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2014 iterators.in. All rights reserved.</p>
						
					</div>
				
			</div>
        
	</body>
</html>