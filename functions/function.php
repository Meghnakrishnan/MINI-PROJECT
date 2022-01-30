<?php 
require('./db/connect.php');
function insert_data($tableName, $insData){
    $columns = implode(", ",array_keys($insData));
    $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
    foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
    $values  = implode(", ", $escaped_values);
    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
    mysqli_query($db, $query);
}
?>