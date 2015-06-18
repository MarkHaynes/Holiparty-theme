		<footer role="contentinfo" id="main-footer">
			<div class="inner-wrapper">
				<div class="footer-left">
					<img src="<?php bloginfo('template_url'); ?>/images/footer/logo.png" alt="HoliParty">
				</div><!--
			 --><div class="footer-right">
					<h3>Have a question for us?</h3>
					<p>Send us an email or leave us a message on facebook.</p>
					<a class="green-link"href="contact-us" title="Email Holiparty">Email Us</a><!--
					--><a class="blue-link"href="https://www.facebook.com/holipartyuk" title="HoliParty on Facebook">Facebook</a>
				</div>
			</div>
		</footer>
		<footer role="contentinfo" id="bottom-footer">
			<div class="inner-wrapper group">
				<span class="copyright">&copy Copyright Holiparty 2015.</span>
				<span class="pixellocker"><a href="http://pixellocker.co.uk" target="_blank" title="Pixel Locker Web Design">Site Design & Development by Pixel Locker</a></span>
			</div>
		</footer>

		<script type="text/javascript">

            $(document).ready(function(){
                var pageWidth = $(window).width();  
                if ( pageWidth >= 851 ) {
                    $("#mobile-button").html("Menu");
                    $( "#main-content" ).css("right", "0");
                    $( "footer" ).css("right", "0");
                    $( "nav#mobile" ).css("display", "none");

                }
                $(window).resize(function() {
                    if ($(window).width() >= 851) {
                        $("#mobile-button").html("Menu");
                        $( "#main-content" ).css("right", "0");
                        $( "footer" ).css("right", "0");
                        $( "nav#mobile" ).css("display", "none");
                    }
                });
            });

        
            $( "#mobile-button" ).click(function() {
                var value = $("#mobile-button").html();
                if (value=="Menu"){
                    $("#mobile-button").html("Close");
                    $( "#main-content" ).css("right", "-70%");
                    //$( "footer" ).css("right", "-70%");
                    $( "nav#mobile" ).css("display", "table-cell");
                }

                else {
                    $("#mobile-button").html("Menu");
                    $( "#main-content" ).css("right", "0");
                    $( "footer" ).css("right", "0");
                    setTimeout( function(){
                        $( "nav#mobile" ).css("display", "none");
                    },0);                   
                }
                
                $( "nav#mobile" ).css("min-height", "90% !important");

            });

        </script>
<?php wp_footer();?>
</body>
</html>