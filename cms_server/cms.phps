<DOCTYPE html>
<head>
<!--URL: https://cs1.ucc.ie/~qn1/cms.php-->
	<title>CMS Prototype</title>
	<!--Responsive design here could make the webiste looks resonable according to viewing device, the further test is needed-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
	margin: 0;
	font-family: Arial, Helvetica, sans-serif;
}

header{
	border-bottom: solid 1px black;
	padding: 10px;
	font-size: 35px;
	color: black;
	margin-bottom: 20px;
}

nav {
	float: left;
	width: 29%;
	background-color: #f1f1f1;
	margin-left: 1%;
}

nav ul {
	list-style-type: none;
	padding: 0;
	margin: 0;
}

li {
	border-bottom: solid 1px black;
	padding: 8px;
	text-align: center;
}

li:hover {
	border-width: 2px;
	font-weight: bold;
}

li a {
	text-decoration: none;
	color: black;
	display: block;
}

article {
	float: left;
	width: 68%;
	height: 500px;
	margin-left: 1%;
	margin-right: 1%;
	background-color: #f1f1f1;
	overflow: scroll;
	text-align: justify;
	padding: 1%;
	border: solid 1px black;
	box-sizing: border-box;
}

section:after {
	content: "";
	display: table;
	clear: both;
}

footer {
	border-top: solid 1px black;
	padding: 10px;
	text-align: center;
	color: black;
	margin-top: 20px;
}

/* Responsive design here might improve user experience when viewing in a small window size */
@media (max-width: 600px) {
	nav, article{
		margin: 1%;
		width: 98%;
	}
}
</style>
</head>

<body>
	<header>CMS</header>
	<section>
		<nav>
			<ul>
				<li><a href="https://cs1.ucc.ie/~qn1/cms.php?page=0">Home</a></li>
				<li><a href="https://cs1.ucc.ie/~qn1/cms.php?page=1">Personal</a></li>
				<li><a href="https://cs1.ucc.ie/~qn1/cms.php?page=2">Student</a></li>
			</ul>
		</nav>

		<article>
		
		<?php  
		
			function checkFile($fname) {
				if (is_readable($fname)) {
					if(is_readable('Parsedown.php')) {
						include 'Parsedown.php';  // load external file
						$parser = new Parsedown();  // create parser object
						$parser->setSafeMode(true); // escape HTML input such as <SCRIPT> tags etc
						$text = file_get_contents($fname);
						echo $parser->text($text); // do the job
					} else {
						echo file_get_contents($fname);
					}
				} else {
					echo "Error: Content file cannot be retrieved";
				}
			}

			if (isset($_GET['page'])) {
				switch ($_GET['page']) {
					case 0:
						checkFile('home.txt');
						break;
					case 1:
						checkFile('personal.txt');
						break;
					case 2:
						checkFile('student.txt');
						break;
					default:
						echo "Invalid parameter or no such content!";
				}
			} else {
				echo "Welcome";
			}
		
		?>
		
		</article>	
	</section>

	<footer>CS6113</footer>
</body>
</html>