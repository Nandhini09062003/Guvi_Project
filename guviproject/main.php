<?php
session_start();
?>


<?php
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      $sql = "SELECT * FROM user WHERE uname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
		 $_SESSION['loggedin'] = TRUE;
         $_SESSION['login_user'] = $myusername;
         
echo "<script>alert('Login Successful');window.location.href='main.php';</script>";
	}
	  else
	  {
         echo "<script>alert('Your Login Name or Password is invalid');window.location.href='index.php';</script>";
		 exit();
      }
   }	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
</head>
<body style="background-color:powderblue">
<section class="vh-100 gradient-custom2">

  <div class="w3-container">
  
     
    
      <h1 style="font-family:Times new roman;font-weight: bold;text-align:center;color:black">YOUR PROFILE</h1>
    </div>
    
  
  
  </div>



    <div class="container-sm">
      <table>
        <tbody>
  <?php
                    $username=$_SESSION["id"];
                    $password=$_SESSION["passw"];
										$query2 = "SELECT * FROM user WHERE uname='$username' and pass='$password'";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											//$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>

			<div class="col-lg-90">
        <div class="card mb-9">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3" >
               <b><h3> <p class="mb-0" style="font-family:Times new roman;font-weight: bold">Full Name</p></h3></b>
              </div>
              <div class="col-sm-3">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['fname']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Email</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-6" style="font-family:Times new roman"><?php echo $student2['uname']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Gender</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-7" style="font-family:Times new roman"><?php echo $student2['gender']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Date of Birth</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['dob']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Mobile</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['contact']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Address</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['address']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
              <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">Pincode</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['pincode']?></p></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
              <h3><p class="mb-0" style="font-family:Times new roman;font-weight: bold">State</p></h3>
              </div>
              <div class="col-sm-9">
                <h3><p class="text-muted mb-0" style="font-family:Times new roman"><?php echo $student2['state']?></p></h3>
              </div>
            </div>
          </div>
        </div>									
                      </table>
	 <?php
											
											//$sn=$sn+1;
											}
                            }
                            ?>
                            <div class="container mt-3">
  
  
  <button type="button" class="btn btn-primary btn-lg pull-top" data-bs-toggle="modal" data-bs-target="#myModal">
    UPDATE DETAILS
  </button>
  <div class style="text-align:left;font-family:Times new roman"><h3><a href="index.php">Logout</a></h3></div>
  
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      
        <b><h4 class="modal-title" style="font-family:Times new roman"><b>UPDATE DETAILS</b></h4></b>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form id="reg" >
      
      <div class="mb-3">
      <h4> <label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Date of Birth</label></h4>
			  <input type="date" name="dob" class="form-control form-control-lg" id="validationDefault05" placeholder="dd-mm-yyyy" required>
			</div>
      <div class="mb-3">
				  <h4><label for="exampleFormControlTextarea1" class="form-label" style="font-family:Times new roman">Contact</label></h4>
				<input type="tel" name="contact" minlength="10" class="form-control form-control-lg" id="validationDefault05" placeholder="enter mobile number" pattern="[0-9]{10}" required>

			</div>
      <div class="mb-3">
      <h4> <label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Address</label></h4>
			  <input type="text" name="address" class="form-control form-control-lg" id="validationDefault05" placeholder="enter address" required>
			</div>
      <div class="mb-3">
      <h4> <label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Pincode</label></h4>
			  <input type="text" name="pincode" class="form-control form-control-lg" id="validationDefault05" placeholder="enter pincode" required>
			</div>
      <div class="mb-3">
      <h4> <label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">State</label></h4>
			  <input type="text" name="state" class="form-control form-control-lg" id="validationDefault05" placeholder="enter state" required>
			</div>
           
      <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
			<button type="submit" class="btn btn-primary">UPDATE</button>
      

			</form>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       
      </div>
       
                          </section>
    </div>
  </div>
</div>





<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).on('submit', '#reg', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);


            $.ajax({
                type: "POST",
                url: "insert3.php",
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
</section>

</div>
                            
	 

</body>
</html>



