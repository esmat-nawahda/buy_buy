<?php session_start();?>


/**
 * Created by PhpStorm.
 * User: ali
 * Date: 3/16/2015
 * Time: 8:43 AM
 */
<?php
include_once("server/DB.php");

$GLOBALS['db']=new DB($host,$username,$password,$database);

?>

<?php

$sql='select * from post';
$result=$GLOBALS['db']->db_query($sql);
$row=$GLOBALS['db']->db_assoc($result);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) {
        echo $row[1].$row[2].$row[4];
    }

}


?>