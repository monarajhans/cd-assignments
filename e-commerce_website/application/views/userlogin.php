<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
  <style type="text/css">
  body {
    text-align: center;
  }
  .register {
    width: 500px;
    display: inline-block;
  }
  .login{
    width: 500px;
    display: inline-block;
    vertical-align: top;
  }
  .error{
    color: red;
  }
  .success{
    color: green;
  }
  </style>
</head>
<body>
  <div class ="container">
    
    <h1>Welcome! </h1>
    <div class="register">
      <h2>Register</h2>
      <form action="/main/register" method="post">
        <p>
          <label>First Name:</label>
          <input type="text" name="first_name">
        </p>
        <p>
          <label>Last Name:</label>
          <input type="text" name="last_name">
        </p>
        <p>
          <label>Email: </label>
          <input type="email" name="email">
        </p>
        <p>
          <label>Password: </label>
          <input type="password" name="password">
        </p>
        <p>
          <label>Confirm Password:</label>
          <input type="password" name="confirm_password">
        </p>
        <input type="submit" value="Register" class="btn btn-default"><br>
      </form>
      <div class="error">
        <?php  
          if ($this->session->flashdata('registration_errors')) {
            echo $this->session->flashdata('registration_errors');
          } ?>
      </div>  
      <div class="success">
        <?php  
          if ($this->session->flashdata('Successful')) {
            echo $this->session->flashdata('Successful');
          }
        ?>
      </div>
    </div>
    
    <div class="login">
      <h2>Log In</h2>
      <form action="/main/login_user" method="post">
        <input type="hidden" name="action" value="login">
        <p>
          <label>Email: </label>
          <input type="email" name="email">
        </p>
        <p>
          <label>Password: </label>
          <input type="password" name="password">
        </p>
        <input type="submit" value="Log in" class="btn btn-default">
      </form>

      <div class="error">
        <?php  
          if ($this->session->flashdata('login_errors')) {
            echo $this->session->flashdata('login_errors');
        } ?>
      </div>  
    </div>


  </div>  
</body>
</html>