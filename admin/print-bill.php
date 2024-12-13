<?php
$id = $_GET['id'];

include "config.php";

$sql = "SELECT * FROM order_table WHERE order_id = $id";

$result = mysqli_query( $conn, $sql );




?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .bill-table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .bill-table th, .bill-table td {
            padding: 10px;
            text-align: left;
        }

        .bill-table th {
            background-color: #ddd;
            font-weight: bold;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 23px;
        }
        .print button{
            padding: 7px 17px;
            background: blue;
            color: #fff;
            font-weight: 400;
            font-size: 20px;
            border-radius: 10px;
            border: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Restaurant Bill</h1>
        </div>
        <table class="bill-table">
            <tr>
                <th>Bill Id</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <tr>
                <?php
                if( mysqli_num_rows( $result ) > 0 ){
                    while( $row = mysqli_fetch_assoc( $result ) ) {
                    
                ?>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
            </tr>
        </table>
        <div class="total">
            <div class="print">
                <button>Print</button>
            </div>
            <div>
        <?php echo 'Total Price Rs: ' . $row['quantity'] * $row['total_price'];
        }
    }
        ?>
        </div>
        </div>
    </div>
</body>
</html>





