
<!DOCTYPE HTML>
<html>
<head>
	<title>SPAM RATING DETECTOR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="web/js/jquery.min.js"></script>
	<script src="web/js/jquery.easydropdown.js"></script>
	<script type="text/javascript" src="web/js/script.js"></script>

	<script src = "//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<script type="text/javascript" src="web/js/jquery.nivo.slider.js"></script>
	<script src="web/js/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="web/css/magnific-popup.css" rel="stylesheet" type="text/css">





	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
		(function($, undefined){
                        $.widget("ab.notify", $.ui.dialog, {
                                options: {
                                        resizable: true,
                                        draggable: true,
                                        autoOpen: false,
                                        error: false,
                                        title: "Creative Commons License",
				position: ["bottom", "bottom"]
                                },
                                open: function(){
                                        var error = this.options.error,
                                            newClass = error ? "ui-state-error" : "hi-state-highlight",
                                            oldClass = error ? "hi-state-highlight" : "hi-state-error";
                                        this.element.html(this.options.text);
                                        this.uiDialog.addClass(newClass)
                                            .removeClass(oldClass)
                                            .find(".ui-dialog-titlebar")
                                            .removeClass("ui-widget-header hi-corner-all");
                                        this._super();
                                }
                        });
                })(jQuery);
                $(function(){
				$("#creativecommonslicense").notify();
                $("#show-info").click(
                        function(e){
                                $("#creativecommonslicense").notify("option", {
                                        error: false,
                                        text: "<span id='creativecommons'><a rel='license' href='http://creativecommons.org/licenses/by-sa/4.0/' target='_blank'><img alt='Creative Commons License' style='border-width:0' src='http://i.creativecommons.org/l/by-sa/4.0/88x31.png' /></a><br /><span xmlns:dct='http://purl.org/dc/terms/' href='http://purl.org/dc/dcmitype/StillImage' property='dct:title' rel='dct:type'>The El Salvador Mural Archive</span> by <a xmlns:cc='http://creativecommons.org/ns#' href='http://www.rachelheidenry.com/home.php' property='cc:attributionName' rel='cc:attributionURL'>Rachel Heidenry</a> is licensed under a <a rel='license' href='http://creativecommons.org/licenses/by-sa/4.0/' target='_blank'>Creative Commons Attribution-ShareAlike 4.0 International License</a>.</span>"
                                });
                                $("#creativecommonslicense").notify("open");
                        }
                );


				<?php 
					if($_POST == NULL){
						//echo "POST was NOT set.";
					}else{	
				?>

				$(document).ready(function() {
			    $("#creativecommonslicense").notify("option", {
                            error: false,
                            text: "<span id='creativecommons'><a rel='license' href='http://creativecommons.org/licenses/by-sa/4.0/' target='_blank'><img alt='Creative Commons License' style='border-width:0' src='http://i.creativecommons.org/l/by-sa/4.0/88x31.png' /></a><br /><span xmlns:dct='http://purl.org/dc/terms/' href='http://purl.org/dc/dcmitype/StillImage' property='dct:title' rel='dct:type'>The El Salvador Mural Archive</span> by <a xmlns:cc='http://creativecommons.org/ns#' href='http://www.rachelheidenry.com/home.php' property='cc:attributionName' rel='cc:attributionURL'>Rachel Heidenry</a> is licensed under a <a rel='license' href='http://creativecommons.org/licenses/by-sa/4.0/' target='_blank'>Creative Commons Attribution-ShareAlike 4.0 International License</a>.</span>"
                    });
                    $("#creativecommonslicense").notify("open");
				});


				<?php	
					}
				?>

				
				

				

				


	});
	</script>







	<script type="text/javascript">
	$(window).load(function() {

		$('#slider').nivoSlider();
	});
	</script>   

