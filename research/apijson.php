<?php
include '../classes/khatral.php';
$json = file_get_contents("php://input");
$data = json_decode($json, true);
if($data['apikey'] == '61170bva084bb0vaf3185avaf34d20vae35dcc'){
    if($data['act'] == 'retsamplejson'){
        $ret = khatral::khquery('SELECT * FROM process_moni WHERE moni_ip=:ip AND moni_group=:group', array(
            ':ip'=>$data['ip'],
            ':group'=>$data['group']
        ));
        $count = 0;
        $rows = array();
        foreach($ret as $p){
            ${'file' . $count} = array("mm$count" => $p['moni_nm']);
            $rows += ${'file' . $count};
            
            $count += 1;
        }
        $rows += array("count" => $count);
        echo (json_encode($rows));
    }elseif ($data['act'] == 'retstatx'){
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
                // echo $p['act_ip'] . '</br ><br />';
                $rows[] = array('ip'=>$p['act_ip'], 'asset'=>$assetcode, 'stat'=>$p['act_stat'], 'group'=>$p['act_group'], 'nm'=>$p['act_nm']);
                // echo(json_encode($rows));
            }
            
        }$bow = $rows;


// $rows += array("count" => $count);
echo (json_encode($bow));
    }
}
?>