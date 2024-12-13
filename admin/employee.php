<?php
/**
 * This page is used for login
 *
 * @package food-ordeing-system
 */

if( $_SESSION['username'] && $_SESSION['password'] ) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resturant Management System</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
                <a href="#" class="new-register" style=" margin-top:-60px; background: blue; text-decoration: none; color: #fff; padding: 8px; border-radius: 10px; font-size:20px;">Add Employee</a>
              
                <table border="1" cellspacing="0" width="85%" align="center" style="margin-top: 20px;">
    <tr>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    include "config.php";
    $sql1 = "SELECT * FROM employee";
    $result1 = mysqli_query( $conn, $sql1 ) ;
        if( mysqli_num_rows($result1) > 0 ) {
            
            while( $row = mysqli_fetch_assoc( $result1 ) ) {
    ?>
    <tr>
        <?php
       

       
    ?>
    
        <td><?php echo $row['employee_id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['Phone_number']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td>
            <button class="edit" >
                <a href="?content=edit-employee&id=<?php echo $row['employee_id']; ?>">Edit</a>
            </button>
        </td>
        <td><button class="delete" name="delete">
            <a href="?content=item3&id=<?php echo $row['employee_id']; ?>">Delete</a>
        </button></td>
        
    </tr>
        <?php }}
        if( isset( $_GET['id'] ) ) {
            $id = $_GET['id'];
        
            include "config.php";
            $sql2 = "DELETE FROM employee WHERE employee_id = {$id}";
            $result2 = mysqli_query( $conn, $sql2 ) ;
            if( $result2 ) {
                echo "<div style='color:blue; text-align: center;font-size: 20px'>Deleted Successfully</div>";
            } else {
                echo "<div style='color:red; font-size: 20px'>Deleted UnSuccessfully</div>";
            }
        }
        ?>
        
</table>


<div class="register-emp">
        <form action="" method="POST">
            <div class="close-btn">
                <span>X</span>
            </div>
            <label for="">Name:</label>
            <input type="text" maxlength="40" name="emp-name" required value>
            <br>
            <label for="">Phone Number:</label>
            <input type="number" maxlength="10" pattern="[1-9]{1}[0-9]{9}" required name="emp-phone">
            <br>
            <label for="">Email:</label>
            <input type="email" required name="emp-email">
            <br>
            <label for="">Password:</label>
            <input type="password" required name="emp-password">
            <br>
            

            <button type="submit" name="emp-save">Sumbit</button>

        </form>	
        <?php
            include_once "config.php";
            if( isset( $_POST['emp-save'] ) ) {
                $emp_name = $emp_email = $emp_phone = $emp_password = '';

                function test_input_data( $data ) {
                    $data = trim( $data );
                    $data = stripslashes( $data );
                    $data = htmlspecialchars( $data );
                    return $data;
                }
                $errors = array();
                $emp_name = test_input_data( $_POST['emp-name'] );
                $emp_phone = test_input_data( $_POST['emp-phone'] );
                $emp_email = test_input_data( $_POST['emp-email'] );
                $emp_password = test_input_data( $_POST['emp-password']);

                if( ! filter_var( $emp_phone, FILTER_SANITIZE_NUMBER_INT ) ) {
                    if( ! preg_match('/^[0-9]{10}+$/', $phone)) {
                        
                    $errors[] = "The number must be 10 digit and must be number.";
                }
            }
            

                if( ! filter_var( $emp_email, FILTER_SANITIZE_EMAIL ) ){
                    $errors[] = "Email must be valid and with @ .";
                }

                if( strlen( $emp_password ) < 8 ) {
                    $errors[] = "The password must be more than 8 character.";
                }
                if( ! empty( $errors ) ) {
                        foreach( $errors as $error ) {
                            $message = $error;
                            echo "<script>alert('" . $message . "');</script>";
                    }
                } else {
            
                $sql = "INSERT INTO employee(name, Phone_number, email, password)
                VALUES('{$emp_name}', '{$emp_phone}','{$emp_email}', '{$emp_password}')";
                
                $result = mysqli_query($conn, $sql );
                if( $result ) {
                    echo "<div style='color: blue;  text-align:center;'>Added to successsfully</div>";
                } else {
                    echo "Not added";
                }
            }
            } 
        ?>
        </div>
		</div>
	</div>

   
</body>
</html>
<?php
} else {
    header("Location: http://localhost/resturant");
 }
 ?>

<script src="script.js"></script>
