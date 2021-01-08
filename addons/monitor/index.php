<?php
echo 'welcome to monitor';
include '../dbConnector.php';
khatral::khdisplay();
try{
    khatral::khquerypar('SELECT * FROM monitr');
}catch(exception $ex){
    echo '<br />Error : hello';
}
?>