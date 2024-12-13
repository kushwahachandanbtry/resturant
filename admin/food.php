<?php

if( $_SESSION['username'] && $_SESSION['password'] ) {

    if( isset( $_POST['save-food']) ) {
        include "config.php";
        $name = $_POST['food-name'];
        $price = $_POST['food-price'];
        $category = $_POST['food-category'];

        $sql1 = "INSERT INTO food(name, price, category ) VALUES('{$name}', '{$price}', '{$category}')";

        $result1 = mysqli_query( $conn, $sql1 );

        if( $result1 ) {
            echo "submit successfully";
        }
        else {
            echo " submit unsuccessfully";
        }
    }
    ?>

<h1>food</h1>

<div class="food-category">
    <h3><button type="" onclick="handleFoodAdd()" class="order-update" name="order-update">Add Food</button></h3>
</div>

<div class="edit-order add-food">
        <form action="" method="POST">
            <div onclick="foodClose()" class="food-close-btn veg-close-btn">
                <span>X</span>
            </div>
            <label for="">Food Name:</label>
            <input type="text" name="food-name" value>
            <br>
            <label for="">Price:</label>
            <input type="number" name="food-price">
            <br>
            <label for="">Category:</label>
            <select name="food-category" id="">
                <option value="veg">Veg</option>
                <option value="non-veg">Non-Veg</option>
            </select>
            <br>

            <button name="save-food" type="submit" style=" margin-top: 30px; align-items:center; text-align:center; background: blue; text-decoration: none; color: #fff; padding: 8px; border-radius: 10px; font-size:20px; ">Sumbit</button>

        </form>	
</div>
<div class="food">

<table border="1" cellspacing="0" align="center">

    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $sql = "SELECT * FROM food";
    include "config.php";
    $result = mysqli_query( $conn, $sql ) ;
        if( mysqli_num_rows($result) > 0 ) {
            
            while( $row = mysqli_fetch_assoc( $result ) ) {
    ?>
    <tr>
        <?php
       

       
    ?>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td>
            <button class="edit" >
                <a href="?content=edit-food&id=<?php echo $row['food_id']; ?>">Edit</a>
            </button><button class="edit" >
                <a href="?content=edit-food&id=<?php echo $row['food_id']; ?>">Edit</a>
            </button>
        </td>
        <td><button class="delete" name="delete">
        <a href="?content=delete-food&id=<?php echo $row['food_id']; ?>">Delete</a>
        </button></td>
        
    </tr>
        <?php }} 
        
        ?>
</table>


</div>



<script src="script.js"></script>
<?php 
} else {
    header("Location: http://localhost/resturant");
 }
?>
