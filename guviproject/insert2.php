<?php 
include("config.php");

if(isset($_POST['save_reg']))
{
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
	$name = mysqli_real_escape_string($db, $_POST['uname']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    
    if($name== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($fname== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
	if($pass== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($gender== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($dob== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($contact== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($address== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($pincode== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if($state== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    
    $query = "INSERT INTO user (fname,uname,pass,gender,dob,contact,address,pincode,state) VALUES('$fname','$name','$pass','$gender','$dob','$contact','$address','$pincode','$state')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
	
}

	  
?>