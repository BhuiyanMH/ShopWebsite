<html>
	<head>
		<link href= "css/products_css.css" rel = "stylesheet" type = "text/css" />
		<link href= "css/style.css" rel = "stylesheet" type = "text/css" />
	</head>


	<?php 

			function display_product($condition){


				$servername = "mysql6.000webhost.com";
				$username = "a1024053_rony";
				$password = "r13701005";
				$dbname = "a1024053_bit";

				$conn = mysqli_connect($servername, $username, $password, $dbname);
					

					if(!strcasecmp($condition, "*")){
						$qry = "select * from products ORDER BY pid DESC";
					}else if(strcasecmp(!$condition, "")){

						$qry = "select * from products ORDER BY pid DESC";
						
					}else{
						$qry = "select * from products where ".$condition." ORDER BY pid DESC";
					}
					
					//echo "Query: $qry";
					$result = mysqli_query($conn, $qry);

					$flag = 1;

				while($row  = mysqli_fetch_array($result)){

						if($flag == 1){
						echo "<div class='left_product'>";  
						$flag = 0;
						}	
						else{
							echo "<div class='right_product'>";	
							$flag= 1;
						}


						echo "<span id= 'product_name'> ".$row[1]." </span>";
						echo '<center><img src="data:image/png;base64,'.base64_encode( $row["image"] ).'" width="200px" height="150px"/></center>';
						echo "<span id= 'product_price'> Price </span>";

						if($row[8] > 0){

							echo "<span id = 'price'><del>".$row[7]." </del> TK. Discount Price: " .$row[8]." TK. </span>";
							
						}else{

							echo "<span id = 'price'>".$row[7]." TK. </span>";
						}
						
			
						echo "<span id= 'product_description'> Description </span>";
						echo "$row[4]";
						echo "</div>";
						
				}
			
				mysqli_close($conn);
			}

	 ?>


	<body>
		<div class='product_content'>

		<div class ="divider">
			Latest Products
		</div>

			<?php 

				$method = $_SERVER['REQUEST_METHOD'];

				if(!strcasecmp($method, "GET")){
					display_product("*"); 
				}else{

				$searchbrand = $_POST['search_brand'];
				$searchcategory = $_POST['search_category'];
				$searchpricemin = $_POST['pricemin'];
				$searchpricemax = $_POST['pricemax'];
				$searchkeyword = $_POST['search_desc'];

				$qcondition = "";

				$check = false;

				if(strcasecmp($searchbrand, "Any")){

						$qcondition = $qcondition." brand = '$searchbrand'";
						$check = true;

				}

				if(strcasecmp($searchcategory, "Any")){

						if($check){

							$qcondition = $qcondition." AND";
						}
						$qcondition = $qcondition." cat = '$searchcategory'";
						$check = true;
				}

				if(strcasecmp($searchkeyword, "")){

						if($check){
							$qcondition = $qcondition." AND";
						}
						$qcondition = $qcondition." pname LIKE '%$searchkeyword%' OR description LIKE '%$searchkeyword%'";
						$check = true;
				}

				if(strcasecmp($searchpricemax, "") && strcasecmp($searchpricemin, "")){

					if($check){
							$qcondition = $qcondition." AND";
					}

					$qcondition = $qcondition." price BETWEEN '$searchpricemin' AND '$searchpricemax'";
					$check = true;
				}else{

					if(strcasecmp($searchpricemax, "")){

						if($check){
							$qcondition = $qcondition." AND";
						}
						$qcondition = $qcondition." price <= '$searchpricemax'";
						$check = true;
					}else if(strcasecmp($searchpricemin, "")){

						if($check){
							$qcondition = $qcondition." AND";
						}
						$qcondition = $qcondition." price >= '$searchpricemin'";
						$check = true;
					}	
				}
				
				//echo "<br>$qcondition";
				display_product($qcondition);

				}

			?>

		</div>
	</body>
</html>