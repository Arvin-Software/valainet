<?php
include '../classes/khatral.php';
$res = khatral::khquerypar('SELECT * FROM comp_group');
$count = 0;
$rows = array();
        foreach($res as $pi){
            $ret = khatral::khquery('SELECT * FROM stat WHERE act_group=:group', array(':group'=>$pi['group_nm']));
            $count = 0;
            foreach($ret as $p){
                $array = '';
                $count += 1;
                $rex = khatral::khquery('SELECT * FROM comp_info WHERE comp_ip=:ip AND comp_group=:group', array(
                    ':ip'=>$p['act_ip'],
                    ':group'=>$p['act_group']
                ));
                $assetcode = '';
                foreach($rex as $px){
                    $assetcode = $px['comp_asset_tag'];
                }
                echo $p['act_ip'] . '</br ><br />';
                $rows[] = array('ip'=>$p['act_ip'], 'asset'=>$assetcode);
                // echo(json_encode($rows));
            }
            
        }$bow = $rows;


// $rows += array("count" => $count);
echo (json_encode($bow));
?>