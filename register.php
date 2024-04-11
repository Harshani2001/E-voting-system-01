<!DOCTYPE html>
<html lang="en">
   <head>
    <style>
    .main{
        background-color:#7ed559;
        width: 700px;
        height: 500px;
        
         }
    
   </style>



    </head>

    
    
    <body background="vote.jpg">
               <!--datadase action-->
    <center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="main">
    
    <br>
    <br>
    <h1>Registration</h1>
    <br>
    <br>
     
          
               <form action="" method="post">
                  
                     <input type="text" name="name" placeholder="Username" required="" >
                     <br>
                     <br>
                  
                     <input type="text" placeholder="student id" required="" name="sid">
                     <br>
                     <br>
                  
                     <input type="password" placeholder="Passowrd" required="" name="password">
                     <br>
                     <br>
                  
                     <input type="password" placeholder="confirm Passowrd" required="" name="cpassword">
                     <br>
                     <br>

                     <input type="text" placeholder="department" required="" name="department">

                     <br>
                     <br>
                  
                    <button type="submit" class="btn btn-primary btn-block " name="signup" value="register">Signup</button>
                    
                    <p class=" text-center"><small>Already have an account?</small></p>
                    <a class="btn  btn-default btn-block" href="index.php">Log into account</a>
    
               </form>
        </div>
               
               <?php
                  require_once 'connect.php';
                  
                  if (isset($_POST["signup"])) {
                      if (!empty($_POST['name']) && !empty($_POST['sid']) && !empty($_POST['password']) && !empty($_POST['cpassword']) && !empty($_POST['department'])) {
                          $name = $_POST['name'];
                          $sid = $_POST['sid'];
                          $password = $_POST['password'];
                          $cpassword = $_POST['cpassword'];
                          $department = $_POST['department'];





                          if ($_POST["password"] === $_POST["cpassword"]) {
                  
                          $sql = "SELECT * FROM login  WHERE sid = '$sid' AND password = '$password' ";
                  
                          $result = $conn->query($sql);
                  
                           if ($result->num_rows != 0)
                          {
                             echo '<span style="color:#FF0000;text-align:center;">Already Have the user </span>';
                         }
                         else
                         {
                             
                             $query = "INSERT INTO login (name,sid,password,cpassword,department) VALUES('" . $name . "', '" . $sid . "',  '" . $password . "',  '" . $cpassword . "',  '" . $department . "')";
                             $conn->query($query);
                             header('Location:index.php');
                  
                  
                          }}
                          else{
                            echo '<span style="color:#FF0000;text-align:center;">Passowrd does not match</span>';
                        }
                       }                            
                      }                              
                  
                  ?>
            
   </body>
</html>