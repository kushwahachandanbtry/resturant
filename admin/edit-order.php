<?php
$id = $_GET['id'];

include "config.php";

$sql = "SELECT * FROM order_table WHERE $id = order_id";

$result = mysqli_query( $conn, $sql );

if( mysqli_num_rows( $result ) > 0 ) {
    while( $row = mysqli_fetch_assoc( $result ) ) {


?>


<div class="edit-order">
        <form action="" method="POST">
            <label for="">Table Id:</label><br>
            <input type="text" name="table-id" value="<?php echo $row['table_id']; ?>">
            <br>
            <label for="">Order:</label><br>
            <input type="text" name="order" value="<?php echo $row['order_food']; ?>">
            <br>
            <label for="">Quantity:</label><br>
            <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">
            <br>
            <label for="">Total Price:</label><br>
            <input type="number" name="total-price" value="<?php echo $row['total_price']; ?>"><br>

            <button type="submit" class="order-update" name="order-update">Update</button>

        </form>	
        
            </div>
            <?php }} 
            if( isset( $_POST['order-update'] ) ) {
                $tableId = $_POST['table-id'];
                $order = $_POST['order'];
                $quantity = $_POST['quantity'];
                $totalprice = $_POST['total-price'];

                $sql1 = "UPDATE order_table SET table_id = '{$tableId}' , order_food = '{$order}', quantity = {$quantity}, total_price = {$totalprice} WHERE order_id = {$id}";

                $result1 = mysqli_query( $conn, $sql1 ) ;

                if( $result1 ) {
                    echo "<div style='color: blue; font-size: 20px; text-align:center;'>Updated Successfully</div>";
                } else {
                    echo "<div style='color: red; font-size: 20px; text-align:center;'>Updated UnSuccessfully</div>";
                }
                
            }
?>
