<!-- welcome mohammed! -->
<?php

// php stuff :)
$results = json_decode(file_get_contents('https://emerson-api.emersonecologics.com/productdata/v1/products?limit=2&startAfterId=0&endsWithId=99'));
// echo "<pre>";
// print_r($results);
// echo "<pre>";
//echo $results->info->version;


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
            <h1 class="text-light">Query Results Page</h1>
            <?php //require_once("resultsTable.html") ?>
            <div class="table-responsive">

              <table class="table table-condensed table-striped table-dark">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">productID</th>
                    <th scope="col">productName</th>
                    <th scope="col">brandID</th>
                    <th scope="col">brandName</th>
                    <th scope="col">description</th>
                    <th scope="col">labelText</th>
                    <th scope="col">suggestedUse</th>
                    <th scope="col">warnings</th>
                    <th scope="col">deliveryMeasure</th>
                    <th scope="col">sku</th>
                    <th scope="col">itemName</th>
                    <th scope="col">itemStatus</th>
                    <th scope="col">itemUPC</th>
                    <th scope="col">itemProp65Restriction</th>
                    <th scope="col">itemProp65Alternative</th>
                    <th scope="col">itemBrandSku</th>
                    <th scope="col">itemImageUrl</th>
                    <th scope="col">itemImageHeight</th>
                    <th scope="col">itemImageWidth</th>
                    <th scope="col">itemImagePresent</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

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
                           'brandName' => $product->brand->brandName,
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



                  ?>

                    <tr>
                      <th scope="row"><?php echo $product->productId; ?></th>
                      <td><?php echo $product->productName; ?></td>
                      <td><?php echo $product->brand->brandId; ?></td>
                      <td><?php echo $product->brand->brandName; ?></td>
                      <td><?php echo $product->description; ?> </td>
                      <td><?php echo $product->labelText; ?> </td>
                      <td><?php echo $product->suggestedUse; ?> </td>
                      <td><?php echo $product->warnings; ?></td>
                      <td><?php echo $product->deliveryMeasureName; ?> </td>
                      <td><?php echo $sku; ?> </td>
                      <td><?php echo $item_name ?> </td>
                      <td><?php echo $item_status; ?> </td>
                      <td><?php echo $item_upc; ?> </td>
                      <td><?php echo $item_prop65Restriction; ?> </td>
                      <td><?php echo $item_prop65AlternativeSku; ?></td>
                      <td><?php echo $item_brandSku; ?></td>
                      <td><?php echo $image_url; ?> </td>
                      <td><?php echo $image_height; ?> </td>
                      <td><?php echo $image_width; ?> </td>
                      <td> <?php echo $image_present; ?> </td>

                    </tr>

                  <?php } echo "<pre>";
                  print_r($data);die;?>
                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr> -->
                </tbody>
              </table>
            </div>


        </div>
        <style>
        ul#pagination li {
          display:inline;
        }
        </style>
        <div style="text-align:center; color:white; padding:30px;">
          <h1>Pagination</h1>
          <ul id="pagination">
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">6</a></li>
          </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
