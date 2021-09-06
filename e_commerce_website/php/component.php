<?php 
include "connection.php";

public function getData(){
    $sql="SELECT * FROM products";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)>0){
        return $result;
    }
}

function component($product_name, $product_price, $product_image){
    $element="
    <div class=\"col-md-4 col-sm-6 my-3 my-md-0\">
				<form action=\"../php/something.php\" method=\"post\">
					<div class=\"card shadow\">
						<div>
							<img src=\"$product_image\" alt=\"product image\" class=\"img-fluid card-img-top img-responsive\">
						</div>
						<div class=\"card-body\">
							<h5 class=\"card-title\">$product_name</h5>
							<h6>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"fas fa-star\"></i>
								<i class=\"far fa-star\"></i>
							</h6>
							<p class=\"card-text\">
								Some quick example
							</p>
							<h5>
								<span class=\"price\">$product_price</span>
							</h5>
							<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to cart <i class=\"fas fa-shopping-cart\"></i></button>
						</div>
					</div>
				</form>
			</div>
    ";
    echo $element;
}

            
        





