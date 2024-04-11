<!DOCTYPE HTML>
<html>
    <?php 
       require_once 'connect.php';
    ?>

<head>

    <style>
        button {
            background-color: lightcoral;
            color: black;
            border: 2px solid black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }


        body {
            margin: 0;
            background-color:black;

        }

        .header {
            background-color:#c9f747;
            padding: 20px;
            text-align: center;
        }

        form {
            background-color:aquamarine;
            width: 400px;
            height: 300px;
            font-size: 15px;
            padding: 15px;
            margin: 100px;
        }

        img {
            padding: 30px;
            margin: 22px;
            border: 5px;

        }



        h3 {
            background-color: white;
            padding-bottom: 30px;
            padding: 40px;
            width: 300px;
            margin: 50px;

        }


        name {
            background-color: #2ECC71;
            padding-bottom: 50px;
            padding: 30px;
            width: 300px;
        }


        nam {

            background-color: #2ECC71;
            padding-bottom: 50px;
            padding-left: 30px;
            width: 300px;

        }
    </style>
</head>

<body>

    <div class="header">
        <center>

            <h1> WELLCOME 2022/2023 NEW BATCH </h1>

            <h2> LIST OF CANDIDATES FOR THE POSITION OF STUDENT UNION PRESIDENT 2023</h2>

        </center>
    </div>


    <br>

    <div class="img">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <img src="https://png.pngtree.com/element_our/png_detail/20181208/female-student-icon-png_265422.jpg" alt="" width="300" height="300">
       
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <img src="https://www.nicepng.com/png/detail/121-1215004_graduation-icon-png-image-college-student-icon-png.png" alt="" width="300" height="300">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <img src="https://png.pngtree.com/element_our/png_detail/20181208/male-student-icon-png_265268.jpg" alt="" width="300" height="300"><br>
    </div>

    <table row="3">
        <th>
            <div class="h3">

                <h3>
                    Full Name : Amaya Hettiarchchi <br>
                    Department : HNDIT<br>
                    Student ID : AMP-IT-2021-F-0012
                    Vote Id : A<br>
                    <font color ="red"><h2>
                    No Of Votes :</h2></font> <?php 

                        $count = "SELECT COUNT(*)  as total
                         FROM vote 
                         WHERE VoteId = 'A'
                         ;";
                         $run = mysqli_query($conn,$count);
                         $data=mysqli_fetch_assoc($run);
                        echo $data['total'];
                     ?>
                </h3>


            </div>
        </th>
        <th>
            <div class="name">

                <h3>
                    Full Name : Pasidu De. Silva<br>
                    Department : HNDAgri<br>
                    Student ID : AMP-IT-2021-F-0156<br>
                    Vote Id : B <br><br>
                    <font color = "red"><h2>
                    No Of Votes :</h2></font> <?php 

                        $count = "SELECT COUNT(*)  as total
                         FROM vote 
                         WHERE VoteId = 'B'
                         ;";
                         $run = mysqli_query($conn,$count);
                         $data=mysqli_fetch_assoc($run);
                        echo $data['total'];
                     ?>
                </h3>

            </div>
        </th>

        <th>
            <div class="nam">

                <h3>
                    Full Name : Dasun Madanayake<br>
                    Department : HNDAC<br>
                    Student ID : AMP-IT-2021-F-0001<br>
                    Vote Id : C<br>
                    <font color ="red"><h2>
                    No Of Votes :</h2></font> <?php 

                        $count = "SELECT COUNT(*)  as total
                         FROM vote 
                         WHERE VoteId = 'C'
                         ;";
                         $run = mysqli_query($conn,$count);
                         $data=mysqli_fetch_assoc($run);
                        echo $data['total'];
                     ?>
                </h3>



            </div>
        </th>
    </table>
    <div class="form">
        <center>
            
        <form action="vote.php" method="POST">
            <br>
            <br>
            <br>
            Vote for?:<input type="text" value="" name="VoteId1"> <br><br><br>
            Student ID :<input type="text" value="" name="Stid1">
            <br><br>
            <button type="submit" name="submit">VOTE NOW</button>


            </form>
        </center>
        <div class="Lt">
        <a href="index.php">
        <h2 align = "Right"> <button>Thank you!, Log out </h2></button></a>
        </div>

        <?php
     

            if (isset($_POST["submit"])) {
                $StId1 = $_POST['Stid1'];
                $VoteId1 = $_POST['VoteId1'];
            
                // Check if the student has already voted
                $checkQuery = "SELECT * FROM vote WHERE st_id = '$StId1'";
                $checkResult = mysqli_query($conn, $checkQuery);
            
                if (mysqli_num_rows($checkResult) > 0) {
                    // Student has already voted, you can show a message or redirect them
                    echo '<script>alert("You have already voted.");</script>';
                    // Redirect the user to prevent multiple submissions
                    header('Location: vote.php');
                    exit; // Terminate script execution after redirection
                } else {
                    // Student hasn't voted yet, proceed with inserting the vote
                    $query = "INSERT INTO vote (st_id, VoteId) VALUES ('$StId1', '$VoteId1')";
                    $runQuery = mysqli_query($conn, $query);
            
                    if ($runQuery === true) {
                        echo '<script>alert("Vote successfully recorded.");</script>';
                        header('Location: vote.php');
                        exit; // Terminate script execution after redirection
                    } else {
                        echo '<script>alert("Failed to record vote.");</script>';
                    }
                }
            }
            
       // }
        //     }                              

        ?>



</body>

</html>