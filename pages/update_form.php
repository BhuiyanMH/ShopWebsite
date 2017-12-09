		<?php

			if ($_SESSION['userloggedin'] == 0) {
	  			header("Location: ../index.php?id=login");
	  		exit();
		}
		?>



			<!DOCTYPE html>
			<html>
			<head>
				<title>Insert Product</title>
			</head>
			<body>

				<h1 style="color:blue; margin-bottom:20px"> Update Product </h1>
				<div style="float:left; width:250px; font-size: 20px; align:right">
					<br>Product Title: <br>
					<br>Product Description: <br><br><br><br><br><br><br><br><br>
					<br>Regular Price: <br>
					<br>Discount Price:<br>
					<br>Product Status:<br>

				</div>


				<div style="float:left">
					<form action="alter_script.php" method="POST" enctype="multipart/form-data" autocomplete="off">

					<?php

				
				if(strcasecmp(trim($_POST['product']), "")){

					$productvalue = $_POST['product'];
					
					$productid = (int) $productvalue;
					//echo "<br>$productid";

						$servername = "mysql6.000webhost.com";
						$username = "a1024053_rony";
						$password = "r13701005";
						$dbname = "a1024053_bit";

						$conn = mysqli_connect($servername, $username, $password, $dbname);
							
							$qry = "select pname, description, price, desc_price from products where pid = '$productid'";
							$result = mysqli_query($conn, $qry);

						while($row  = mysqli_fetch_array($result)){
								//echo "<option>$row[brand]</option>";


							echo '<input type="hidden" name="prodid" value = "'.$productid.'" >';
							echo '<input type="hidden" name="action" value = "submit" >';

							echo '<br><input type="text" name="prodtitle" value = "'.$row[0].'" required style="height:25px; font-size:18px; margin-bottom:13px; width:275px;"><br>';
						echo '<textarea name = "prod_description" cols="50" rows="6" required style="padding: 2px; font-size:18px; margin-bottom:7px;">'.$row[1].' </textarea><br>';
						echo '<input type="number" name="prod_reg_price" min= "0" value = "'.$row[2].'"required style="height:25px; font-size: 18px; margin-bottom:15px; width:275px;"><br>';
						echo '<input type="number" name="prod_dis_price" value = "'.$row[3].'" min="0" style="height:25px; font-size: 20px; margin-bottom:15px;  width:275px;"><br>';
						echo '<select name="prod_status" style="height:25px; width:275px; font-size:18px; margin-right:10px; margin-bottom:18px;">';
					 		echo '<option>Available</option>';
					 		echo '<option>Upcomming</option>';
					 		echo '<option>Out of Stock</option>';
					 	echo '</select> <br>';

						echo '<input id = "update" type="submit" name = "submit" value="UPDATE" style="width:100px; height:40px; font-size:18px; background:lime; border-radius:10px; margin-right:10px;">';
						echo '<input id = "delete" type="submit" name = "submit" value="DELETE" style="width:100px; height:40px; font-size:18px; background:orange; border-radius:10px;">';

						echo '<select name="delete_confirmation" style="font-size: 18px; width:150px; height: 40px; margin-left: 20px; padding: 5px; border-radius:10px">';
				 		echo '<option selected>Do not Delete</option>';
				 		echo '<option>Delete confirm</option>';
				 		echo '</select>';

						}

						mysqli_close($conn);
					}

				 ?>

					</form>
				</div>
			</body>
			</html>