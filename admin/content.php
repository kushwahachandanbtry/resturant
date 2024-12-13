<?php

if( isset( $_GET['content'] ) ) {
$content = $_GET['content'];

switch( $content ) {
    case 'item1':
        include('order.php');
        break;

    case 'item2':
        include('food.php');
        break;

    case 'item3':
        include('employee.php');
        break;

    case 'item4':
        include('view-bill.php');
        break;

    case 'item5':
        include('report.php');
        break;

    case 'item6':
        include('logout.php');
        break;

    case 'edit-order':
        include('edit-order.php');
        break;

    case 'edit-employee':
        include('edit-employee.php');
        break;

    case 'edit-food':
        include ('edit-food.php');
        break;

        case 'delete-food':
            include ('delete-food.php');
            break;

        case 'print-bill':
            include ('print-bill.php');
            break;
    default:
        echo "Please select valid button";
}
} 
