			<?php

				if ($_SESSION['userloggedin'] == 0) {
		  			header("Location: ../index.php?id=login");
		  		exit();
			}
			?>
			<!DOCTYPE html>
				<html>
				<head>
					<title>Update Product</title>
				</head>
				<body>

				<h1 style="color:blue; margin-bottom:20px">Update Product</h1>

				<form method="POST" action="#">
					
					<fieldset style="margin:10px; padding:20px; margin-bottom:20px;">
					<legend>Search Product to Edit </legend>
						<input type="text" name="prodmodel" placeholder="Type Product Name" style="height:40px; font-size:18px">
						<input type="submit" name="submit" value="Search" style="font-size:18px; padding:5px">
					</fieldset>

				</form>


				<?php 
					

					$method = $_SERVER['REQUEST_METHOD'];

					if(strcasecmp($method, "GET")){


							
						$keyword = $_POST['prodmodel'];

						if(strcasecmp($keyword, "")){


							echo "<form action='admin.php?id=update_form' method = 'POST'>";


							echo "<fieldset style='margin:10px; padding:20px'>";
							echo "<legend>Select Product to Edit</legend>";
				


							$servername = "mysql6.000webhost.com";
							$username = "a1024053_rony";
							$password = "r13701005";
							$dbname = "a1024053_bit";

							$conn = mysqli_connect($servername, $username, $password, $dbname);
							
							$qry = "select pid, pname from products where pname LIKE '%".$keyword."%'";	

							//echo "$qry";
							$result = mysqli_query($conn, $qry);

								
							echo "<select name='product' style='height:40px; width:205px; font-size:18px; margin-right:10px'>";
							while($row  = mysqli_fetch_array($result)){

									echo "<option>$row[pid] - $row[pname]</option>";
							}
							
							echo "<input type='submit' name='submit' value='Edit' style='font-size:18px; padding:5px'>";
							echo "</fieldset>";
							echo "</form>";
							mysqli_close($conn);
						}
					}

				?>
				

				</body>
				</html>