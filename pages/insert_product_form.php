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

	<h1 style="color:blue; margin-bottom:20px">Insert New Product</h1>
	<div style="float:left; width:250px; font-size: 20px; align:right">
		<br>Product Title: <br>
		<br>Product Brand:<br>
		<br>Product Category: <br>
		<br>Product Image: <br>
		<br>Product Description: <br><br><br><br><br><br><br>
		<br>Regular Price: <br>
		<br>Discount Price:<br>
		<br>Product Status:<br>

	</div>


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


	<div style="float:left">
		<form action="insert_product.php" method="POST" enctype="multipart/form-data" autocomplete="off">
			
			<br><input type="text" name="prodtitle" required style="height:25px; font-size:18px; margin-bottom:13px; width:205px;"><br>

		 	<select name="prod_brand" style="height:25px; width: 205px; font-size:18px; margin-right:10px">
		 		<?php load_brand() ?>
		 	</select> OR
		 	<input type="text" placeholder = "Type New Brand" name="prod_brand_new" style="height:25px; font-size: 18px; margin-bottom:13px; margin-left:5px"><br>

		 	<select name="prod_category" style="height:25px; width:205px; font-size:18px; margin-right:10px">
		 		<?php load_category() ?>
		 	</select> OR 
			<input type="text" placeholder = "Type New Category" name="prod_category_new" style="height:25px; font-size: 18px; margin-left:5px;"><br><br>

			<input type="file" accept="image/*" name="prod_image" required style="margin-bottom:18px"><br>
			<textarea name = "prod_description" cols="37" rows="6" required style="font-size:18px; margin-bottom:7px;"> </textarea><br>
			<input type="number" name="prod_reg_price" min= "0" required style="height:25px; font-size: 18px; margin-bottom:15px; width:205px;"><br>
			<input type="number" name="prod_dis_price" value = "0" min="0" style="height:25px; font-size: 20px; margin-bottom:15px;  width:205px;"><br>
			<select name="prod_status" style="height:25px; width:205px; font-size:18px; margin-right:10px; margin-bottom:18px;">
		 		<option>Available</option>
		 		<option>Upcomming</option>
		 		<option>Out of Stock</option>
		 	</select> <br>

			<input type="submit" value="Save" style="width:100px; height:40px; font-size:18px; background:white; border-radius:10px;">
			
		</form>
	</div>
</body>
</html>