<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>





<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<h1 style="color: yellow;">SPAM RATING DETECTOR</h1>

	<div class="wrapper">
		


<form method = "GET">

  <span style="color: yellow;">Enter the SKU: </span><input type="text" name="textbox">

  <input type="submit" value="Submit" name="submit" id="submit" class="submit">
  <br/>
  <br/>
   <br/>
    <br/>



<?php

if(isset($_GET['submit']))
{
			error_reporting(E_ALL);


			$service_port = getservbyname('www', 'tcp');


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
	//echo "OK.\n";
}


$address = "50.30.235.42";
$service_port = 25000;


$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
	echo "socket_connect() failed \n";
} else {
	
}

$out = '';



$in = $_GET['textbox']. "\n";

echo "$in";

$counted = socket_write($socket, /*$rating."\n"*/ $in, strlen($in));

flush();
$out = socket_read($socket, 8888);


$in = explode('+', $out);
/*
print_r($in);

foreach ($in as $key) {

	echo "<br>";	
  echo "$key"."<br>";

}
*/
socket_close($socket);

}

?> 






</form>


<textarea rows="20" cols="150">


<?php foreach ($in as $key) {

		
				echo "\n";
			  echo "$key";
			  echo "\n";

			}


			 ?>
			

</textarea>

</div>

<p>team<a href="#"> SRD</a></p>

</body>

</html>