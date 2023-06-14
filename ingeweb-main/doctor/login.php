<?php
session_start();

  $content = '
  <div class="container-fluid bg-image py-5" style="margin: 0px 0;">
  <div class="login-container">
  <div class="login-box text-center">
    <div class="login-box-header">
      <h3 class="login-box-title">Login Page</h3>
    </div>
    <!-- /.login-box-header -->
    <div class="login-box-body">
      <form role="form" method="POST">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary" onClick="AuthDoctor()">Login</button>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
</div>
</div>';
  include('../master.php');
?>
<!-- page script -->

<script>
    function AuthDoctor(){
        $.ajax(
        {
            type: "POST",
            url: '../api/user/login.php',
            dataType: 'json',
            data: {

                email: $("#email").val(),        
                password: $("#password").val()
               
            },
            error: function (result) {
                alert(result.responseText);
                alert("Error it is");
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Sign In!");
                    window.location.href = '../doctor';
                }
                else {
                    alert(result['status']);
                    alert(result['message']);
                    
                    window.location.href = '../doctor';
                }
            }
        });
      
    }
</script>