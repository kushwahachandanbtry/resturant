<?php
include "config.php";

// if( $_SESSION['username'] && $_SESSION['password'] ) {
	?>

<p>Place order</p>
<form action="" method="POST">
	<div class="first-section">
		<?php
		
		$sql2 = "SELECT * FROM order_table ORDER BY order_id DESC LIMIT 1";
		$result2 = mysqli_query( $conn, $sql2 ) ;
			if( mysqli_num_rows($result2) > 0 ) {
				
				while( $row = mysqli_fetch_assoc( $result2 ) ) {
		?>
		<div>
			<label for="">Bill ID</label>
			<input type="text" name="bill" id="" readonly value="<?php echo $row['order_id']; ?>">
		</div>
		<?php }} ?>
		<div>
			<label for="">Category</label>
			<br>
		   
			<select name="order" id="orderSelect">
				<option class="veg" value="veg">Veg</option>
				<option class="non-veg" value="non-veg">Non-veg</option>
			</select>
		</div>
		<div>
			<label for="">Order</label>
			<br>
			<select name="order-food" id="">
				<?php
				$sql3 = "SELECT * FROM food";

				$result3 = mysqli_query( $conn, $sql3 );
				if( mysqli_num_rows( $result3 ) > 0 ){
					while( $row3 = mysqli_fetch_assoc( $result3 ) ) {

					
				?>
				<option value="Milk"><?php echo $row3['name'] . "  (" . $row3['category'] . ")"; ?></option>
				<?php
				}
			}
			?>
			</select>
		</div>
	</div>

	<div class="first-section">
		<div>
			<label for="">Table ID</label>
			<input type="text" name="table-id" id="">
		</div>
		
		<div>
			<label for="">Quantity</label>
			<br>
			<input type="text" name="quantity" id="">
			<br>
			<label for="">Price</label>
			<br>
			<input type="text" name="price" id="">
			<div class="btn">
				<input type="submit" name="" id="" value="Clear">
				<input type="submit" name="add-to-cart" id="" value="Add to Chart">
			</div>
		</div>
	</div>
</form>
<p class="message" style="text-align: center; padding: 20px;"></p>
<?php
include_once "config.php";
if( isset( $_POST['add-to-cart'] ) ) {
	$table_id = $_POST['table-id'];
	$order_food = $_POST['order-food'];
	$quantity = $_POST['quantity'];
	$total_pirce = $_POST['price'];

	$sql = "INSERT INTO order_table(table_id, order_food, quantity, total_price)
	VALUES('{$table_id}', '{$order_food}',{$quantity}, {$total_pirce})";
	
	$result = mysqli_query($conn, $sql );
	if( $result ) {
		?>
		<script>
			const message =document.querySelector('.message');
			message.innerText = "Added Successfully!!!";
			setTimeout(() => {
				message.style.display = 'none';
			}, 3000);
		</script>
		<?php
	} else {
		echo "Not added";
	}
}


if( isset( $_SESSION['username'] ) && isset( $_SESSION['password'] ) ) {
?>

<div class="table">
<table  border="1" cellspacing="0" align="center">
	<tr>
		<th>Bill Id</th>
		<th>Table Id</th>
		<th>Order</th>
		<th>Quantity</th>
		<th>Price per item</th>
		<th>Total price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
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
		<td><?php echo $row['quantity'] * $row['total_price'] ; ?></td>
		<td>
			<button class="edit" >
				<a href="?content=edit-order&id=<?php echo $row['order_id']; ?>">Edit</a>
			</button>
		</td>
		<td><button class="delete" name="delete">
			<a href="?content=item1&id=<?php echo $row['order_id']; ?>">Delete</a>
		</button></td>
		
	</tr>
		<?php }} 
		if( isset( $_GET['id'] ) ) {
			$id = $_GET['id'];
		
			include "config.php";
			$sql2 = "DELETE FROM order_table WHERE order_id = {$id}";
			$result2 = mysqli_query( $conn, $sql2 ) ;
			if( $result2 ) {
				echo "<div style='color:blue; text-align: center;font-size: 20px'>Deleted Successfully</div>";
			} else {
				echo "<div style='color:red; font-size: 20px'>Deleted UnSuccessfully</div>";
			}
		}
	}
		?>
</table>
</div>



<script src="script.js"></script>
<?php 
// } else {
//     header("Location: http://localhost/resturant");
//  }
?>
