<?php
$inst = "installation";
include '../header.php';
?>
<body class="bg-light" style="background-color: #FFFFFF;">
<div class="container-fluid" style="margin-top: 10%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border text-center bor-ten" style="padding: 2%">
        <img src="../images/logonew1.svg" alt="valai" style="width: 128px;" class="mx-auto d-block">
        <br>
        <h4>Valai - Admin Creation</h4>
<?php
// include '../classes/khatral.php';
// include '../valai.php';
if(isset($_POST['submit'])){
    $nm = $_POST['unme'];
    $pass = $_POST['pass'];
    $role = "2";
    $ret = valai::InsertUsers($nm, $pass, $role);
    if($ret == '1'){
        echo 'admin account already created<br />';
        echo '<a href="complete.php" class="float-right btn btn-dark">Continue</a>';
    }else{
        header("Location: complete.php");
    }
    
}
?>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>