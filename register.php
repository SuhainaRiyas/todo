<?php
session_start();

if(isset($_SESSION['name'])){
  header('location:todo/index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="todo/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="todo/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="todo/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="register-logo">
    
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <h4 class="login-box-msg">Signup</h4>

      <form action="action.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" id="name" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12 col-sm-12">
            <button type="submit" name="register" id="register" class="btn btn-sm btn-success btn-block">Signup</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      Already have an account? <a href="login.php" class="text-center">Sign in </a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <div class="alert alert-danger mt-3" id="erroralert" role="alert" style="display:none;"></div>
  <div class="alert alert-success mt-3" id="successalert" role="alert" style="display:none;"></div>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="todo/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="todo/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="todo/dist/js/adminlte.min.js"></script>

<script>
  $("#register").click(function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var cpass = $("input[name=cpass]").val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            $('#erroralert').text('Invalid email').show();
            setTimeout(function() { 
                $('#erroralert').fadeOut('slow'); 
            }, 2000);
            return false;
        }
        if(name == '' || email == '' || password == '' || cpass== ''){
          $('#erroralert').text('All fields are required').show();
            setTimeout(function() { 
                $('#erroralert').fadeOut('slow'); 
            }, 2000);
            return false;
        }
  		$.ajax({
            data : {name:name,email:email,password:password,cpass:cpass,action:'register'},
            type: "post",
			      url: "action.php",
			      success: function(data){
                if(data == 'success'){
                    window.location.href = "/todo-task-main/todo/index.php";
                }else{
                    $('#erroralert').text(data).show();
                    setTimeout(function() { 
                        $('#erroralert').fadeOut('slow'); 
                    }, 1000);
                }
			}		

		});
});
</script>
</body>
</html>
