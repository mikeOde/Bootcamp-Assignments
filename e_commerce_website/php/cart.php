<?php 




function cartItems(){
	include "connection.php";
	$farmer_email = $_SESSION["farmerEmail"];
	$sql1 = "SELECT * FROM users WHERE email=?";
	$stmt1 = $connection->prepare($sql1);
	$stmt1-> bind_param("s", $farmer_email);
	$stmt1->execute();
	$result1 = $stmt1->get_result();
	$row1 = $result1->fetch_assoc();
	if(isset($row1)){
		$farm_id = $row1["id"];
	}

	$sql="SELECT * FROM products WHERE farm_id =? GROUP BY id";
	$stmt = $connection->prepare($sql);
	$stmt-> bind_param("i", $farm_id);
	$stmt->execute();
	$result = $stmt->get_result();
    $total = 0;
	
	

	while($product_data = $result->fetch_assoc()){
		
		$product_name = $product_data["name"];
		$product_price = $product_data["price"]."$";
		$product_image = $product_data["image"];
		$product_description = $product_data["description"];
		$product_id = $product_data["id"];
        $total = $total + $product_data["price"];
        $_SESSION["total_price"] = $total;
        $cart = "
		
		<div class=\"media\">
			<a class=\"pull-left\" href=\"#!\">
				<img class=\"media-object\" src=\"$product_image\" alt=\"image\" />
			</a>
			<div class=\"media-body\">
				<h4 class=\"media-heading\"><a href=\"#!\">$product_name</a></h4>
				<div class=\"cart-price\">
					<span>1 x</span>
					<span>$product_price</span>
				</div>
				<h5><strong>$product_price</strong></h5>
			</div>
			<a href=\"#!\" class=\"remove\"><i class=\"tf-ion-close\"></i></a>
		</div><!-- / Cart Item -->
		";
		echo $cart;		
	 }
}


    
    


            
        


