<?php
// Database connection
include_once('db.php');

///Select query from products table

$sql = "SELECT * FROM Products ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["productID"]. " - Name: " . $row["productName"]. " " . $row["brandID"]. "<br>";
  }
} else {
  echo "0 results";
}
$mysqli->close();






//insert query from product table

$sql = "INSERT INTO Products (productID, productName, brandID, description, labelText, suggestedUse, warnings,
                              deliveryMeasure, sku, itemName, itemStatus, itemUPC, itemProp65Restriction,
                              itemProp65Alternative, itemBrandSku, itemImageURL, itemImageHeight, itemImageWidth,
                              itemImagePresent)
VALUES ('2',
        '1 Potassium Trace Minerals',
        '921',
        'DIetary Supplement Potassium is essential for healthy cell function, nerve transmission and pH balance.',
        'test',
        'Suggested Use:As a mineral supplement, add 13 drops in water or juice daily or more as directed by a licensed healthcare practitioner.',
        'Keep out of the reach of children. Store in a cool, dry place.',
        'Ounces',
        'POT10, POTA8,',
        '1 Potassium Trace Minerals 4 oz, 1 Potassium Trace Minerals 2 oz,',
        '1, 1,',
        '743474440117, 743474220115,',
        '1',
        '2',
        'LM401, LM201,',
        'https://static.emersonecologics.com/c8e3d146-7ba3-47f3-90b1-ed602cdf16c5-358-358.png, https://static.emersonecologics.com/08663f7b-a352-4ad3-acbc-a6e645b38dc0-358-358.png',
        '358, 358,',
        '358, 358,',
        'https://static.emersonecologics.com/c8e3d146-7ba3-47f3-90b1-ed602cdf16c5-358-358.png'
       )";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Database Query | Curated Supplements</title>
    <meta name="description" content="Curated Supplements Product Database (sync'ed with emerson ecologics)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Begin Nav Bar / Menu Bar -->
    <?php require_once('navbar.html'); ?>
    <!-- End Nav Bar / Menu Bar  -->

    <div class="container-fluid">
        <div class="container" id="mainContainer">
            <h1 class="text-light"> Database Query Page<h1>
                <?php require_once("queryForm.html") ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
