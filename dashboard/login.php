<?php 
  require_once './classes/dbh.classes.php';
    include './classes/class_login.php';?>

<?php



$login=new login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

    $login->log($_POST['email'],$_POST['pass']);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .cascading-right {
          margin-right: -50px;
        }
    
        @media (max-width: 991.98px) {
          .cascading-right {
            margin-right: 0;
          }
        }
        
        .container{
          margin-right: 10px;
          margin-left: auto;
        }
        .error{
    color:red;
}
      </style>
</head>
<body>
    
</body>
</html>


<section class="text-center text-lg-start">

  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5">
              <h2 class="fw-bold mb-5">Login</h2>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                
                <!-- Email input -->
                <div class="form-outline">
                    
                    <label class="form-label" for="form3Example3">Email address </label>
                    <input type="email" id="email" name="email" class="form-control" >
                    <div id="email-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($login->emailErr)) {
                    echo  $login->emailErr;
                }
                ?>
            </span>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="pass" name="pass" class="form-control">
                    <div id="password-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($login->passwordErr)) {
                    echo $login->passwordErr;
                }
                ?>
            </span>
                </div>


  
                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-block mt-3 ps-5 pe-5 pt-2 pb-2">
                 log in
                </button>
                <a href="http://localhost/Security-Store//index.php" class="btn btn-success btn-block mt-3 ps-4 pe-4 pt-2 pb-2">back to store

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg>

                </a>
                <br>
                <br>
                <p>Don't have an account? <a href="registration.php" style="text-decoration: none;">Sign up</a></p>
  

              </form>
            </div>
          </div>
        </div>
  
        <div class="col-6 mb-5 mb-lg-0">
          <img src="se2-pendant-400.jpg"  style="height: 500px;"  class="w-400 rounded-4 shadow-4" alt="" >
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>

  </body>
  </html>