<?php
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $mynewusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mynewpassword = mysqli_real_escape_string($db,$_POST['pass']); 
      $query ="UPDATE user SET pass='$mynewpassword' WHERE uname = '$mynewusername'";
      $query_run = mysqli_query($db, $query);

       if($query_run)
    {
    echo "<script>alert('Password Changed Successfully');window.location.href='index.php';</script>";
	}
	  else
	  {
         echo "<script>alert('Your email is not registered');window.location.href='index.php';</script>";
		 exit();
      }
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="styles.css">
</head>

<body>
<section class="vh-100 gradient-custom1">
<div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-black" style="border-radius: 1rem;">
        <div class="card-body p-5">

<div class="container">
  <div class="row">
    <div class="col">
	<br></br>
		<form action="#" id="login" method="post" class="continer1" >
<b><h1 style="text-align:center;font-family:Times new roman;font-weight: bold">RESET PASSWORD</h1></b>
			<div class="mb-3">
			  <h4><label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Email address</label></h4>
			  <input type="email" name="uname" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="name@example.com">
			</div>
			<div class="mb-3">
				 <h4> <label for="exampleFormControlTextarea1" class="form-label" style="font-family:Times new roman">New Password</label></h4>
				<input type="password" name="pass" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="enter new password">
			</div>
		
   <button type="submit" class="btn btn-primary" 7y>Submit</button>
   

</form>
</section>
</body>
</html>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).on('submit', '#reg', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);


            $.ajax({
                type: "POST",
                url: "update.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                       $('#user').load(location.href + " #user");

                    }else if(res.status == 500) {
						$('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });	

</script>