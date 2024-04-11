<!DOCTYPE html>
<html lang="en">
   <head>

<style>
a:link, a:visited,ab{
  background-color:#258b1f;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color:#17ca6d ;
}

.header {
      background-color:#7dcd15;
      padding: 20px;
      text-align: center;
}

.form-group{
      width:400px;
      hight:800px;
      top:0;
      bottom:0;
      background-color:#9edf4a;
   }
.form-introduction{
      background-color:#bcd29f;
      width:800px;
      hight:400px;
   }

</style>
</head>
<body bgcolor="white">
<div class="header">
<h1> Online E-Voting System</h1>
</div>


<br>
    <center> 

   <div class ="form-introduction">
    <pre>
      <center><h2>Welcome to Online Voting</h2>
      <image src="https://www.itl.cat/pngfile/big/283-2834520_500-vote-pictures-hd-click-background.jpg" width="250px" hight="150px">
      </center>
      <font color="#2E4053">
      <lable>Just like we do vote physically,here you can do same  activity virtually.<br>
      This platform is made to make the task easy and save time.here<br>
      every thing is done exactly like it is done in a traditional method but online.</lable>
     </font>
   </pre>
   </div> 
  
      
               <form class="m-t" role="form" action="" method="post">
                  <div class="form-group">
                   
                   <br>
                   <br>
                  <h3>
                  <input type="text" id="sid" class="form-control" placeholder="Sudent ID" name="sid" required="">
                  <br>
                  <br>
                  
                   <input type="password" id="password" class="form-control" placeholder="password"name="password" required="">
                  
                  <br>
                  <br>
                  <!-- <div class="checkbox">
                     <label>
                     <input name="remember" type="checkbox" value="Remember Me">Remember Me
                     </label>
                  </div> -->

                  <button type="submit" class="btn btn-primary btn-block " name="submit" value="index">Login</button>
                  <br>
                  <p class=" text-center"><small>Do not have an account?</small></p>
                <a class="btn  btn-default btn-block" href="register.php" >Create an account</a>
                 <br>
                 <br>
                 <br>
                
               </div>
               </form>
               


       
                  <?php
                  
                  if (isset($_POST['submit']))
                      {     
                        include("connect.php");
                        
                        $sid=$_POST['sid'];
                        $password=$_POST['password'];
                         
                        $sql = "SELECT * FROM login  WHERE sid = '$sid' AND password = '$password'";

                        $result = $conn->query($sql);

                         if ($result->num_rows != 0)
                        {
                           session_start();
                           $_SESSION['login_user']=$sid;
                           $_SESSION['loggedin'] = TRUE;

                            echo "<script language='javascript' type='text/javascript'> location.href='vote.php' </script>";   
                       }
                       else
                       {
                           echo '<span style="color:#FF0000;text-align:center;"><h2>Invalid student Id or password</h2></span>';
                           


                        }
                  }
                  ?>
 </center>           
   </body>
</html>