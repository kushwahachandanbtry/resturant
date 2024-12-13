<?php
$id = $_GET['id'];
if( $_SESSION['username'] && $_SESSION['password'] ) {

include "config.php";

$sql = "SELECT * FROM employee WHERE $id = employee_id";

$result = mysqli_query( $conn, $sql );

if( mysqli_num_rows( $result ) > 0 ) {
    while( $row = mysqli_fetch_assoc( $result ) ) {


?>


<div class="edit-order">
        <form action="" method="POST">
            <label for="">Employee Id:</label><br>
            <input type="text" name="employee-id" value="<?php echo $row['employee_id']; ?>">
            <br>
            <label for="">Name:</label><br>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
            <br>
            <label for="">Phone Number:</label><br>
            <input type="text" name="phone_number" value="<?php echo $row['Phone_number']; ?>">
            <br>
            <label for="">Email:</label><br>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            <br>
            <label for="">Password:</label><br>
            <input type="text" name="password" value="<?php echo $row['password']; ?>"><br>

            <button type="submit" class="order-update" name="employee-update">Update</button>

        </form>	
        
            </div>
            <?php }} 
            if( isset( $_POST['employee-update'] ) ) {
                $employee_id = $_POST['employee-id'];
                $name = $_POST['name'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                $sql1 = "UPDATE employee SET employee_id = '{$employee_id}' , name = '{$name}', Phone_number = '{$phone_number}', email = '{$email}', password = '{$password}', role = '{$role}' WHERE employee_id = {$id}";

                $result1 = mysqli_query( $conn, $sql1 ) ;

                if( $result1 ) {
                    echo "<div style='color: blue; font-size: 20px; text-align:center;'>Updated Successfully</div>";
                } else {
                    echo "<div style='color: red; font-size: 20px; text-align:center;'>Updated UnSuccessfully</div>";
                }
                
            }
        }else {
            header("Location: http://localhost/resturant");
         }
?>