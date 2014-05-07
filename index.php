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
                <li><a href="#yahoo" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-th">Yahoo Finance</span></a></li>
                <li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-user">About The Project</span></a></li>
                <li><a href="#team" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-user">Our Team</span></a></li>
                <li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">Contact</span></a></li>
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

		<!-- Main -->
			<div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">

														
							
							<img src="images/logo.png"/>
	
							<hr/>
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
							
							<h4>Select On a Stock to Dive Into The Future of Stock Market Trading.</h4>
							<hr/>
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

					<section id="yahoo" class="one">
						<div class="container">
							<!-- Start of Yahoo! Finance code -->
							<iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://badge.finance.yahoo.com/instrument/1.0/GOOG,FB,MSFT,AMZN,IBM,AAPL,GE,TWTR/badge;chart=1y;news=5;quote/HTML?AppID=PGIdZ1QoWGOdXdhlFXcOUERCopTq&sig=4KGCIVjnjfEqOJ9lchD19WqNps8-&t=1399448920379" width="300px" height="1654px"><a href="http://finance.yahoo.com">Yahoo! Finance</a><br/><a href="http://finance.yahoo.com/q?s=GOOG">Quote for GOOG</a></iframe>
							<!-- End of Yahoo! Finance code -->

						</div>
					</section>


				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							
							<h2>About The Project</h2>
							<hr/>

							
							<p>Stock market analysis and prediction is one of the interesting areas in which past data could be used to anticipate and predict data and information about future. Technically speaking, this area is of high importance for professionals in the industry of finance and stock exchange as they can lead and direct future trends or manage crises over time. Using the stochastic processes called Markov Chains, we sought out to predict the immediate future stock prices for a few given companies. We found the moving averages for the data and the grouped them into ten different states of results. We then applied Markov Chain calculations to the data to create a 4x4 transitional probability matrix. Using this transition matrix we solved a system of equations and found 4 steady states that were variables that represented the probability that a stock price for a given day would fall into one of the ten states. When we use this information we can apply our actual data to these equations and predict the next stock prices for the near future. We were able to successfully predict the next few days of stock prices using this method.</p>

						</div>
					</section>
					<section id="team" class="one">
						<div class="container">

							<h2>Team Iterators</h2>
							<hr/>
							<div class="row">
								<div class="4u">
									<article class="item">
										<a href="http://www.facebook.com/rohit293" target="_blank" class="image full"><img src="img/rohit.jpeg" alt="" /></a>
										<header>
											<h3>Rohit Kumar Rai</h3>
										</header>
									</article>
									
								</div>
								
								<div class="4u">
									<article class="item">
										<a href="http://www.facebook.com/satrajit.das.9" target="_blank" class="image full"><img src="img/satrajit.jpg" alt="" /></a>
										<header>
											<h3>Satrajit Das</h3>
										</header>
									</article>
									<article class="item">
										<a href="http://www.facebook.com/rima.roy.351" target="_blank" class="image full"><img src="img/rima.jpg" alt="" /></a>
										<header>
											<h3>Rima Roy</h3>
										</header>
									</article>
								</div>
								<div class="4u">
									<article class="item">
										<a href="http://www.facebook.com/akshat.singh.14" target="_blank" class="image full"><img src="img/akshat.jpg" alt="" /></a>
										<header>
											<h3>Akshat Kumar</h3>
										</header>
									</article>
									
								</div>
							</div>
							
							

						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<h3>Feel free to drop a Message to Us!!!</h3>
							
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