<?php 
session_start();
include("../dbconnection/DBconnection.php");
include("../model/record.php");

$record = new records();


switch ($_POST['action']) {

    case 'save_record':
        $record->farmer_id = $_POST['farmer_id'];
        $record->crops = $_POST['crops'];
        $record->cattles = $_POST['cattles'];
        $record->fishari = $_POST['fishari'];
        $fishari = $record->save();
        if($fishari){
            $_SESSION['message'] = "<div class='alert alert-success'>Record Save successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Record Not Save</div>";
        }
        header('Location:../add_record.php');
        break;  
    
    case 'update_record':
        $record->farmer_id = $_POST['farmer_id'];
        $record->crops = $_POST['crops'];
        $record->cattles = $_POST['cattles'];
        $record->fishari = $_POST['fishari'];
        $fishari = $record->update($_POST['id']);
        if($fishari){
            $_SESSION['message'] = "<div class='alert alert-success'>Record updated successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Record Not Updated</div>";
        }
        header('Location:../records_list.php');
        break;
    case 'delete_record':
        $status = $record->delete($_POST['id']);
        if($status==true){
            $_SESSION['message'] = "<div class='alert alert-success'>Deleted successfully</div>";
        }
        else
        {
            $_SESSION['message'] = "<div class='alert alert-danger'>Record Unable to delete</div>";
        }
        header('Location:../records_list.php');
        break;
            
    default:
        
        header('Location:../index.php');
        break;
}


 ?>