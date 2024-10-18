<?php
session_start();
if ($_SESSION['auth'] != 1) {
	header("Location: index.php");
}
?>
<html lang="en">

<head>
	<title>OPTICIANS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			background: url('https://images.unsplash.com/photo-1577400983943-874919eca6ce?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
			background-size: cover;
			font-family: Arial, sans-serif;
		}

		.lf {
			background: rgba(255, 255, 255, 0.8);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(5px);
		}

		.lf h1 {
			font-size: 28px;
			color: #333;
			text-align: center;
			margin-bottom: 30px;
		}

		.lf input[type="text"],
		.lf input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			outline: none;
		}

		.lf input[type="submit"] {
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			background-color: #008ad3;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
		}

		.lf input[type="submit"]:hover {
			background-color: #00578a;
		}

		.alert {
			margin-top: 20px;
		}

		/* Custom CSS for the FAB */
		.fab-container {
			box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
			background: rgba(255, 255, 255, 0.8);
			border-radius: 10px;
			backdrop-filter: blur(5px);
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 1000;
			/* Ensure it's above other elements */
		}

		.fab-container :hover {
			box-shadow: 0px 0px 10px 5px white;
			border-radius: 10px;
			background-color: #f4d2c4;
		}

		.footer {
			background: rgba(255, 255, 255, 0.8);
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(5px);

			position: absolute;
			bottom: 0;
			width: 100%;
			color: black;
			text-align: center;
			padding: 20px 0;
		}

		.footer a {
			color: black;
		}
	</style>
</head>

<body>
	<?php
	include("navbar.php");
	?>
	<div class="container">
		<br /><br /><br />
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1 class="text-center" style="font-size: 60px; font-family: 'Arial', sans-serif; font-weight: bold;">
					About</h1>
				<br><br>
			</div>

		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h5>About</h5>
				<p>An ecommerce website, also known as an electronic commerce website, is a digital platform that
					revolutionizes the way businesses and consumers engage in commercial transactions. It serves as a
					virtual marketplace, bringing together buyers and sellers from around the world, where products and
					services can be showcased, marketed, and purchased with ease. One of the key advantages of ecommerce
					websites is the convenience they offer. Customers can access the website at any time and from
					anywhere, eliminating the limitations of traditional brick-and-mortar stores. With just a few
					clicks, users can browse through extensive catalogs of products, compare prices, read reviews, and
					make informed decisions before making a purchase. The ability to shop 24/7 enhances the flexibility
					and accessibility for consumers, accommodating different schedules and time zones. Moreover,
					ecommerce websites provide a seamless and secure online shopping experience. They integrate robust
					payment gateways that encrypt sensitive information, ensuring the confidentiality and safety of
					transactions. Customers can choose from various payment options, including credit cards, digital
					wallets, or bank transfers, adding to the convenience and flexibility of the purchasing process.
					Additionally, these websites often have personalized user accounts, enabling customers to store
					their preferences, track orders, and receive personalized recommendations, creating a tailored
					shopping experience. For businesses, ecommerce websites offer immense opportunities for growth and
					expansion. They break down geographical barriers, enabling businesses to reach customers beyond
					their local market. With a well-designed website, businesses can showcase their products or services
					to a global audience, attracting a larger customer base and increasing sales potential. Ecommerce
					websites also allow for effective marketing strategies, such as targeted advertisements, email
					campaigns, and social media integration, helping businesses reach their desired audience and build
					brand loyalty.</p>
			</div>
			<div class="col-md-6">
				<h5>Contact</h5>

				<p>Website: <a href="http://erasoftindia.com">erasoftindia.com</a></p>
				<p>Email: <a href="mailto:erasoftindiadev@gmail.com">erasoftindiadev@gmail.com</a></p>
				<p>Phone: <a href="tel:+919464879699">+91 94648-79699</a></p>
				<br>
				<h5>Follow Us</h5>
				<a href="#"><i class="fab fa-facebook-f"></i><img src='icons\facebook.svg' /></a>
				<a href="#"><i class="fab fa-whatsapp"></i><img src='icons\whatsapp.svg' /></a>
				<a href="#"><i class="fab fa-instagram"></i><img src='icons\instagram.svg' /></a>
				<a href="#"><i class="fab fa-linkedin"></i><img src='icons\linkedin.svg' /></a>

			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>