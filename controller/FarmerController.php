<?php 
session_start();
include("../dbconnection/DBconnection.php");
include("../model/farmer.php");

$farmer = new farmers();


switch ($_POST['action']) {

    case 'save_farmer':
        $farmer->name = $_POST['name'];
        $farmer->address = $_POST['address'];
        $farmer->phone = $_POST['phone'];
        $farmer->total_land = $_POST['total_land'];
        $total_land = $farmer->save();
        if($total_land){
            $_SESSION['message'] = "<div class='alert alert-success'>Farmer Save successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Farmer Not Save</div>";
        }
        header('Location:../add_farmer.php');
        break;  
    
    case 'update_farmer':
        $farmer->name = $_POST['name'];
        $farmer->address = $_POST['address'];
        $farmer->phone = $_POST['phone'];
        $farmer->total_land = $_POST['total_land'];
        $total_land = $farmer->update($_POST['id']);
        if($total_land){
            $_SESSION['message'] = "<div class='alert alert-success'>Farmer updated successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Farmer Not Updated</div>";
        }
        header('Location:../farmers_list.php');
        break;
    case 'delete_farmer':
        $status = $farmer->delete($_POST['id']);
        if($status==true){
            $_SESSION['message'] = "<div class='alert alert-success'>Deleted successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Farmer Unable to delete</div>";
        }
        header('Location:../farmers_list.php');
        break;
            
    default:
        
        header('Location:../index.php');
        break;
}


 ?>