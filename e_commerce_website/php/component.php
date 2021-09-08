<?php 
session_start();




function component(){
	include "connection.php";
	$farmer_email = $_SESSION["farmerEmail"];
	$_SESSION["farmerEmail"] = $farmer_email;
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
	
	

	while($product_data = $result->fetch_assoc()){
		
		$product_name = $product_data["name"];
		$product_price = $product_data["price"]."$";
		$product_image = $product_data["image"];
		$product_description = $product_data["description"];
		$product_id = $product_data["id"];
		$quantity = 0;
		$element="

    		<div class=\"col-md-4 col-sm-6 my-3 my-md \">
				<form action=\"cart.php\" method=\"post\">
					<div class=\"card shadow my-3\">
						<div>
							<img src=\"$product_image\" id=\"product_image\" alt=\"product image\" class=\"img-thumbnail card-img-top img-responsive\">
						</div>
						<div class=\"card-body my-3\">
							<h5 class=\"card-title\">$product_name</h5>
							<h6>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"far fa-star\"></i>
							</h6>
							<p class=\"card-text\">
								$product_description
							</p>
							<h5>
								<span class=\"price\">$product_price</span>
							</h5>
							
							<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to cart <i class=\"fas fa-shopping-cart\"></i></button>
							<input type=\"hidden\" name=\"product_id\" value=\"$product_id\">
						</div>
					</div>
				</form>
			</div>
    	";
    	echo $element;


	 }
    
}


    
    


            
        