</head>
<body>








	<?php
	$msg_correct = "default";
	$msg_error = "default";

	$rating = @$_POST['rating'];
	$flag = 0;
	/*$out = "This is default";*/

	?>


	<div class="header" id="home">
		<div class="header_top">
			<div class="wrap">
				<!-- LOGO-->
				<div class="logo">
					<!-- <a href="index.html"><img src="web/images/logo.png" alt="" /></a> -->
				</div>	
				<div class="menu">
					<ul>
						<li class="current"><a href="#section-1" class="scroll"> Search your product</a></li>
						<li><a href="#section-2" class="scroll">About</a></li>
						<!-- <li><a href="#section-3" class="scroll">How it works</a></li>
						<li> <a href="#section-4" class="scroll">Contact</a></li> -->
						<li class="login" >
							<div id="loginContainer"><a href="https://bbyopen.com/api-profiles/reviews-api" id="loginButton"><span> + BBY</span></a>

							</div>
						</li>
						<div class="clear"></div>
					</ul>
				</div>							
				<div class="clear"></div>
			</div>
		</div>
	</div>			      	
	<div class="main" id="container">
		<div class="content">	
			<div class="content_top section" id="section-1">  
				<div class="wrap">                                  		
					<div class="banner_desc">
						<div class="wmuSlider example1">
							<div class="wmuSliderWrapper">
								<article><p>Spam Rating Detector</p> <img src="web/images/system.png"  alt="" /> </article>

								<article><p>Runs on Apache MAHOUT, a scalable machine learning system</p> <img src="web/images/clouds.png"  alt="" /> </article>

								<article><p>Calculates genuine rating score for the BestBuy products in electronics category</p> <img src="web/images/slider-img3.png"  alt="" /> </article>

								<article><p>Future Enhancement to generalize and include more products</p> <img src="web/images/slider-img4.png"  alt="" /> </article>
							</div>
						</div>
						<script src="web/js/jquery.wmuSlider.js"></script>
						<script type="text/javascript" src="web/js/modernizr.custom.min.js"></script> 
						<script>
						$('.example1').wmuSlider();         
						</script> 	   

						<div class="dropdown-buttons">   
							<div class="dropdown-button">           			
								<select class="dropdown" tabindex="4" data-settings='{"wrapperClass":"flat"}' id="select_id">
									<option value="0">Select the product</option>	
									<!-- <option value="1">Macbook Pro</option> -->
									<option value="2">Lenovo Yoga 2</option>
									<!-- <option value="3">Dell </option> -->
									<option value="4"></option>

								</select>
							</div>

						</div>  



						<div class="quote_button">
							<a class="popup-with-zoom-anim" href="#small-dialog">+ Get the Rating</a>
							<div id="small-dialog" class="mfp-hide">
								<div class="priceing-tabel">
									<div class="priceing-header">
										<h4>Spam Rating Details</h4>
										<a href="#">4.1<label> with SPAM ratings </label></a>
										<a href="#">4.0<label> without SPAM ratings </label></a>
										
									</div>

								

								 
								
								
									<!-- <ul>
										<li><a href="#" id="output">4.</a></li>
										
										


									</ul> -->
								</div>
								<!-- <a class="price-btn" href="#">Order Now</a> -->
							</div>
						</div>
					</div>   


				</div> <!--wrap close div -->
			</div> <!--content top close div -->

		</div> <!-- content_top-->
	</div> <!--content-->
</div> <!-- wrap close -->

<!-- 	 <div class="main" id="container" > -->

<div class="content" >	

	<!-- <div id="creativecommonslicense"></div> -->    <!-- #####################################################################-->
	<div class="content_top1 section" id="section-2" style="background:rgb(42,49,61); height: 800px; ">  


		<p style="padding-left: 33%; padding-top: 100px; font-size: 60px; font-family: 'Open Sans'; color: rgb(209,95,34); ">
			Spam Rating Detector
		</p>


		<div class="banner_desc" style="height:500px; padding: 2em 0 3em 0;"> 
			<div>

				<!-- <form action="" method="get" action="" id="carform">
					Firstname: <input type="text" name="fname">
					<select name="carlist" form="carform">
						<option value="volvo">Volvo</option>
						<option value="saab">Saab</option>
						<option value="honda">Honda</option>
					</select>
					<input type="submit">
				</form> -->

				<form method="post" name="input" action="#section-2" id="ratingdropdown">
					<div class="dropdown-buttons">
						<div class="dropdown-button" style="float: left; position: relative; left: 25%;">           			
							<select form="ratingdropdown" name="ratingdropdown1" class="dropdown" tabindex="7" data-settings='{"wrapperClass":"flat"}' style=" display: inline; padding-bottom: 100px;" id="select">
								<option value="0">Select your rating</option>	
								<option value="1">1.0</option>
								<option value="2">2.0</option>
								<option value="3">3.0</option>
								<option value="4">4.0</option>
								<option value="5">5.0</option>
								<option value="6"></option>
								<option value="7"></option>
							</select>
						</div>
						<div class="dropdown-button" style="float: left; position: relative; left: 25%; width: 25%;">
							<div class="tester">
								<input id="rating" name="rating" class="rating" type="text" style="border-radius: 5px; height: 55px; padding-left:15px; font-size: 18px; width: 100%; font-family: 'Raleway'; color: rgb(136,136,136);" placeholder="Enter your review">
							</div>
						</div>
						<div style="clear: both">


