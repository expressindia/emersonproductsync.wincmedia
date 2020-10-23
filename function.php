<?php
include_once('db.php');
///$db = new Database("localhost", "root", "root", "wincmedi");
/**
 * Insert an associative array into a MySQL database
 *
 * @example
 *    $data = array('field1' => 'data1', 'field2'=> 'data2');
 *    insertArr("tablename", $data);
 */

 $insData = array(
    'productId' => 1,
    'productName' => '1 Potassium Trace Minerals',
    'brandID' => 921,
    'description'=> 'DIetary Supplement Potassium is essential for healthy cell function, nerve transmission and pH balance.',
    'labelText'=> 'test',
    'suggestedUse'=> 'Suggested Use:As a mineral supplement, add 13 drops in water or juice daily or more as directed by a licensed healthcare practitioner.',
    'warnings'=> 'Keep out of the reach of children. Store in a cool, dry place.',
    'deliveryMeasure'=> 'Ounces',
    'sku'=> 'POT10',
    'itemName'=> '1 Potassium Trace Minerals 4 oz, 1 Potassium Trace Minerals 2 oz,',
    'itemStatus'=> 1,
    'itemUPC'=> 743474440117,
    'itemProp65Restriction'=> 1,
    'itemProp65Alternative'=> '2',
    'itemBrandSku'=> 'LM401',
    'itemImageURL'=> 'https://static.emersonecologics.com/c8e3d146-7ba3-47f3-90b1-ed602cdf16c5-358-358.png',
    'itemImageHeight'=> 358,
    'itemImageWidth'=> 358,
    'itemImagePresent'=> '1'
);
insert('Products', $insData);

function insert($tableName, $insData){

    $mysqli = new mysqli("localhost","root","root","wincmedi");
    $columns = implode(", ",array_keys($insData));
    $escaped_values = escape($insData);


    foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
    $values  = implode(", ", $escaped_values);
    $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";

    //$mysqli->query($sql);
    $mysqli->query($sql);
    $mysqli->close();

}


// mysqli_real_escape_string
function escape($data){
    $mysqli = new mysqli("localhost","root","root","wincmedi");
    foreach($data as $k => $v) {
    $data[$k] = $mysqli->real_escape_string($v);
    //$mysqli->real_escape_string($v);
    return $data;
  }
}


?>
