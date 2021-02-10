<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valai - Login</title>
    <link rel="icon" href="/valainet/images/valaiweb.svg" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
        .fnt-cur{
            font: 50px 'Oleo Script', Helvetica, sans-serif;
        }
        .bg-text{
            height: 100vh;
            z-index: 2;
            position: absolute;
            top: 0px;
        }
        .fnt-cur{
            font: 90px 'Oleo Script', Helvetica, sans-serif;
            background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="bg-light" style="">
    <div class="" style="height: 100vh;"></div>
        <div class="container-fluid bg-text bg-light" style="">
            <div class="row" style="height: 80vh; margin-top: 3%;">
                <div class="col-xl-4"></div>
                <div class="col-xl-4 my-auto">      
                    <div class="container bg-white border shadow bor-ten" style="height: 100%; padding: 8% 8% 8% 8%;">
                        
                        <div class="">  
                            <img src="../images/valaiweb.svg" class="mx-auto d-block" style="width: 200px; margin: 1% 1% 1% 1%;">
                            <h3 class="text-center">Valai</h3>
                        </div>
                        
                        <form action="login.php" method="post" autocomplete="off" style="margin-bottom: 2%; padding: 3% 3% 3% 3%;">
                            <h4 class="" style="padding-top: 3%; margin-bottom: 5%;">Enter details</h4>
                            <?php
                                session_start();
                                include '../classes/khatral.php';
                                if(isset($_POST['submit'])){
                                    if($_POST['unme'] == "admin" && $_POST['pass'] == "admin@2021"){
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
                                    }else{
                                        echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                                <strong>Username or password wrong</strong> 
                                                </div>';
                                    }
                                }
                            ?>
                            <div class="form-group" style=" margin-bottom: 5%;">
                                <input type="text" id="unme" name="unme" placeholder="Username" class="form-control bg-light" required="">
                            </div>
                            <div class="form-group" style="margin-bottom: 10%;">
                                <input type="password" placeholder="Password" class="form-control bg-light" id="pass" name="pass" required="">
                            </div>
                            <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Login&nbsp;&nbsp;<i class="fas fa-sign-in-alt"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4"></div>
            </div>  
            <h6 class="text-center fixed-bottom" style="">
                <p class="text-dark">	&copy; 2021 Valai Net. All Rights Reserved.|
                <?php include '../valai.php'; valai::DisplayVerBuild(); ?></p>
            </h6>
        </div>
    </div>
</body>
</html>