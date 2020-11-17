<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-1 fade-in text-black bg-dark" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'about';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-11 fade-in" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff; overflow:auto;">
<div class=" container">
<img src="images/valaiweb.svg" alt="Valai Logo" style="width: 128px;">
<h3>Valai - v1.0</h3>
<p>
    Valai is a IT management software that features server monitoring capabalities, <br />Software monitoring capabalities, Inventory Management, Maintenance Jobwork handling, etc
</p>
<h5>Components of Valai</h5>
<table class="table table-bordered">
    <tr>
        <th>Component</th>
        <th>Version</th>
    </tr>
    <tr>
        <td>Bootstrap</td>
        <td>v4.0</td>
    </tr>
    <tr>
        <td>Valai Server</td>
        <td><?php valai::DisplayVerBuild() ?></td>
    </tr>
</table>
<hr>
<h3>PHP Configuration</h3>
<iframe src="phpinfo.php" frameborder="0" style="width: 100%; height: 40vh;"></iframe>
<hr>
<h3>License</h3>
<iframe src="LICENSE" frameborder="0" style="width: 100%; height: 40vh;"></iframe>
<hr>
<h6 class="text-center">Valai is a Open Source software which is licensed under GNU GPL v3 License</h6>
<h6 class="text-center">&copy; 2020 ValaiNet. All Rights Reserved.</h6>
</div>