<?php
$id = $_GET['id'];

include "config.php";

$sql = "DELETE FROM food WHERE food_id = $id";

$result = mysqli_query( $conn, $sql );

header( 'Location: http://localhost/resturant/admin/dashboard.php?content=item2');
?>
