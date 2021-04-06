<?php
   session_start();
   //Gate authentication mechanism 
   
   $id =  rand(500,500000000);
   $_SESSION['id'] = $id;
   $password = 12345;
   $username = "admin";

   function redirect(){
       global $username,$password,$id;
       switch ($password) {
           case 12345:
               
           header("Location: ./pages/index.php?id=$id");
           break;

           default : 
           echo ".";
       }
   }

   if(isset($_POST['submit'])){
       $name = $_POST['username'];
       $safe = $_POST['password'];

       if(($username == $name ) && ($safe == $password)){
           
           redirect();

       }else{
           echo "Wrong credentials";
       }
   }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Gate auth</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://bootswatch.com/cerulean/#">Login</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span class="sr-only">(current)</span>
        </a>
      
    </ul>
  </div>
</nav>

<br>
    <div class="container well"> 
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" value="Login" class="form-control bg-dark text-white" name="submit">
    </form>
    </div>
</body>
</html>