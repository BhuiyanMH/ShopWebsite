<html>
	<head>
		<title> Binary InfoTech </title>
		<link href = "css/style.css" rel = "stylesheet" type = "text/css" />
	</head>
	
	<body>

	<?php

	function load_category(){


			$servername = "mysql6.000webhost.com";
			$username = "a1024053_rony";
			$password = "r13701005";
			$dbname = "a1024053_bit";


			$conn = mysqli_connect($servername, $username, $password, $dbname);
				
				$qry = "select cat from products";
				$result = mysqli_query($conn, $qry);

			while($row  = mysqli_fetch_array($result)){
					echo "<option>$row[cat]</option>";
			}

			mysqli_close($conn);
		}

	

	 function load_brand(){


			$servername = "mysql6.000webhost.com";
			$username = "a1024053_rony";
			$password = "r13701005";
			$dbname = "a1024053_bit";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
				
				$qry = "select brand from products";
				$result = mysqli_query($conn, $qry);

			while($row  = mysqli_fetch_array($result)){
					echo "<option>$row[brand]</option>";
			}

			mysqli_close($conn);
		}


	 ?>



		<div class = "main">
			<div class ="slider">
				<div class="slider_text">
					<h1>Binary InfoTech </h1>
					<h2>Technology for Life </h2>
					<p>Bringing Technology product at your hand with reasonable price </p>
				</div>
				
			</div>
			
				<div class = "mainmenu">
				<ul> 
					<li><a href= ".?id=home"> HOME </a></li>
					<li><a href= ".?id=products"> PRODUCTS </a></li>
					<li><a href= ".?id=offers">OFFERS  </a></li>
					<li><a href= ".?id=contact"> CONTACT </a></li>
					
					
				</ul>
			</div>
			
			<div class = "maincontent">
				
				
				<!-- Left SideBar Section -->
				
				<div class = "left_sidebar"> 
				
					<center><h2 style="color:blue">Branches </h2></center>
					<center><h4 style="color:orange">Agrabad Branch</h4></center>
					<marquee>Computer Plaza, 3rd Floor, Shop No. 312, SK Mujib Road, Agrabad, Chittagong.</marquee>
					<br>
					<center><h4 style="color:orange">CDA Branch</h4></center>
					<marquee>CDA market, 2nd Floor, Shop No. 205, Pahartali, Chittagong.</marquee>
					<br>
					<center><h4 style="color:orange">GEC Branch</h4></center>
					<marquee>Younusko city center, 4th Floor, Shop No. 410, Nasirabad, Chittagong.</marquee>
					
					

					<br><br>
					<center><h2 style="color:blue">Newsletter</h2></center>
					<ul> 
					<marquee><li>Get a 16GB pendrive free with a laptop.</li></marquee>
					<marquee><li>Get a mouse free with a desktop</li></marquee>
					<marquee><li>Binary Infotech is going to provide home delivery from this November!</li></marquee>
					<marquee><li>Teletalk 3G modem is for 1000 TK. only!</li></marquee>
					<marquee><li>Binary Infotech support VISA, AMEX and bKash payment. </li></marquee>
					<marquee><li>Binary Infotech provide genuine products with excellent customer satisfiction.</li></marquee>
					</ul>
				
				</div>
				
				
				<!-- Right SideBar Section -->
				<div class = "right_sidebar" style="border: 5px solid orange; border-radius:10px; padding-left:5px; padding-top:10px; padding-bottom:10px;"> 
				
					<center><h2 style="color:blue">Search</h2></center>
					<form action=".?id=products" method="POST" autocomplete="off">
							<h3>Product</h3>
							<select name="search_category" style="; width:125px; font-size:18px; margin-top:5px;margin-right:10px; margin-bottom:10px;">
								<option selected>Any</option>
		 						<?php load_category() ?>
		 					</select>
							<h3>Brand</h3>
							<select name="search_brand" style="width: 125px; font-size:18px; margin-top:5px;margin-right:10px;margin-bottom:10px;">
								<option selected>Any</option>
		 						<?php load_brand() ?>
		 					</select> 
		 					<br>
		 					
		 					<input type="text" name="search_desc" placeholder="Other Options" style="margin-bottom:10px; width:126; font-size:18px">
		 					<input type="number" name="pricemin" placeholder ="Price Min" style="margin-bottom:10px; width:126;font-size:18px;">
		 					<input type="number" name="pricemax" placeholder = "Price Max" style="margin-bottom:10px; width:126; font-size:18px;">
		 					<center><input type="submit" name="submit" value="Search" style="font-size:18px"></center>
					</form>
				
				</div>
				
				<!-- Content Section -->
				
				<div class = "content"> 
					<?php
					
					if(!empty($_GET['id'])){
						$id = $_GET['id'];
	
						if($id){
							include('pages/'.$id.'.php');
						}		
					}else{
						include('pages/home.php');
					}
					?>
					
				</div>
				
			
			</div>
			
			<div class = "footer"> 
				 <p>&copy; Binary InfoTech 2016, All Rights Reserved. <a id = "login_link" href = ".?id=login"><i>Login</i> </a><br>Developer: <a href = "http://www.facebook.com/rony.cse.cu">Mahmudul Hasan Bhuiyan</a></p>
			</div>
		</div>
	</body>
</html> 