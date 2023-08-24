<?php
session_start();
?>


<?php
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      $_SESSION["id"]=$myusername;
      $_SESSION["passw"]=$mypassword;
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



<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
        @import url("styles.css");
        a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: black;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
.gradient-custom {
  background: #f587a4;
  
  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, rgb(227, 102, 190), rgb(148, 220, 242));
  
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgb(218, 154, 210), rgb(160, 229, 238));
  }
  


    </style>

</head>
    <body>
          <section class="vh-100 gradient-custom">
    
    <div class="row gx-lg-5 align-items-center">
    <div class="col-lg-5 mb-5 mb-lg-10">
    <img src="draw2.webp"></div>
        <div class="col-lg-6 mb-8 mb-lg-8">
        <div class style="border-radius: 10rem;">
        <div class="card-body py-6 mb-6 px-md-5 ">

        <form style="width: 90rem;height:30 rem;display: flex;flex-direction:column;background-color:white;border-radius: 20px;justify-content:center;align-items:center;margin-top:130; " method="POST">
             
              <h1 class="fw-bold mb-2 text-uppercase" style="font-family:Times new roman; font-size:30px; color:black">Login</h1>
             
                

              <div class="mb-3">
              <h3><label for="exampleFormControlInput1" label class="form-label" for="typeEmailX" style="font-family:Times new roman;color:black">Email</label></h3>
                <input type="email"  name="mail" id="exampleFormControlInput1" class="form-control form-control-lg" style="width: 700px;height: 50px;
  color: black;
  font-size:20px;
 
  padding: 10px 30px;
 
  border-radius: 30px;" >
                
              </div>

              <div class="form-outline form-white mb-3">
              <h3><label for="exampleFormControlInput1" label class="form-label" style="font-family:Times new roman;color:black">Password</label></h3>
                <input type="password" name="pass" class="form-control form-control-lg" id="exampleFormControlInput1" style="width: 700px;height: 50px ;font-size:20px;color: black;padding: 10px 30px;border-radius: 30px;">
               
              </div>

  <h4><p class=" mb-5 pb-lg-2"><a class="text-black" href="forgotpassword.php" style="font-family:Times new roman">
              Forgot password?</a></p></h4>

              <h3><button class="btn btn-primary btn-lg" type="submit" style="font-family:Times new roman; width:150;padding: 10px 30px;border-radius: 30px;">Login</button></h3>
  
      
            </div>
           

            <div>
            <div class="container">
  <!-- Trigger the modal with a button -->
</div>
              <h3><b><p class="mb-3 mr-3 pb-lg-1" style="font-family:Times new roman;text-align:center;color:black">New User?? </b></h3>
             <div class style="text-align:center"> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="font-family:Times new roman; width:180;padding: 10px 30px;border-radius: 80px;">Create Account</button></div>
             
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </form>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <b><h2 class="modal-title" style="font-family:Times new roman;font-weight: bold;text-align:center">REGISTER</h2></b>
        </div>
        
        <div class="modal-body">
        <form id="reg" >
      <div class="mb-3">
			  <h4><label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Name</label></h4>
			  <input type="text" name="fname" class="form-control form-control-lg" id="validationDefault05" placeholder="enter name" required>
			</div>
			<div class="mb-3">
      <h4><label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Email address</label></h4>
			  <input type="email" name="uname" class="form-control form-control-lg" id="validationDefault05" placeholder="name@example.com" required>
			</div>
			<div class="mb-3">
      <h4><label for="exampleFormControlTextarea1" class="form-label" style="font-family:Times new roman">Password</label></h4>
				<input type="password" name="pass" minlength="10" class="form-control form-control-lg" id="validationDefault05" placeholder="enter password" required>
			</div>
      
      <div class="mb-3">
      <h4> <label for="exampleFormControlInput1" class="form-label" style="font-family:Times new roman">Gender</label></h4>
      <select id="validationDefault05" name="gender" class="form-control form-control-lg">
     <option value="male">Male</option>
     <option value="female">Female</option>
      <option value="others">Others</option>
  </select>
			</div>
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
			<button type="submit" class="btn btn-primary">Register</button>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
    
   <h5 class style="color: white;font-family: Times New Roman;text-align:center">Developed by Nandhini R (nandhiniraj496@gmail.com)</h5>
  </div>
  
  <!--<h2 style="text-align:center;">User Details</h2>

<table class="table" id="user">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
      <th scope="col">Gender</th>
      <th scope="col">Dob</th>
      <th scope="col">Contact</th>
    </tr>
  </thead>
  <tbody>
  <?php
										$query2 = "SELECT * FROM user";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>
  
											<tr>
											  <td><?php echo $sn;?></td>
                        <td><?= $student2['fname'] ?></td>
											  <td><?= $student2['uname'] ?></td>
											  <td><?= $student2['pass'] ?></td>
                        <td><?= $student2['gender'] ?></td>
                        <td><?= $student2['dob'] ?></td>
                        <td><?= $student2['contact'] ?></td>
                        <td><?= $student2['address'] ?></td>
                        <td><?= $student2['pincode'] ?></td>
											</tr>
									 <?php
											
											$sn=$sn+1;
											}
                            }
                            ?> 
  </tbody>
</table>  -->
                          
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
                url: "insert2.php",
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
</body>
</html>