<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
    <title>Login Page</title>
   

</head>
<body>
<div class="container">
    <div class="card" id="loginForm">
      <h2>Login</h2>
      <form action="login" method="post">
      @csrf
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <br>
        @if (session('error'))
        <span style="color: red;">error</span>
        @endif
        <br>
        <button type="submit">Login</button>

        <a onclick="split()" style="display: block;margin-left: auto;">Forgot password</a>
      </form>
    </div>
    <div class="card" id="resetpass" style="display: none;">
        <h2>Reset Password</h2>
        <form method="post" action="resetpassword">
        @csrf
          <input type="text" id="username" name="username" placeholder="Username" required>
          <input type="password" id="password" name="password" placeholder="New Password" required>

          <br>
        @if (session('error'))
        <span style="color: red;">error</span>
        @endif
        <br>
          <button type="submit">Reset Password</button>
          <a onclick="split()"  style="display: block;margin-left: auto;">Back to Login</a>
        </form>
      </div>
  </div>

<script>
 function split(){
        let login = document.getElementById('loginForm');
        let reset = document.getElementById('resetpass');

        
        if(reset.style.display === "none"){
            reset.style.display = "block";
            login.style.display = "none";
        } else {
            login.style.display = "block";
            reset.style.display = "none";
        }
        
    }
</script>


</body>
</html>
