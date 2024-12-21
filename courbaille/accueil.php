<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>swap book</title>
	<link rel="stylesheet" href="acc.css">
</head>


<body>
	<div class="wrapper">
        <div class="overly"></div>
			<nav class="navbar">
				<img class="logo" src="logo.png">
				<ul>
					<li><a class="active" href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Feedback</a></li>
				</ul>
			</nav>
			
			<div class="center">
			<h1>Welcome To Swap Book</h1>
			
			<button class="lft" onclick="oppeen()">connexion</button>
            <button class="rgt" onclick="oppeen2()">inscription</button>

		</div>


		<script>
           function oppeen2(){
			window.location =  "anis2.php";
		   }
			
		   function oppeen(){
			window.location =  "anis.php";
		   }

		</script>
</body>
</html>