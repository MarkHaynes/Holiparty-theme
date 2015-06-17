<?php
/*
Template Name: Custom Contact Page
*/
get_header(); 

		function stripcleantohtml($s){
	
			return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
		}

		$complete = false;

 		if (isset($_POST['submit'])) {
 			$human = stripcleantohtml($_POST['txtHuman']);

 			if ($human == "Holi Party" || $human == "HoliParty" || $human == "Holi" || $human == "Party" || $human == "holiparty.co.uk" || $human == "HolyParty" || $human == "Holy Party") {

 				$humanConfirm = true;
	 			$requiredField = array($_POST['txtFullname'], $_POST['txtTelephone'], $_POST['txtEnquiry']);
	 			$errorRequired = array();
	 			$errorMessage = array();

	 			foreach ($requiredField as $key => $value) {
	 				if (empty($value)) {
	 					$errorRequired [] = $value;
	 				}
	 			}

	 			if (in_array($_POST['txtFullname'], $errorRequired)) {
	 				$errorMessage[] = "We love to know who you are, can you provide your name?";
	 			}
	 			if (in_array($_POST['txtTelephone'], $errorRequired)) {
	 				$errorMessage[] = "We like to be able to contact you, a phone number would be great.";
	 			}
	 			if (in_array($_POST['txtEnquiry'], $errorRequired)) {
	 				$errorMessage[] = "Could you tell us what you wish to enquire about today?";
	 			}

	 			if (empty($errorRequired)) {
	 				
	 				$email_message = "<style>label {display:block;}</style>";

	 				$email_message .= "<h1>";
					$email_message .= "HoliParty Website Enquiry";
					$email_message .= "</h1>";
					$email_message .= "\n\n\n\n";

					$email_message .= "<label>Fullname:<br>";
					$email_message .= stripcleantohtml($_POST['txtFullname']);
					$email_message .= "</label>";
					$email_message .= "<br>";

					$email_message .= "<label>Company Name:<br>";
					$email_message .= stripcleantohtml($_POST['txtCompany']);
					$email_message .= "</label>";
					$email_message .= "<br>";

					$email_message .= "<label>Email:<br>";
					$email_message .= stripcleantohtml($_POST['txtEmail']);
					$email_message .= "</label>";
					$email_message .= "<br>";

					$email_message .= "<label>Telephone:<br>";
					$email_message .= stripcleantohtml($_POST['txtTelephone']);
					$email_message .= "</label>";
					$email_message .= "<br>";

					$email_message .= "<h1>Enquiry:</h1>";
					$email_message .= stripcleantohtml(nl2br($_POST['txtEnquiry']));
					$email_message .= "<br>";
					$email_message .= "<br>";
					$email_message .= "Enquiry Complete!";			

	 				$message = $email_message;
				    $to = "enquiries@holiparty.co.uk"; 
				    $from = "enquiries@holiparty.co.uk"; 
				    $subject = "HoliParty Website Enquiry"; 

					$headers = "From: " . $from . "\r\n";
					$headers .= "Reply-To: ". $to . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				   // now we just send the message
				   if (@mail($to, $subject, $message, $headers)){
				   	$completed =  true;
				   }
				      
				   else{
				      $error = "Sorry there has been a problem sending your message. Please email us directly at enquiries@holiparty.co.uk";
				   }
	 			}
	 			else {
					$error =  "There has been a problem sending your message. Please email us directly at enquiries@holiparty.co.uk";
				}
	 		}
	 		else {
	 			$error =  "Well this is odd, you failed our Human test :( Try again and enter HoliParty in our Company name.";
	 		}
	 	}
