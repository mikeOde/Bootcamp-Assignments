<?php
    session_start();
    include "connection.php";
    if(isset($_POST["submit"])){

        $file = $_FILES['image_file'];
        $file_name = $_FILES['image_file']['name'];
        $file_tmp_name = $_FILES['image_file']['tmp_name'];
        $file_size = $_FILES['image_file']['size'];
        $file_error = $_FILES['image_file']['error'];
        $file_type = $_FILES['image_file']['type'];

        $file_extension = explode('.', $file_name);
        $file_actual_extention = strtolower(end($file_extension));

        $allowed = array('jpg', 'jpeg', 'png');

        $email = $_SESSION["farmer_email"];
        $sql1 = "SELECT * FROM users WHERE email=?";
        $stmt1 = $connection->prepare($sql1);
        $stmt1->bind_param("s",$email);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $row1 = $result1->fetch_assoc();
        $farm_id = $row1["id"]; 

        if(in_array($file_actual_extention, $allowed)){
            if($file_error === 0) {
                if($file_size < 2000000){     //checks size of the pic
                    $file_name_new = uniqid('', true).".".$file_actual_extention;  // assigns unique ids to the uploaded pic to avoid overwriting and adds the extension
                    $file_destination = '../uploads/'.$file_name_new;   // upload file destination
                    move_uploaded_file($file_tmp_name, $file_destination);
                    header("Location: ../farmer_home.php");
                }else{
                    echo "Your file is too big";
                }
            }else{
                echo "There was an error uploading your file";
            }

        }else{
            echo "You cannot upload files of this type";
        }

        if(isset($_POST["product_name"]) && $_POST["product_name"]!=""){
            $product_name = $_POST["product_name"];
        }else{
            die("Enter a valid Email");
        }
    
        if(isset($_POST["product_description"]) && $_POST["product_description"]!=""){
            $product_description = $_POST["product_description"];
        }else{
            die("Enter a product desctiption");
        }
    
        if(isset($_POST["product_price"]) && $_POST["product_price"]!=0){
            $product_price = $_POST["product_price"];
        }else{
            die("Enter product price");
        }
        
        $sql2 = "INSERT INTO `products` (`name`, `description`, `price`, `image`, `farm_id`) VALUES (?, ?, ?, ?, ?);"; #add the new products to the database
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("ssisi", $product_name, $product_description, $product_price, $file_destination, $farm_id);
        $stmt2->execute();
        header("Location: ../farmer_home.php");
    }

?>
