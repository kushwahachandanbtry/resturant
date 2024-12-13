<?php
$id = $_GET['id'];

include "config.php";

$sql = "SELECT * FROM food WHERE food_id = $id";

$result = mysqli_query( $conn, $sql );

if( mysqli_num_rows( $result ) > 0 ){
    while( $row = mysqli_fetch_assoc( $result ) ) {

    




?>


<div class="edit-order">
        <form action="" method="POST">
            <label for="">Food Id:</label><br>
            <input type="text" name="food-id" value="<?php echo $row['food_id']; ?>">
            <br>
            <label for="">Name:</label><br>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
            <br>
            <label for="">Price:</label><br>
            <input type="number" name="price" value="<?php echo $row['price']; ?>">
            <br>
            <label for="">Category:</label><br>
            <input type="text" name="category" value="<?php echo $row['category']; ?>"><br>

            <button style="color: #fff; padding: 5px 15px; background: green;" type="submit" class="food-update" name="food-update">Update</button>

        </form>	
        
            </div>
         <?php
         }
        }

        if( isset( $_POST['food-update'] ) ) {
            $foodId = $_POST['food-id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            $sql1 = "UPDATE food SET food_id = '{$foodId}' , name = '{$name}', price = '{$price}', category = '{$category}' WHERE food_id = {$id}";

            $result1 = mysqli_query( $conn, $sql1 ) ;

            if( $result1 ) {
                echo "<div style='color: blue; font-size: 20px; text-align:center;'>Updated Successfully</div>";
            } else {
                echo "<div style='color: red; font-size: 20px; text-align:center;'>Updated UnSuccessfully</div>";
            }
            
        }
        ?>   
