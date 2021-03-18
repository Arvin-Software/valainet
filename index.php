<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/valaiweb.svg" />
    <title>Valai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/softview.css">
    <script src="js/jquery.min.js"></script>
    <style>
        .image {
            -webkit-animation:spin 4s linear infinite;
            -moz-animation:spin 4s linear infinite;
            animation:spin 4s linear infinite;
        }
        @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
        @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
        @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
    </style>
</head>
<body class="bg-white">
    <div class="text-center" style="margin-top: 10%;">
        <div id="inc">
        <img class="d-block mx-auto" src="images/valaiweb.svg"  style="width: 200px; margin-bottom: 3%;">
        <div class="spinner-border text-dark"></div>
        </div>
        <div id="inc1">
        <img class="d-block mx-auto" src="images/valaiweb.svg" style="width: 200px; margin-bottom: 0%;"><br><h1 class="text-center">Welcome to Valai Net</h1>
        Click <a href="loginhandle/login.php">here</a> to login
        </div>
    </div>
    <?php
        include 'classes/khatral.php';
        try{
            khatral::khquerypar('SELECT * FROM stat');
        }catch(exception $ex){
            header('Location: installation');
        }
    ?>
    <script>
        $('#inc1').hide();
        $('#inc').show();
        setInterval(function () {
        $.post("api.php",
            {
                act:"sayhello",
                ip:"192.168.1.5",
                nm:"stat",
                stat:"failure",
                inbox:"influx"
                },
                function(data, status){
                // alert(data);
                if(data == 'hello'){
                    $('#inc').hide();
                    $('#inc1').show();
                }
                });
            }, 1000);
    </script>
</body>