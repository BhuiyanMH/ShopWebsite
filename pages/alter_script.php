	<?php


		if(isset($_POST['action'])){

			//echo "<br> The " .$_POST['submit']." button was pressed";
			//echo "<br> ".$_POST['prodid'];

			if(strcasecmp($_POST['submit'], "DELETE")){


			$servername = "mysql6.000webhost.com";
			$username = "a1024053_rony";
			$password = "r13701005";
			$dbname = "a1024053_bit";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if (!$conn) {
		    	die("Connection failed: " . mysqli_connect_error());
			}


			$pid = $_POST['prodid'];
			$pname = $_POST['prodtitle'];
			$regularprice = $_POST['prod_reg_price'];
			$discountprice = $_POST['prod_dis_price'];
			$productstatus = $_POST['prod_status'];
			$productdescription = $_POST['prod_description'];

			
			$pid = stripcslashes($pid);
			$pname = stripcslashes($pname);
			$regularprice = stripcslashes($regularprice);
			$discountprice = stripcslashes($discountprice);
			$productstatus = stripcslashes($productstatus);
			$productdescription = stripcslashes($productdescription);
			

			if(!strcasecmp($productstatus, 'Available')){
				$productstatus = 1;

			}else if(!strcasecmp($productstatus, "Upcomming")){
				$productstatus = 2;
			}else if(!strcasecmp($productstatus, "Out of Stock")){
				$productstatus = 3;
			}else{
			$productstatus = 1;
			
			}
		
			//echo "<br> $productstatus";

			$query = "UPDATE products SET pname = '$pname', description = '$productdescription', status = '$productstatus', price = '$regularprice', desc_price = '$discountprice' WHERE pid = '$pid'";

			//echo "<br> $query";

			if(!mysqli_query($conn, $query)){

				//echo "Update failed";
				echo '<script type="text/javascript">alert("Data Not Updated\nPlease Try Again.")</script>';

			}else{

				echo '<script type="text/javascript">alert("Data Updated.")</script>';
				header('Location: admin.php');

			}

				mysqli_close($conn);

			}else{

				$confirmation = $_POST['delete_confirmation'];

				echo "$confirmation";

				if(!strcasecmp($confirmation, "Do not Delete")){

						echo '<script type="text/javascript">alert("Data Not Deleted\nPlease Confirm Deletion.")</script>';
				}else{


					$servername = "mysql6.000webhost.com";
					$username = "a1024053_rony";
					$password = "r13701005";
					$dbname = "a1024053_bit";

					$conn = mysqli_connect($servername, $username, $password, $dbname);

					if (!$conn) {
		    		die("Connection failed: " . mysqli_connect_error());
					}


					$pid = $_POST['prodid'];

					$qry = "DELETE FROM products WHERE pid = '".$pid."'";

					mysqli_query($conn, $qry);
					echo '<script type="text/javascript">alert("Data  Deleted.")</script>';
					header('Location: admin.php');
					
				}

			}
		}
	?>
