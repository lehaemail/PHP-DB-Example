<?php 
// heder("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
// header("Pragma: no-cache"); // HTTP 1.0
// header("Expires: 0"); // Proxies

$limit = $_GET["limit"]; // Get limit for query
$offset = $_GET["offset"]; // Get offset for query

// $limit = 10; // For debaging only
// $offset = 0; // For debaging only

//open connection to mysql db
$connection = mysqli_connect("localhost","root", "","aaa") or die("Error " . mysqli_error($connection));

////////////////////////////
//--Process cat table--//
////////////////////////////
    
//fetch table rows from mysql db 
$catSql = "SELECT * FROM pet where breed='exotics' LIMIT ".$limit." OFFSET ".$offset;
$catResult = mysqli_query($connection, $catSql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$catArray = array();
while($row = mysqli_fetch_assoc($catResult))
{
    $catArray[] = $row;
}

// return the result of the query
echo json_encode($catArray);

//write to json file (optional)
//$fp = fopen('cat.json', 'w');
//fwrite($fp, json_encode($catArray));
//fclose($fp);


?>
