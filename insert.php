<!-- welcome mohammed! -->
<?php

// php stuff :)
$results = json_decode(file_get_contents('https://emerson-api.emersonecologics.com/productdata/v1/products?limit=2&startAfterId=0&endsWithId=99'));
// echo "<pre>";
// print_r($results);
// echo "<pre>";
//echo $results->info->version;

foreach($results->body->collection as $product){

  // displaying product image
  $sku = '';
  $item_name = '';
  $item_status = '';
  $item_upc = '';
  $item_prop65Restriction = '';
  $item_prop65AlternativeSku = '';
  $item_brandSku = '';

  // dispaying images
  $image_url = '';
  $image_height = '';
  $image_width = '';
  $image_present = '';

  foreach($product->items as $item){

    $sku .= $item->sku.', ';
    $item_name .= $item->itemName.', ';
    $item_status .= $item->status.', ';
    $item_upc .= $item->upc.', ';
    $item_prop65Restriction .= $item->prop65Restriction.', ';
    $item_prop65AlternativeSku .= $item->prop65AlternativeSku.', ';
    $item_brandSku .= $item->brandSku.', ';


    foreach($item->images as $image){
      $image_url .= $image->url . ', ';
      $image_height .= $image->height . ', ';
      $image_width .= $image->width . ', ';

      $image_present .= '<img src="'.$image->url.'" width="50" height="50">';
    }

    $data = array(
       'productId' => $product->productId,
       'productName' => $product->productName,
       'brandID' => $product->brand->brandId,
       'description'=> $product->description,
       'labelText'=> '$product->labelText',
       'suggestedUse'=> $product->suggestedUse,
       'warnings'=> $product->warnings,
       'deliveryMeasure'=> $product->deliveryMeasureName,
       'sku'=> $item->sku,
       'itemName'=> $item->itemName,
       'itemStatus'=> $item->status,
       'itemUPC'=> $item->upc,
       'itemProp65Restriction'=> $item->prop65Restriction,
       'itemProp65Alternative'=> $item->prop65AlternativeSku,
       'itemBrandSku'=> $item->brandSku,
       'itemImageURL'=> $image->url,
       'itemImageHeight'=> $image->height,
       'itemImageWidth'=> $image->width,
       'itemImagePresent'=> '1'
   );






    $columns = implode(", ",array_keys($data));

    foreach($data as $k => $v) {
    //$data[$k] = $mysqli->real_escape_string($v);
    $data[$k] = $v;


    // foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
    // $values  = implode(", ", $escaped_values);
    // $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
    // $mysqli->query($sql);
    // $mysqli->close();


    }

  }

  echo "<pre>";
  print_r($data);
  echo "<pre>";

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
    <title>Query Results | Curated Supplements</title>
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
