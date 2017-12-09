		<?php

			session_start();
			if ($_SESSION['userloggedin'] == 0) {
	  			header("Location: ../index.php?id=login");
	  		exit();
		}
		?>



		<html>
			<head>
				<title> Binary InfoTech </title>
				<link href = "../css/admin_css.css" rel = "stylesheet" type = "text/css" />
			</head>
			
			<body>
				<div class = "main">

					<h1 style="margin:30px; color:orange"> <center> <b><u>Welcome To Admin Panel<b></u></center></h1>

					<div class = "mainmenu">
						<ul> 
							<li><a href= "admin.php?id=insert_product_form"> ADD PRODUCT </a></li>
							<li><a href= "admin.php?id=update">UPDATE PRODUCT  </a></li>
							<li><a href= "admin.php?id=logout"> LOGOUT </a></li>
							
						</ul>
					</div>
					
					<div class = "maincontent">
						
						<!-- Content Section -->
						
						<div class = "content"> 
							<?php
							
							if(!empty($_GET['id'])){
								$id = $_GET['id'];
			
								if($id){
									include('../pages/'.$id.'.php');

									//echo "../pages/'.$id.'.php";
								}		
							}else{

								//echo "../pages/insert_product_form.php";
								include('../pages/insert_product_form.php');
							}
							?>
							
						</div>
						
					
					</div>
					
				</div>
				
			</body>
		</html> 