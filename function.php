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
