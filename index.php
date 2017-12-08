<?php
require_once('common.php');

// $stmt = $conn->prepare("INSERT INTO products(Title, Description, Price) VALUES (?, ?, ?)");
// $stmt->bind_param("ssi", $title, $description, $price);
// $title = "Tablet";
// $description = "Description for tablet";
// $price = "98";
// $stmt->execute();
// $stmt->close();

$sql = "SELECT * from products RIGHT JOIN images on Id=productId ORDER BY Id";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row["url"] = 
        "http://". $_SERVER['HTTP_HOST'].'/project1/images/'.$row['imageId'].".jpg";
        echo 
            '<div class="product">
                <div class="image">
                    <img src="' . $row["url"]. '">
                </div>' .
                '<div class="productdetails">
                    <div class="productTitle">' . $row["Title"] . '</div>
                    <div class="productDescription">' . $row["Description"] . '</div>
                    <div class="productPrice">' . $row["Price"] . '</div>
                    <a href="index.php?action=add" method="GET" class="addTocart" name="'.$row["Id"].'">Add</a>
                </div>
            </div>';                
    }
} else {
    return false;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="linkToCart">
    <a href="cart.php">Go to cart</a>
</div>

</body>
</html>