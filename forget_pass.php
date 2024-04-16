<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="ex_css/forget.css" rel="stylesheet">
<style>
    .form-gap {
    padding-top: 70px;
}
</style>
    <title>Forget Password</title>
</head>
<body>
                <div class="container">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <p class="forget-title">Forgot Password?</p>
                  <p class="forget-details">You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="btn">
                        <a href="sign_in.php" name="recover-submit"  >Reset Password</a>
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
          

</body>
</html>