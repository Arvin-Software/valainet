<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valai - Login</title>
    <link rel="icon" href="images/logocontrast.png" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>
    <style>
        .bor-ten{
            border-radius: 10px 10px 10px 10px;
        }
        .bor-twen{
            border-radius: 20px 20px 20px 20px;
        }
        .bg-img-nice{
            background-image: url("images/back1.jpg");
            background-size: cover;
            background-repeat: none;
            filter: blur(5px);
            -webkit-filter: blur(5px);
            
            /* opacity: 0.7; */
        }
        .bg-grad{
            background: #56ccf2; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #56ccf2, #2f80ed); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        .fnt-cur{
            font: 50px 'Oleo Script', Helvetica, sans-serif;
        }
        .bg-text{
            /* background-color: rgba(0,0,0,0.3); */
            height: 100vh;
            /* background-color: rgb(255,255,255); /* Fallback color */
  /* background-color: rgba(255,255,255, 0.4); Black w/opacity/see-through */
  /* transform: translate(-50%, -50%); */
            z-index: 2;
            position: absolute;
            top: 0px;
            /* text-align: center; */
        }
        .fnt-cur{
            font: 90px 'Oleo Script', Helvetica, sans-serif;
            background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: rgba(0,0,0,0.3);
            /* color: rgba(0,0,0,0.3); */
        }
    </style>
</head>
<body class="" style="">
<!-- <h4 class="text-center" style="font-size: 50px; padding-top: 3%;">Welcome to ClerklyBooks</h4> -->
<div class="" style="height: 100vh;"></div>
    <div class="container-fluid bg-text bg-light" style="">
    <?php
    session_start();
    // echo '<h1 class="text-dark"> hello</h1>';
    // echo '<h1>' . $_SESSION['nm'] . '</h1>';
    include '../classes/khatral.php';
    // echo '<h1>' . $_POST['unme'];
    //         echo $_POST['pass'] .  $_POST['submit'] . '</h1>';
    if(isset($_POST['submit'])){
        if($_POST['unme'] == "admin" && $_POST['pass'] == "admin@2020"){
            echo '<h1>' . $_POST['unme'];
            echo $_POST['pass'] . '</h1>';

            $_SESSION['unme'] = "admin";
            $_SESSION['hxid'] = "hxieiwccsd";
            header("Location: ../admin/dash.php");
        }
        $ret = khatral::khquery('SELECT * FROM user WHERE user_nm=:nm AND user_pass=:pass', array(
            ':nm'=>$_POST['unme'],
            ':pass'=>$_POST['pass']
        ));
        $count = 0;
        $id;
        $typ;
        foreach($ret as $p){
            $count += 1;
            $id=$p['user_id'];
            $typ = $p['user_typ'];
        }
        if($count > 0){
            $_SESSION['unme'] = $id ;
            $_SESSION['unme_real'] = $_POST['unme'];
            $_SESSION['hxid'] = "hxieiwccsd";
            if($typ == "0"){
                header("Location: ../users/dash.php");
            }else{
                header("Location: ../tech/ticket.php");
            }
        }
    }
?>
        <div class="row" style="height: 80vh; margin-top: 3%;">
            <div class="col-xl-4"></div>
            <div class="col-xl-4 my-auto">
                                
                    
                        
                        <div class="container bg-white border shadow" style="height: 100%; padding: 8% 8% 8% 8%;">
                        <?php
                                        if(isset($_GET['id'])){
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                            
                                            <strong>Username or password wrong</strong> 
                                        </div>';
                                        }
                                    ?>
                                    <div class=""  >  
                                       <!-- <h2 class="fnt-cur text-center">Valai</h2> -->
                                        <img src="../images/valaiweb.svg" class="mx-auto d-block" style="width: 200px; margin: 1% 1% 1% 1%;">
                                        <h3 class="text-center">Valai</h3>
                                        <!-- <h4 style="margin-bottom: 10%;">Your account details</h4> -->
                                        <!-- <h6>your details</h6> -->
                                    </div>
                                    
                                    <form action="login.php" method="post" autocomplete="off" style="margin-bottom: 2%; padding: 3% 3% 3% 3%;">
                                    <h4 class="" style="padding-top: 3%; margin-bottom: 5%;">Enter admin details</h4>
                                        <div class="form-group" style=" margin-bottom: 5%;">
                                            <!-- <label for="usr">Name:</label> -->
                                            <input type="text" id="unme" name="unme" placeholder="Username" class="form-control bg-light" required="">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 10%;">
                                            <!-- <label for="pwd">Password:</label> -->
                                            <input type="password" placeholder="Password" class="form-control bg-light" id="pass" name="pass" required="">
                                        </div>
                                        
                                        <input type="submit" id="submit" name="submit" value="Let me in" class="btn btn-dark float-right">
                                        
                                    </form>
                                    <div class=""  >  
                                    <!-- <img src="images/khatralplain.svg" class="mx-auto d-block" style="width: 200px; margin: 12% 1% 1% 1%;"> -->
                                    </div>
                        </div>
                        
                                        
               
            </div>
            <div class="col-xl-4"></div>
        </div>  
        <h6 class="text-center fixed-bottom" style="">
            <p class="text-dark">	&copy; 2021 Valai Net. All Rights Reserved.|
		<?php include '../valai.php'; valai::DisplayVerBuild() ?></p>
        </h6>
    </div>
</body>
</html>