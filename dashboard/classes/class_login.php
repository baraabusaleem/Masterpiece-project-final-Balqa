<?php
session_start();

class login extends db{
   public $emailErr;
   public $passErr;
   public $emailErr2;
    
    public function log($umail,$pass){
    if (isset($umail) && isset($pass)) {
       
    
       
      
        
    
        if (empty($umail)) {
            $this->emailErr= "Please enter your email";
    
        }if(empty($pass)){
            $this->passwordErr= "Please enter your passwored";
    
        }
        if(!empty($pass) && !empty($umail)){
            $sql = "SELECT * FROM users WHERE user_email ='$umail' AND user_pass='$pass'";
                $result = mysqli_query($this->connect(), $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) === 1) {
                    if($row['user_type']=='user'){

                    $_SESSION['user_email']=$row['user_email'];
                    $_SESSION['user_name']=$row['user_name'];
                    $_SESSION['user_id']=$row['user_id'];
        
                    header("location:../Security-Store/../index.php");

                }else{
                    $_SESSION['admin_email']=$row['user_email'];
                    $_SESSION['admin_id']=$row['user_id'];
                    header("location:..//admin_area/index.php?dashboard");
                   // echo "<script>window.open('index.php?dashboard','_self')</script>";

                }
                    
               }
    
            }else{$this->emailErr2= "wrong pass or email";}
        }
    }
    
}








?>