<?php
//Session Starts Here
session_start();

if (isset($_POST['resetData'])) {
	session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		.button1 {
			background-color: black;
			color: black;
			margin-left: 85%;
			font-size: 20px;
		}
	</style>
</head>

<body>
	<div id="header">
		<?php
		include './header.php';
		?>
	</div>
	<div id="main">
		<div id="products">
			<!-- Dynamic Display part Begins Here -->

			<!-- Dynamic Display part Ends Here -->
		</div>
	</div>
	<br>
	<!-- To empty Cart items -->
	<div class="row"> <button class="button1" type="submit" id="emptyCart">&#128465;</button> </div>

	<!-- To display bill Amount  -->
	<p id="billAmmount"></p><br>

	<!-- To display the cart Items -->
	<table id="cart">
	</table>

	<!-- To Reset Session Data -->
	<form action="" method="POST">
		<p style="margin-left:2% ">Reset data:
			<button style="margin-left:2% " type=submit name="resetData">&#9850;</button>
		</p>
		<hr>
	</form>

	<div id="footer">
		<?php
		include './footer.php';
		?>
	</div>
</body>
<script src="./ajaxCartScript.js"></script>

</html>