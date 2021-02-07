<?php
include '../classes/khatral.php';
include '../valai.php';
$json = file_get_contents("php://input");
$data = json_decode($json, true);
if($data['apikey'] == 'influx'){
    if($data['act'] == 'insertSoft'){
        $code = $data['ascode'];
        $nm = $data['softNm'];
        $des = $data['softDes'];
        $loc = $data['softLoc'];
        $purdt = $data['softPurDt'];
        $expdt = $data['softWarDt'];
        $rendt = $data['softRenDt'];
        valai::insertSoftware($nm, $des, $purdt, $expdt, $rendt, $code, $loc);
        echo 'success';
    }else if($data['act'] == "retSoft"){
        $ret = khatral::khquerypar('SELECT * FROM pur_soft');
        $retVal = array();
        foreach($ret as $p){
            $retVal[] = array('id'=>$p['soft_id'], 'nm'=>$p['soft_nm'], 'des'=>$p['soft_des'], 'purdt'=>$p['soft_pur_date'], 'expdt'=>$p['soft_exp_date'], 'rendt'=>$p['soft_ren_date'], 'assetcode'=>$p['asset_code'], 'loc'=>$p['loc']);
        }$expo = $retVal;
        echo(json_encode($expo));
    }else if($data['act'] == "delSoft"){
        $ret = khatral::khquery('DELETE FROM pur_soft WHERE soft_id=:id', array(
            ':id'=>$data['softid']
        ));
        echo 'success';
    }else if($data['act'] == 'insertequip'){
        $code = $data['ascode'];
        $coll = $data['equipcollec'];
        $nm = $data['equipNm'];
        $des = $data['equipDes'];
        $loc = $data['equipLoc'];
        $purdt = $data['equipPurDt'];
        $expdt = $data['equipWarDt'];
        $rendt = $data['equipRenDt'];
        valai::insertNONIT($nm, $coll, $des, $purdt, $expdt, $rendt, $code, $loc);
        echo 'success';
    }else if($data['act'] == 'retequip'){
        $ret = khatral::khquery('SELECT * FROM nonit WHERE nonit_coll=:coll', array(
            ':coll'=>$data['collNm']
        ));
        $retVal = array();
        foreach($ret as $p){
            $retVal[] = array('id'=>$p['nonit_id'], 'coll'=>$p['nonit_coll'], 'nm'=>$p['nonit_nm'], 'des'=>$p['nonit_des'], 'purdt'=>$p['nonit_pur_date'], 'expdt'=>$p['nonit_exp_date'], 'rendt'=>$p['nonit_ren_date'], 'assetcode'=>$p['asset_code'], 'loc'=>$p['loc']);
        }$expo = $retVal;
        echo(json_encode($expo));
    }else if($data['act'] == 'deleteequip'){
        $ret = khatral::khquery('DELETE FROM nonit WHERE nonit_id=:id', array(
            ':id'=>$data['equipid']
        ));
        echo 'success';
    }else if($data['act'] == 'retissues'){
        $ret = khatral::khquery('SELECT down_time, down_id, down_name, down_mess, down_ip, down_group, COUNT(down_time) AS dupe_cnt FROM down_record WHERE down_ip=:ip AND down_group=:group
                GROUP BY down_time
                HAVING   COUNT(down_time) >= 1
                LIMIT 5 
                ', array(
                    ':ip'=>$data['ip'],
                    ':group'=>$data['group']
                ));
        $retval = array();
        foreach($ret as $p){
            $retval[] = array('date'=>$p['down_time'], 'count'=>$p['dupe_cnt'], 'name'=>$p['down_name'], 'mess'=>$p['down_mess']);
        }$expo = $retval;
        echo(json_encode($expo));
    }
    else{
        echo 'failure';
    }
}