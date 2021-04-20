<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Valai Net - Login</title>
        <link rel="icon" href="/valainet/images/logonew1.svg" />
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
            textarea:focus, 
            textarea.form-control:focus, 
            input.form-control:focus, 
            input[type=text]:focus, 
            input[type=password]:focus, 
            input[type=email]:focus, 
            input[type=number]:focus, 
            .custom-select:focus,
            .btn:focus,
            [type=text].form-control:focus, 
            [type=password].form-control:focus, 
            [type=email].form-control:focus, 
            [type=tel].form-control:focus, 
            [contenteditable].form-control:focus {
            box-shadow: inset 0 -1px 0 #fff;
            background-color: #f6f6f6;
            }
            .form-control:hover{
                background-color: #f6f6f6;
            }
            .btn:hover{
                background-color: #F2F2F2;
            }
        </style>
    </head>
    <body class="bg-light" style="">
        <div class="" style="height: 100vh;"></div>
            <div class="container-fluid bg-text bg-light" style="">
                <div class="row" style="height: 80vh; margin-top: 3%;">
                    <div class="col-xl-4"></div>
                    <div class="col-xl-4 my-auto">      
                        <div class="container bg-white shadow bor-ten" style="height: 100%; padding: 8% 0% 5% 0%;">
                            <div class="">  
                                <img src="../images/logonew1.svg" class="mx-auto d-block" style="width: 200px; margin: 1% 1% 1% 1%;">
                                <h3 class="text-center">Valai Net</h3>
                            </div>
                            
                            <form action="login.php" method="post" autocomplete="off" style="margin-bottom: 2%; padding-bottom: 5%;">
                                <!-- <h4 class="text-center" style="padding-top: 3%; margin-bottom: 5%;">Enter details</h4> -->
                                <?php
                                    session_start();
                                    include '../classes/khatral.php';
                                    if(isset($_POST['submit'])){
                                        $ret = khatral::khquery('SELECT * FROM user WHERE user_nm=:nm', array(
                                            ':nm'=>$_POST['unme']
                                        ));
                                        $count = 0;
                                        $id;
                                        $typ;
                                        $password_hashed = '';
                                        foreach($ret as $p){
                                            $count += 1;
                                            $id=$p['user_id'];
                                            $typ = $p['user_typ'];
                                            $password_hashed = $p['user_pass'];
                                        }
                                        if($count > 0){
                                            if(password_verify($_POST['pass'], $password_hashed) == TRUE){
                                                $_SESSION['unme'] = $id ;
                                                $_SESSION['unme_real'] = $_POST['unme'];
                                                $_SESSION['hxid'] = "hxieiwccsd";
                                                if($typ == "0"){
                                                    header("Location: ../users/dash.php");
                                                }else if($typ == "2"){
                                                    $_SESSION['unme'] = "admin";
                                                    $_SESSION['hxid'] = "hxieiwccsd";
                                                    header("Location: ../admin/dash.php");
                                                }else{
                                                    header("Location: ../tech/ticket.php");
                                                }
                                            }
                                        }else{
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                                    <strong>Username or password wrong</strong> 
                                                    </div>';
                                        }
                                    }
                                ?>
                                <div style=" padding: 10% 15% 0% 15%;">
                                <div class="form-group row border">
                                    <label for="unm" class="col-sm-1 col-form-label"><i class="far fa-user-circle"></i></label>
                                    <div class="col-sm-11" style="padding-right: 0px; border-radius: 0px 0px 0px 0px;">
                                        <input type="text" name="unme" id="unme" style="border: none;" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row border">
                                    <label for="pass" class="col-sm-1 col-form-label"><i class="fas fa-key"></i></label>
                                    <div class="col-sm-11" style="padding-right: 0px; border-radius: 0px 0px 0px 0px;">
                                        <input type="password" name="pass" id="pass" style="border: none;" class="form-control" required="">
                                    </div>
                                </div>
                                </div>
                                <div style="margin-right: 12%; margin-top: 5%;">
                                    <button type="submit" id="submit" name="submit"  class="btn text-dark float-right"><i class="fas fa-unlock"></i>&nbsp;&nbsp;<b>Login</b></button><a href="../index.php" class="btn float-right border-right">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4"></div>
                </div>  
                <h6 class="text-center fixed-bottom" style="">
                    <p class="text-dark">&copy; 2020-2021 Valai Net. All Rights Reserved.|
                    <?php include '../valai.php'; valai::DisplayVerBuild(); ?></p>
                </h6>
            </div>
        </div>
    </body>
</html>