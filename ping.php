<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-lg-1 fade-in border-right text-black bg-primary" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'announce';
   include 'includenav.php';
   ?> 
</div>

<div class="col-lg-11 bg-light fade-in" id="" style="height: 100vh; padding: 1% 2% 2% 2%;">

<div class="spinner-border text-primary"></div>

<?php
$host="192.168.1.3";
$output=shell_exec('ping -n 1 '.$host);

echo "<pre>$output</pre>"; //for viewing the ping result, if not need it just remove it

if (strpos($output, 'out') !== false) {
    echo "Dead";
}
    elseif(strpos($output, 'expired') !== false)
{
    echo "Network Error";
}
    elseif(strpos($output, 'data') !== false)
{
    echo "Alive";
}
else
{
    echo "Unknown Error";
}