?>
<div class="wrapper">
<main id="main-content">
	<section id="promo-bar">
		<div class="inner-wrapper">
			<div class="promo-info-wide">
				<span>We supply coloured throwing powder, also known as Holi and Gulal Powder in convenient packages.</span>
			</div>

			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/bagicon.png">
			</div>
			<div class="promo-cell"> 
				<span>Ready to throw 100g Bags.</span>
			</div>

			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/bundleicon.png">
			</div>
			<div class="promo-cell">
				<span>Multicoloured Party Bundles</span>
			</div>
			<div class="promo-image">
				<img src="<?php bloginfo('template_url'); ?>/images/promo/largebundleicon.png">
			</div>
			<div class="promo-cell">
				<span>Event and Festival Bundles.</span>
			</div>
		</div>
	</section>

	</div>
	<div class="content-wrap">
		<section class="content">
			<div class="inner-wrapper">
				<article class="page-single">
				  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="top-heading colour-green"><?php the_title();?></h1>
					<h2>It would be great to hear from you :)</h2>

					<?php 
					if ($completed == true) { ?>
							<div style="text-align: center;">
								<h1 class="title">Thank you for contacting us, we are excited to contact you shortly.</h1>
							</div>
					<?php }
						
					else {
				?>

		
				<ul class="formError">

					<?php echo $error;?>
						<?php 

						if (!empty($errorMessage)) {

							echo "<br>";
							foreach ($errorMessage as $key => $value) {
								echo "<li>" . $value . "</li>";
							} 
					}?>

				</ul>

				<?php the_content();?>

				<div class="contact-left">
					<strong> Please Enter Your Details Below:</strong><br><br>
				   		<form id="frmContact" action="#" method="post">
					   		<label>
					   			Full Name:<br>
					   			<input name="txtFullname" type="text"  autofocus value="<?php echo stripcleantohtml($_POST['txtFullname']);?>">
					   		</label>
					   		<br>

					   		<label>
					   			Company Name (if applicable):<br>
					   			<input name="txtCompany" type="text" value="<?php echo stripcleantohtml($_POST['txtCompany']);?>">
					   		</label>
					   		<br>

					   		<label>
					   			Email Address:<br>
					   			<input name="txtEmail" type="email" value="<?php echo stripcleantohtml($_POST['txtEmail']);?>">
					   		</label>
					   		<br>

					   		<label>
					   			Telephone:<br>
					   			<input name="txtTelephone" type="tel"  value="<?php echo stripcleantohtml($_POST['txtTelephone']);?>">
					   		</label>
					   		<br>

					   		<label>
					   			Your Enquiry: <br>
					   			
					   			<textarea name="txtEnquiry" ><?php echo stripcleantohtml($_POST['txtEnquiry']);?></textarea>
					   		</label>
					   		<br>

					   		<?php if ($humanConfirm == true) {
					   				echo '<div style="display:none;">';
					   			}
					   			 else {
					   			 	echo '<div style="display:block;">'; 
					   			}
					   		?>

						   		<label class="required">
						   			Just to check you're human, what's the name of OUR Company?<br>(Hint, Holi...)<br>
						   			<input type="text" name="txtHuman" value="<?php echo stripcleantohtml($_POST['txtHuman']);?>">
						   		</label>
						   		<br>

					   		<label>
					   			<input name="submit" type="Submit" value="Send Enquiry">
					   		</label>

				   		</form>
	 					<?php } ?>
	 					</div>
					</div><!--
				 --><div class="contact-right">
				   		<ul>
				   			<li> <strong>Email: <br></strong> <email><a href="mailto:enquiries@holiparty.co.uk">enquiries@holiparty.co.uk</a></email><br></li><br>
				   			<li> <strong>Telephone: <br> </strong> 01782 704436 or 0796 161 8368<br><br></li>
				   			<li> <strong>Head Office Address: <br> </strong> 14 Davey Close <br> Staffordshire <br> ST5 0GR <br> United Kingdom<br><br></li>
				   		</ul>
					</div>
				</article>

				<?php endwhile; else: ?>
		        <article class="page-single">
		          <p>Sorry, no posts matched your criteria.</p>
		        </article>
		      <?php endif; ?>
			</div>
		</section>
	</div>
</main>
</div>

<?php get_footer();?>