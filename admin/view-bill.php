<h1>View Bill</h1>

<table border="1" cellspacing="0" width="85%" align="center">
    <tr>
        <th>Bill Id</th>
        <th>Table Id</th>
        <th>Order</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Print Bill</th>
    </tr>
    <?php
    include "config.php";
    $sql1 = "SELECT * FROM order_table";
    $result1 = mysqli_query( $conn, $sql1 ) ;
        if( mysqli_num_rows($result1) > 0 ) {
            
            while( $row = mysqli_fetch_assoc( $result1 ) ) {
    ?>
    <tr>
        <?php
       

       
    ?>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['table_id']; ?></td>
        <td><?php echo $row['order_food']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['total_price']; ?></td>
        <td>
            <button class="edit" >
                <a href="?content=print-bill&id=<?php echo $row['order_id']; ?>">Print Bill</a>
            </button>
        </td>
        
    </tr>
        <?php }} ?>
</table>

