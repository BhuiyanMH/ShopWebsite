<?php

	$servername = "mysql6.000webhost.com";
	$username = "a1024053_rony";
	$password = "r13701005";
	$dbname = "a1024053_bit";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$pname = $_POST['prodtitle'];
	$pbrand = $_POST['prod_brand'];
	$pbrandnew = $_POST['prod_brand_new'];
	$pcategory = $_POST['prod_category'];
	$pcategorynew = $_POST['prod_category_new'];
	$regularprice = $_POST['prod_reg_price'];
	$discountprice = $_POST['prod_dis_price'];
	$productstatus = $_POST['prod_status'];
	$productdescription = $_POST['prod_description'];
	$files = $_FILES['prod_image']['tmp_name'];


	$pname = stripcslashes($pname);
	$pbrand = stripcslashes($pbrand);
	$pbrandnew = stripcslashes($pbrandnew);
	$pcategory = stripcslashes($pcategory);
	$pcategorynew = stripcslashes($pcategorynew);
	$regularprice = stripcslashes($regularprice);
	$discountprice = stripcslashes($discountprice);
	$productstatus = stripcslashes($productstatus);
	$productdescription = stripcslashes($productdescription);
	$productphoto = addslashes(file_get_contents($_FILES['prod_image']['tmp_name']));

	if(!strcasecmp($productstatus, "Available")){

		$productstatus = 1;

	}else if(!strcasecmp($productstatus, "Upcoming")){
		$productstatus = 2;

	}else if(!strcasecmp($productstatus, "Out of Stock")){
		$productstatus = 3;

	}else{
		$productstatus = 1;
	}

	if(strcasecmp($pcategorynew, "")){
		$pcategory = $pcategorynew;
	}
	if(strcasecmp($pbrandnew, "")){
		$pbrand = $pbrandnew;
	}

	//echo "<br>$pcategory   $pbrand";
	$query = "INSERT INTO products (pname, cat, brand, description, image, status, price, desc_price) VALUES ('$pname', '$pcategory', '$pbrand', '$productdescription', '$productphoto', '$productstatus', '$regularprice', '$discountprice')";

	if(!mysqli_query($conn, $query)){

		echo "Insertion failed";

	}else{

		header('Location: admin.php');

	}

	mysqli_close($conn);

?>