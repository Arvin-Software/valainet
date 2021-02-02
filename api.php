<?php
//This file is the API File which handle all the valainet work
//Refer documentation for more information on how to extend the functionality of the software.
//Copyright (C) 2020-2021 valainet. All Rights Reserved.
//Developed by Aravindh
//API security level update 081020201652
//Import khatral DB access file
include 'classes/khatral.php';
//Insert to action table
include 'valai.php';
//if the action variable is set then proceed otherwise display a message
$auth = "";
session_start();
//API key authorization
if(isset($_POST['apikey'])){
    if($_POST['apikey'] == "61170bva084bb0vaf3185avaf34d20vae35dcc"){
        $auth = "success";
    }else{
        $auth = "failure";
    }
}
if(isset($_POST['inbox'])){
    if($_POST['inbox'] == "influx"){
        $auth = "success";
    }else{
        $auth = "failure";
    }
}
//Once apikey is authenticated
if($auth == "success"){
    if(isset($_POST['act'])){
        if($_POST['act'] == "insert"){
            
            valai::InsertToAct($_POST['ip'], $_POST['nm'], $_POST['stat']);
            echo $_POST['stat'];
        }else if($_POST['act'] == "ret"){
            $ret = khatral::khquery('SELECT * FROM actions WHERE act_ip=:ip', array(
                ':ip'=>$_POST['ip']
            ));
            foreach($ret as $p){
                echo $p['act_nm'];
            }
        }else if($_POST['act'] == "del"){
            valai::DeleteFromAct($_POST['ip']);
            echo 'success';
        }else if($_POST['act'] == 'insertstat'){
            $ret = khatral::khquery('SELECT * FROM stat WHERE act_ip=:ip AND act_group=:group', array(':ip'=>$_POST['ip'], ':group'=>$_POST['group']));
            $count = 0;
            foreach($ret as $p){
                $count += 1;
            }
            // echo $count;
            if($count > 0){
                valai::UpdateStat($_POST['ip'], $_POST['group'], $_POST['stat']);
            }else{
                valai::InsertToStat($_POST['ip'], $_POST['group'], $_POST['nm'], $_POST['stat']);
            }
            echo $_POST['stat'];
        }else if($_POST['act'] == 'updatestat'){
            valai::UpdateStat($_POST['ip'], $_POST['group'], $_POST['stat']);
        }else if($_POST['act'] == 'updatestatx'){
            if(isset($_SESSION['unme'])){
            valai::UpdateStatusFail();
            echo 'success';
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == 'retstat'){
            if(isset($_SESSION['unme'])){
                $ret = khatral::khquery('SELECT * FROM stat WHERE act_ip=:ip AND act_group=:group', array(
                    ':ip'=>$_POST['ip'],
                    ':group'=>$_POST['group']
                ));
                foreach($ret as $p){
                    // echo 'success112';
                    echo $p['act_stat'];
                }
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "retstatx"){
            if(isset($_SESSION['unme'])){
                $res = khatral::khquerypar('SELECT * FROM comp_group');
                foreach($res as $pi){
                    echo '<h4>Collection : ' . $pi['group_nm'] . '</h4>';
                    $ret = khatral::khquery('SELECT * FROM stat WHERE act_group=:group', array(':group'=>$pi['group_nm']));
                    echo '<div class="table-responsive">';
                    echo '<table class="table"><tr class="bg-dark text-white"><th>Status</th><th style="width: 30%;">IP</th><th style="width: 30%;">Asset Code</th><th style="width: 30%;">Computer Name</th><th>Actions</th></tr>';
                    $count = 0;
                    foreach($ret as $p){
                        $count += 1;
                        $rex = khatral::khquery('SELECT * FROM comp_info WHERE comp_ip=:ip AND comp_group=:group', array(
                            ':ip'=>$p['act_ip'],
                            ':group'=>$p['act_group']
                        ));
                        $assetcode = '';
                        foreach($rex as $px){
                            $assetcode = $px['comp_asset_tag'];
                        }
                        if($p['act_stat'] == "success"){
                            echo '<tr><td class="" style="width: 8px;"><img src="/valainet/images/tick.png" style="width: 22px;"></td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '">' . $p['act_ip'] . '</a></td><td><a href="asset.php?id=' . $p['act_ip'] . '&group=' . $p['act_group'] . '&asset=' . $assetcode . '">' . $assetcode . '</a></td><td>' . $p['act_nm'] . '</td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="alert.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="fas fa-bolt"></i></a></td></tr>';
                        }else{
                            echo '<tr><td class="" style="width: 8px;"><img src="/valainet/images/warning.svg" style="width: 20px;"></td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '">' . $p['act_ip'] . '</a></td><td><a href="asset.php?id=' . $p['act_ip'] . '&group=' . $p['act_group'] . '&asset=' . $assetcode . '">' . $assetcode . '</a></td><td>' . $p['act_nm'] . '</td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="alert.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="fas fa-bolt"></i></a></td></tr>';
                        }
                    }
                    echo '</table>';
                    echo '</div>';
                }
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "retstatxuser"){
            if(isset($_SESSION['unme'])){
                $res = khatral::khquery('SELECT * FROM comp_group WHERE group_nm=:nm', array(':nm'=>$_POST['nm']));
                foreach($res as $pi){
                    echo '<h4>Collection : ' . $pi['group_nm'] . '</h4>';
                    $ret = khatral::khquery('SELECT * FROM stat WHERE act_group=:group', array(':group'=>$pi['group_nm']));
                    echo '<div class="table-responsive">';
                    echo '<table class="table"><tr class="bg-dark text-white"><th>Status</th><th style="width: 30%;">IP</th><th style="width: 30%;">Asset Code</th><th style="width: 30%;">Computer Name</th><th>Actions</th></tr>';
                    $count = 0;
                    foreach($ret as $p){
                        $count += 1;
                        $rex = khatral::khquery('SELECT * FROM comp_info WHERE comp_ip=:ip AND comp_group=:group', array(
                            ':ip'=>$p['act_ip'],
                            ':group'=>$p['act_group']
                        ));
                        $assetcode = '';
                        foreach($rex as $px){
                            $assetcode = $px['comp_asset_tag'];
                        }
                        if($p['act_stat'] == "success"){
                            echo '<tr><td class="" style="width: 8px;"><img src="/valainet/images/tick.png" style="width: 22px;"></td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '">' . $p['act_ip'] . '</a></td><td>' . $assetcode . '</td><td>' . $p['act_nm'] . '</td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="far fa-eye"></i></a></td></tr>';
                        }else{
                            echo '<tr><td class="" style="width: 8px;"><img src="/valainet/images/warning.svg" style="width: 20px;"></td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '">' . $p['act_ip'] . '</a></td><td>' . $assetcode . '</td><td>' . $p['act_nm'] . '</td><td><a class="" href="basicinfo.php?ip=' . $p['act_ip'] . '&group=' . $p['act_group'] . '"><i class="far fa-eye"></i></a></td></tr>';
                        }
                    }
                    echo '</table>';
                    echo '</div>';
                }
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "insertinfo"){
            $ret = khatral::khquery('SELECT * FROM comp_info WHERE comp_ip=:ip AND comp_group=:group', array(
                ':ip'=>$_POST['ip'],
                ':group'=>$_POST['group']
            ));
            $count = 0;
            foreach($ret as $p){
                $count += 1;
            }
            if($count > 0){
                valai::UpdateInfo($_POST['ip'], $_POST['group'], $_POST['asset'], $_POST['nm'], $_POST['os'], $_POST['proc'], $_POST['ram'], $_POST['dis']);
                echo 'success';
            }else{
                valai::InsertInfo($_POST['ip'], $_POST['group'], $_POST['asset'], $_POST['nm'], $_POST['os'], $_POST['proc'], $_POST['ram'], $_POST['dis']);
                echo 'success1';
            }
        }else if($_POST['act'] == "sayhello"){
            
            echo 'hello';
        }else if($_POST['act'] == "addgroup"){
            valai::AddGroup($_POST['nm'], $_POST['descr']);
        }else if($_POST['act'] == "rettot"){
            if(isset($_SESSION['unme'])){
            $ret = khatral::khquerypar('SELECT * FROM stat');
            $active = 0;
            $inactive = 0;
            $tot = 0;
            foreach($ret as $p){
                if($p['act_stat'] == "success"){
                    $active += 1;
                }else{
                    $inactive += 1;
                }
                $tot = $active + $inactive;
            }
            $responseVar = array(
                'active'=>$active,
                'inactive'=>$inactive
                );
            echo (json_encode($responseVar));
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "deletestorage"){
            valai::DeleteStorage($_POST['ip'], $_POST['group']);
        }
        else if($_POST['act'] == "insertstorage"){
            // $ret = khatral::khquery('SELECT * FROM storag WHERE ip=:ip AND group_nm=:group', array(
            //     ':ip'=>$_POST['ip'],
            //     ':group'=>$_POST['group']
            // ));
            // $count = 0;
            // foreach($ret as $p){
            //     $count += 1;
            // }
            // if($count > 0){
                
                valai::InsertStorage($_POST['ip'], $_POST['group'], $_POST['nm'], $_POST['tot'], $_POST['avl']);
            // }else{
            //     InsertStorage($_POST['ip'], $_POST['group'], $_POST['nm'], $_POST['tot'], $_POST['avl']);
            // }
        }else if($_POST['act'] == "insertos"){
            $ret = khatral::khquery('SELECT * FROM os WHERE os_ip=:ip AND os_group=:group', array(
                ':ip'=>$_POST['ip'],
                ':group'=>$_POST['group']
            ));
            $count = 0;
            foreach($ret as $p){
                $count += 1;
            }
            if($count > 0){
                valai::DeleteOs($_POST['ip'], $_POST['group']);
                valai::AddOs($_POST['bit'], $_POST['serial'], $_POST['installed'], $_POST['uptime'], $_POST['booted'], $_POST['extip'], $_POST['ip'], $_POST['group']);
            }else{
                valai::AddOs($_POST['bit'], $_POST['serial'], $_POST['installed'], $_POST['uptime'], $_POST['booted'], $_POST['extip'], $_POST['ip'], $_POST['group']);
            }
        }else if($_POST['act'] == "retjson"){
            $ret = khatral::khquery('SELECT * FROM process_moni WHERE moni_ip=:ip AND moni_group=:group', array(
                ':ip'=>$_POST['ip'],
                ':group'=>$_POST['group']
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
        }else if($_POST['act'] == "retjsonip"){
            $ret = khatral::khquery('SELECT * FROM ip_addr_moni WHERE aip_ip=:ip AND aip_group=:group', array(
                ':ip'=>$_POST['ip'],
                ':group'=>$_POST['group']
            ));
            $count = 0;
            $rows = array();
            foreach($ret as $p){
                ${'file' . $count} = array("mm$count" => $p['aip_nm']);
                $rows += ${'file' . $count};
                $count += 1;
            }
            $rows += array("count" => $count);
            echo (json_encode($rows));
        }else if($_POST['act'] == "updateprocstat"){
            valai::UpdateProcessMoni($_POST['nm'], $_POST['stat'], $_POST['ip'], $_POST['group']);
            $ret = khatral::khquery('SELECT * FROM alerts WHERE alert_nm=:nm AND alert_ip=:ip AND alert_group=:group', array(
            ':nm'=>$_POST['nm'],
            ':ip'=>$_POST['ip'],
            ':group'=>$_POST['group']
            ));
            $count = 0;
            $failure = 0;
            $id = '';
            foreach($ret as $p){
                $count += 1;
                $failure = $p['alert_stat'];
                $id = $p['alert_id'];
            }
            if($count > 0){
                if($failure==$_POST['stat']){
                    // echo 'failure';
                    // valai::UpdateAlerts($_POST['nm'], $_POST['mess'], $_POST['ip'], $_POST['group']);
                }else{
                    if($_POST['stat'] != 'success'){
                        valai::InsertAlerts($_POST['nm'], "failure", $_POST['ip'], $_POST['group'], $_POST['stat']);
                        valai::insertDownRec($_POST['nm'], "failure", $_POST['ip'], $_POST['group']);
                    }else{
                        valai::DeleteAlerts($id);
                    }
                    // echo 'success';
                }
            }else{
                if($_POST['stat'] != 'success'){
                valai::InsertAlerts($_POST['nm'], "failure", $_POST['ip'], $_POST['group'], $_POST['stat']);    
                valai::insertDownRec($_POST['nm'], "failure", $_POST['ip'], $_POST['group']);
                }
            }
        }else if($_POST['act'] == "updateipstat"){
            valai::UpdateIndivIpStat($_POST['nm'], $_POST['stat'], $_POST['ip'], $_POST['group']);
        }else if($_POST['act'] == "retipstatx"){
            if(isset($_SESSION['unme'])){
                $res = khatral::khquery('SELECT * FROM ip_addr_moni WHERE aip_ip=:ip AND aip_group=:group', array(
                    ':ip'=>$_POST['ip'],
                    ':group'=>$_POST['group']
                ));
                echo '<div class="table-responsive">';
                echo '<table class="table"><tr class=""><th style="width: 2px;">IP Address</th><th style="width: 30px;">Status</th></tr>';
                $count = 0;
                foreach($res as $p){
                    $count += 1;
                    if($p['aip_stat'] == "success"){
                        echo '<tr><td>' . $p['aip_nm'] . '</td><td style="width: 5px;"><img src="/valainet/images/tick.png" style="width: 22px;"></td></tr>';
                    }else{
                        echo '<tr><td>' . $p['aip_nm'] . '</td><td style="width: 5px;"><img src="/valainet/images/warning.svg" style="width: 20px;"></td></tr>';
                    }
                }
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "updateallip"){
            if(isset($_SESSION['unme'])){
                valai::UpdateAllIp();
                echo 'success';
            }else{
                valai::DisplayError();
            }
        }
        else if($_POST['act'] == "retprocstatx"){
            if(isset($_SESSION['unme'])){
                $res = khatral::khquery('SELECT * FROM process_moni WHERE moni_ip=:ip AND moni_group=:group', array(
                    ':ip'=>$_POST['ip'],
                    ':group'=>$_POST['group']
                ));
                echo '<div class="table-responsive">';
                echo '<table class="table"><tr class=""><th style="width: 2px;">Process Name</th><th style="width: 30px;">Status</th></tr>';
                $count = 0;
                foreach($res as $p){
                    $count += 1;
                    if($p['moni_stat'] == "success"){
                        echo '<tr><td>' . $p['moni_nm'] . '</td><td style="width: 5px;"><img src="/valainet/images/tick.png" style="width: 22px;"></td></tr>';
                    }else{
                        echo '<tr><td>' . $p['moni_nm'] . '</td><td style="width: 5px;"><img src="/valainet/images/warning.svg" style="width: 20px;"></td></tr>';
                    }
                }
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "updateallproc"){
            if(isset($_SESSION['unme'])){
                valai::UpdateAllProcessMoni();
                echo 'success';
            }else{
                valai::DisplayError();
            }
        }else if($_POST['act'] == "updateprocess"){
            valai::UpdateProcess($_POST['id'], $_POST['nm'], $_POST['mem'], $_POST['ip'], $_POST['group']);
            echo 'success';
        }else if($_POST['act'] == "deleteprocess"){
            valai::DeleteProcess($_POST['ip'], $_POST['group']);
            echo 'success1';
        }else if($_POST['act'] == "retsamplejson"){
            $ret = khatral::khquery('SELECT * FROM process_moni WHERE moni_ip=:ip AND moni_group=:group', array(
                ':ip'=>$_POST['ip'],
                ':group'=>$_POST['group']
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
        }
        else{
            echo '<img src="images/valaiweb.svg" style="width: 32px;"><h3>Valai API</h3><br />This is a api file and it will not execute on its own. <br />Please refer documentation for more information on how to access it and work with it. <br />Copyright &copy; 2020 Valainet. All Rights Reserved.';
        }
    } else if(isset($_GET['act'])){
        if($_GET['act'] == "sayhello"){
            echo 'hello world';
        }
    }

    else{
        echo 'failure';
        // echo '<img src="images/valaiweb.svg" style="width: 32px;"><h3>Valai API</h3><br />This is a api file and it will not execute on its own. <br />Please refer documentation for more information on how to access it and work with it. <br />Copyright &copy; 2020 Valainet. All Rights Reserved.';
    }
}else{
    valai::DisplayError();
}
// echo 'success';