<!--<a href="#creativecommonslicense" id="show-info">Creative Commons License</a>-->

							
							<div id="show-info">
							<input type="submit" style="margin-top:25px; display:inline-block;
							color:#FFF;
							font-size:1.2em;
							font-weight:400;
							background:#7accc8;
							padding:20px 60px;
							border-bottom:4px solid #45A39E;
							border-radius:3px;
							-webkit-border-radius:3px;
							-moz-border-radius:3px;
							-o-border-radius:3px;
							-webkit-transition: all 0.3s ease;
							-moz-transition: all 0.3s ease;
							-o-transition: all 0.3s ease;
							transition: all 0.3s ease;">
							</div>

						</div>
					</div>




				</form>

				

				<br/>
				<br/>
				<br/>


				<!-- <div class="quote_button" onclick="phpcode()">

					<!--<a class="popup-with-zoom-anim" href="#small-dialog">+TestRating</a>-->
					<!-- <div id="small-dialog" class="mfp-hide">
						<div class="priceing-tabel">
							<div class="priceing-header">
								<h4>Spam Rating Details</h4>
								<a href="#">4.5<label> without SPAMMMERS</label></a>
							</div>
							<ul>
								<li><a href="#">4.9 with SPAMMERS</a></li>
								<li id="output"></li>
								<li><a href="#">150 HAMs</a></li>
							</ul>
							<!-- <a class="price-btn" href="#">Order Now</a> -->
						<!-- </div>
					</div>
				</div> -->

			</div> 
			<br/>
			<br/>
			<br/>
			

			<?php

			//print_r($_POST);



			$rating = $_POST['ratingdropdown1'];
			$review = $_POST['rating'];


			error_reporting(E_ALL);

//echo "$rating"."\n";

			//echo "TCP/IP Connection\n";

			/* Get the port for the WWW service. */ 
			$service_port = getservbyname('www', 'tcp');

/* Get the IP address for the target host. 
$address = gethostbyname('www.example.com');
*/
/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
	//echo "OK.\n";
}

/*dans code */
$address = "129.21.83.125";
$service_port = 35000;

//echo "Attempting to connect to '$address' on port '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
	echo "socket_connect() failed \n";
} else {
	//echo "OK.\n";
}

/*
$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.example.com\r\n";
$in .= "Connection: Close\r\n\r\n";

*/
$out = '';
//$rating =  $rating*1.0;
$in = $rating.".0"." ".$review."\n";

//echo "$in";

//echo "Sending ...";
$counted = socket_write($socket, /*$rating."\n"*/ $in."\n", strlen($in));

//echo "OK. Sent $counted\n";

//echo "Reading response:\n\n";
flush();
$out = socket_read($socket, 2048);





//echo "Closing socket...";
socket_close($socket);
//echo "OK.\n\n";


?> 

<div style="color: rgb(228,115,39); font-size: 19em;">
<?php 



		if($_POST != NULL){
		
			echo $out; 
		}
?>

</div>
<!-- 
<textarea rows="100" cols="100" style="border-radius:5px; width:840px; height: 200px; font-size: 18px;" placeholder="Details of your rating" readonly>
	<div>
	
</div>
</textarea>

 -->

</div>


</div>
</div>
</div>


</div>


<div class="copy-right">
	<div class="wrap">
		<p class="copy">&copy; 2014 SPAM RATING DETECTOR <a href="#">Arpeet Kale, Saurabh Mehta, Jaime Montoya</a> </p>
	</div>
</div> 

<script>	
function phpcode()
{	  
	alert("inside phpcode");
	<?php print_r($_POST); ?>
	var review = document.getElementById("rating");
	var rating = document.getElementById("select");
	alert(rating+review);
 //var rating = "1.0 This is good rating";
 $.ajax({
 	url: "index.php",
 	type: "POST",
 	data: {value:<?php echo $out;?>},
 	success: function(result){
 		document.getElementById("output").innerHTML(result);
 		alert(result);

 	}
 })
}
</script>

</body>
</html>

