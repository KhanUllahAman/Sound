<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=sound", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM songs 
 WHERE artist IN (".$search_text.") 
 
 ";
}
else
{
 $query = "SELECT * FROM songs";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["title"].'</td>
   <td>'.$row["artist"].'</td>
   <td>'.$row["genre"].'</td>
   <td>'.$row["language"].'</td>
   <td>'.$row["date"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>
