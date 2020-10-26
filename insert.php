<?php
include_once('db.php');
// php stuff :)
$results = json_decode(file_get_contents('products.json'));

// echo "<pre>";
// print_r($results->body->collection);
// echo "<pre>";die;
///echo $results->info->version;

$tableName = 'Products';

$i = 0;
foreach($results->body->collection as $product){

  if($product->labelText != '' || $product->labelText != NULL){
    $labelText = $product->labelText;
  }else{
    $labelText = '';
  }
  if($product->suggestedUse != '' || $product->suggestedUse != NULL){
    $suggestedUse = $product->suggestedUse;
  }else{
    $suggestedUse = '';
  }

  if($product->warnings != '' || $product->warnings != NULL){
    $warnings = $product->warnings;
  }else{
    $warnings = '';
  }
  if($product->deliveryMeasureName != '' || $product->deliveryMeasureName != NULL){
    $deliveryMeasureName = $product->deliveryMeasureName;
  }else{
    $deliveryMeasureName = '';
  }


// Product Items
  foreach($product->items as $item){

    if($item->prop65Restriction !='' || $item->prop65Restriction != NULL){
      $prop65Restriction = $item->prop65Restriction;
    }else{
      $prop65Restriction = '';
    }
    if($item->prop65AlternativeSku != '' || $item->prop65AlternativeSku != NULL){
      $prop65AlternativeSku = $item->prop65AlternativeSku;
    }else{
      $prop65AlternativeSku = '';
    }

    if($item->images != null ){
      foreach($item->images as $image){
        $image_url = $image->url;
        $image_height = $image->height;
        $image_width = $image->width;
      }
    }else{
      $image_url = '#';
      $image_height = 358;
      $image_width = 358;
    }


    $dataArr = array(
       'productId' => $product->productId,
       'productName' => $product->productName,
       'brandID' => $product->brand->brandId,
       'brandName' => $product->brand->brandName,
       'description'=> $product->description,
       'labelText'=> $labelText,
       'suggestedUse'=> $suggestedUse,
       'warnings'=> $warnings,
       'deliveryMeasure'=> $deliveryMeasureName,
       'sku'=> $item->sku,
       'itemName'=> $item->itemName,
       'itemStatus'=> $item->status,
       'itemUPC'=> $item->upc,
       'itemProp65Restriction'=> $prop65Restriction,
       'itemProp65Alternative'=> $prop65AlternativeSku,
       'itemBrandSku'=> $item->brandSku,
       'itemImageURL'=> $image_url,
       'itemImageHeight'=> $image_height,
       'itemImageWidth'=> $image_width,
       'itemImagePresent'=> '1'
   );


    $columns = implode(", ",array_keys($dataArr));

    foreach ($dataArr as $key=>$data) {
      $data = mysqli_real_escape_string($con, $data);
      $dataArr[$key] = "'".$data."'";
    }
    $values  = implode(", ", $dataArr);
    $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
    $count = $i++;

    echo $count."<br>".$sql;
    mysqli_query($con, $sql);

  }

  // echo "<pre>";
  // print_r($data);
  // echo "<pre>";

}


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
    <title>Insert Products Values Into Databbase | Curated Supplements</title>
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
            <h1 class="text-light">Insert products into database </h1>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
