<?php 
session_start();
include("../dbconnection/DBconnection.php");
include("../model/doctor.php");

$doctor = new doctors();

switch ($_POST['action']) {

	case 'save_doctor':
		$doctor->name = $_POST['name'];
		$doctor->address = $_POST['address'];
		$doctor->email = $_POST['email'];
		$doctor->phone = $_POST['phone'];
		$doctor->designation = $_POST['designation'];
		$doctor->status = $_POST['status'];
		$status = $doctor->save();
		if($status){
			$_SESSION['message'] = "<div class='alert alert-success'>Doctor Save successfully</div>";
		}
		else
		{
			$_SESSION['message'] = "<div class='alert alert-danger'>Doctor Not Save</div>";
		}
		header('Location:../add_doctor.php');
		break;	
	
	case 'update_doctor':
		$doctor->name = $_POST['name'];
		$doctor->address = $_POST['address'];
		$doctor->email = $_POST['email'];
		$doctor->phone = $_POST['phone'];
		$doctor->designation = $_POST['designation'];
		$doctor->status = $_POST['status'];
		$status = $doctor->update($_POST['id']);
		if($status){
			$_SESSION['message'] = "<div class='alert alert-success'>Doctor updated successfully</div>";
		}
		else
		{
			$_SESSION['message'] = "<div class='alert alert-danger'>Doctor Not Updated</div>";
		}
		header('Location:../doctors_list.php');
		break;
	case 'delete_doctor':
		$status = $doctor->delete($_POST['id']);
		if($status==true){
			$_SESSION['message'] = "<div class='alert alert-success'>Deleted successfully</div>";
		}
		else
		{
			$_SESSION['message'] = "<div class='alert alert-danger'>Doctor Unable to delete</div>";
		}
		header('Location:../doctors_list.php');
		break;
			
	default:
		
		header('Location:../index.php');
		break;
}


 ?>