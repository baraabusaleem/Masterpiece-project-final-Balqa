<?php   require_once './classes/dbh.classes.php';
    include './classes/class_reg.php';?>
<?php

$register=new Register();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

    $register->reg($_POST["email"],$_POST["name"],$_POST["pass"],$_POST["conpass"],$_POST["country"],$_POST["address"],$_POST["phone"]);

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
        a{
            text-decoration: none;
        }
        .container{
          margin-right: 40px;
          margin-left: auto;
        }
        .error{
    color:red;
}

      </style>
</head>
<body>


<!-- Section: Design Block -->
<section class="text-center text-lg-start">

  
    <!-- Jumbotron -->
    <div class="container  ">
      <div class="row g-0 align-items-center">
        <div class="col-5 mb-5 mb-0">
          <div class="card cascading-right " style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body  shadow-5 ms-5">
              <h2 class="fw-bold mb-5">Sign up now</h2>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                <!-- Name input -->
                <div class="form-outline ">
                    <label class="form-label" for="form3Example1">Full Name </label>
                    <input type="text" id="name" name="name" class="form-control" >
                    <div id="nameErr" class="error"></div>
                <span class="error">
                    <?php
                    if (isset($register->nameErr)) {
                        echo $register->nameErr;
                    }
                    ?>
                </span>
                </div>
                <!-- Email input -->
                <div class="form-outline">
                    <label class="form-label" for="form3Example3">Email address </label>
                    <input type="email" id="email" name="email" class="form-control" >
                    <div id="email-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->emailErr)) {
                    echo  $register->emailErr;
                }
                ?>
            </span>
                </div>
                <!-- Password input -->
                <div class="form-outline">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="pass" name="pass" class="form-control">
                    <div id="password-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->passwordErr)) {
                    echo $register->passwordErr;
                }
                ?>
            </span>
                </div>
                <!-- Password input -->
                <div class="form-outline">
                    <label class="form-label" for="form3Example4">Confirm Password</label>
                    <input type="password" id=" conpass" name="conpass" class="form-control">
                    <div id="confirm-password-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->passwordConfirmErr)) {
                    echo $register->passwordConfirmErr;
                }
                ?>
            </span>
        <span class="error">
            <?php
            if (isset($register->msg)) {
                echo $register->msg;
            }
            ?>
        </span>
                </div>
                <!-- Country input -->
                <div class="form-outline ">
                    <label class="form-label" for="form3Example1">Country </label>
                    <input type="text" id="country" name="country" class="form-control" >
                    <div id="country-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->countryErr)) {
                    echo  $register->countryErr;
                }
                ?>
            </span>
                </div>
                <!-- Address input -->
                <div class="form-outline  ">
                    <label class="form-label" for="form3Example1">Address </label>
                    <input type="text" id="address" name="address" class="form-control" >
                    <div id="address-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->addressErr)) {
                    echo  $register->addressErr;
                }
                ?>
            </span>
                </div>
                <!-- Number Phone input -->
                <div class="form-outline  ">
                    <label class="form-label" for="form3Example1">Mobile Phone </label>
                    <input type="tel" id="phone" name="phone" class="form-control" >
                    <div id="phone-error" class="error"></div>
            <span class="error">
                <?php
                if (isset($register->phoneErr)) {
                    echo $register->phoneErr;
                }
                ?>
            </span>
                </div>
                <!-- Upload Image input -->

                <!-- <div class="form-outline  mb-3">
                    <label for="formFileLg" class="form-label">Upload Image</label>
                    <input class="form-control form-control" id="formFileLg" name="image"type="file" >
                </div> -->

  
                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-block mt-3 ps-5 pe-5 pt-2 pb-2">
                  Sign up
                </button>
                <a href="http://localhost/Security-Store//index.php" class="btn btn-success btn-block mt-3 ps-4 pe-4 pt-2 pb-2">back to store

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg>

                </a>
                <br>
                <br>
                <p>Already have an account? <a href="login.php" class=" w-100 fw-bold btn2 " >  Login</a></p>
              </form>
            </div>
          </div>
        </div>
  
        <div class="col-4 mb-5 mb-lg-0">
          <img src="#" style="height: 820px;" class="w-400 rounded-4 shadow-4 mb-3" alt="" >
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
</body>
  </html>