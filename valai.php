<?php
class valai{
    public static function InsertToAct($ip, $nm, $stat){
        khatral::khquery('INSERT INTO actions VALUES(NULL, :ip, :nm, :stat)', array(
            ':ip'=>$ip,
            ':nm'=>$nm,
            ':stat'=>$stat
        ));
    }
    //Delete from action table
    public static function DeleteFromAct($ip){
        khatral::khquery('DELETE FROM actions WHERE act_ip=:ip', array(
            ':ip'=>$ip
        ));
    }
    //Update action table
    public static function UpdateAct($ip, $stat){
        khatral::khquery('UPDATE actions SET act_stat=:stat WHERE act_ip=:ip', array(
            ':stat'=>$stat,
            ':ip'=>$ip
        ));
    }
    //Insert to status table
    public static function InsertToStat($ip, $group, $nm, $stat){
        khatral::khquery('INSERT INTO stat VALUES(NULL, :ip, :group, :nm, :stat)', array(
            ':ip'=>$ip,
            ':group'=>$group,
            ':nm'=>$nm,
            ':stat'=>$stat
        ));
    }
    //delete from status table
    public static function DeleteFromStat($ip, $group){
        khatral::khquery('DELETE FROM stat WHERE act_ip=:ip AND act_group=:group', array(
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //update status table
    public static function UpdateStat($ip, $group, $stat){
        khatral::khquery('UPDATE stat SET act_stat=:stat WHERE act_ip=:ip AND act_group=:group', array(
            ':stat'=>$stat,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //update status table to mark all the status to failure
    public static function UpdateStatusFail(){
        khatral::khquery('UPDATE stat SET act_stat=:stat', array(
            ':stat'=>"Failure",
        ));
    }
    //insert information to table
    public static function InsertInfo($ip, $group, $asset, $nm, $os, $proc, $ram, $dis){
        khatral::khquery('INSERT INTO comp_info VALUES(NULL, :ip, :group, :asset, :nm, :os, :proce, :ram, :dis)', array(
            ':ip'=>$ip,
            ':group'=>$group,
            ':asset'=>$asset,
            ':nm'=>$nm,
            ':os'=>$os,
            ':proce'=>$proc,
            ':ram'=>$ram,
            ':dis'=>$dis
        ));
    }
    //update the info table about the computer information
    public static function UpdateInfo($ip, $group, $asset, $nm, $os, $proc, $ram, $dis){
        khatral::khquery('UPDATE comp_info SET comp_asset_tag=:asset, comp_nm=:nm, comp_os=:os, comp_processor=:proce, comp_ram_tot=:ram, display=:dis WHERE comp_ip=:ip AND comp_group=:group', array(
            ':asset'=>$asset,
            ':nm'=>$nm,
            ':os'=>$os,
            ':proce'=>$proc,
            ':ram'=>$ram,
            ':dis'=>$dis,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Insert to storage table
    public static function InsertStorage($ip, $group, $nm, $tot, $avl){
        khatral::khquery('INSERT INTO storag VALUES(NULL, :nm, :tot, :avl, :ip, :group)', array(
            ':nm'=>$nm,
            ':tot'=>$tot,
            ':avl'=>$avl,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //delete from storage table
    public static function DeleteStorage($ip, $group){
        khatral::khquery('DELETE FROM storag WHERE ip=:ip AND group_nm=:group', array(
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Add os information to table
    public static function AddOs($bit, $serial, $installed, $uptime, $booted, $extip, $ip, $group){
        khatral::khquery('INSERT INTO os VALUES(NULL, :bits, :serials, :install, :uptime, :booted, :extip, :ip, :group)', array(
            ':bits'=>$bit,
            ':serials'=>$serial,
            ':install'=>$installed,
            ':uptime'=>$uptime,
            ':booted'=>$booted,
            ':extip'=>$extip,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //delete from os information table
    public static function DeleteOs($ip, $group){
        khatral::khquery('DELETE FROM os WHERE os_ip=:ip AND os_group=:group', array(
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //add group information to table (collection)
    public static function AddGroup($groupnm, $groupdescr){
        khatral::khquery('INSERT INTO comp_group VALUES(NULL, :groupnm, :groupdescr)', array(
            ':groupnm'=>$groupnm,
            ':groupdescr'=>$groupdescr
        ));
    }
    //update process_moni
    public static function UpdateProcessMoni($nm, $stat, $ip, $group){
        khatral::khquery('UPDATE process_moni SET moni_stat=:stat WHERE moni_nm=:nm AND moni_ip=:ip AND moni_group=:group', array(
            ':nm'=>$nm,
            ':stat'=>$stat,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Update status of ip address
    public static function UpdateIndivIpStat($nm, $stat, $ip, $group){
        khatral::khquery('UPDATE ip_addr_moni SET aip_stat=:stat WHERE aip_nm=:nm AND aip_ip=:ip AND aip_group=:group', array(
            ':nm'=>$nm,
            ':stat'=>$stat,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Update all process status
    public static function UpdateAllProcessMoni(){
        khatral::khquery('UPDATE process_moni SET moni_stat=:stat', array(
            ':stat'=>"failure"
        ));
    }
    //Update all ip address monitor status
    public static function UpdateAllIp(){
        khatral::khquery('UPDATE ip_addr_moni SET aip_stat=:stat', array(
            ':stat'=>"failure"
        ));
    }
    //Delete Alerts
    public static function DeleteAlert($id){
        khatral::khquery('DELETE FROM process_moni WHERE moni_id=:id', array(
            ':id'=>$id
        ));
    }
    //Delete ip address to monitor
    public static function DeleteIpMoni($id){
        khatral::Khquery('DELETE FROM ip_addr_moni WHERE aip_id=:id', array(
            ':id'=>$id
        ));
    }
    //Insert alerts
    public static function InsertAlerts($nm, $mess, $ip, $group, $statx){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('dmYhis', time());
        $date1 = date('d/m/Y h:i:s', time());
        khatral::khquery('INSERT INTO alerts VALUES(NULL, :nm, :mess, :ip, :group, :timesx, :stat)', array(
            ':nm'=>$nm,
            ':mess'=>$mess,
            ':ip'=>$ip,
            ':group'=>$group,
            ':timesx'=>$date1,
            ':stat'=>$statx
        ));
    }
    //Update alerts
    public static function UpdateAlerts($nm, $message, $ip, $group){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('dmYhis', time());
        $date1 = date('d/m/Y h:i:s', time());
        khatral::khquery('UPDATE alerts SET alert_mess=:mess, alert_time=:timesx WHERE alert_nm=:nm AND alert_ip=:ip AND alert_group=:group', array(
            ':mess'=>$message,
            ':timesx'=>$date1,
            ':nm'=>$nm,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Delete Alerts
    public static function DeleteAlerts($id){
        khatral::khquery('DELETE FROM alerts WHERE alert_id=:id', array(
            ':id'=>$id
        ));
    }
    //Delete Processes running
    public static function DeleteProcess($ip, $group){
        khatral::khquery('DELETE FROM process_run WHERE pro_ip=:ip AND pro_group=:group', array(
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Update process
    public static function UpdateProcess($id, $nm, $mem, $ip, $group){
        khatral::khquery('INSERT INTO process_run VALUES(:nm, :id, :mem, :ip, :group)', array(
            ':nm'=>$nm,
            ':id'=>$id,
            ':mem'=>$mem,
            ':ip'=>$ip,
            ':group'=>$group
        ));
    }
    //Insert users
    public static function InsertUsers($nm, $pass, $role){
        $ret = khatral::khquery('SELECT COUNT(user_id) AS totalusrs FROM user WHERE user_nm=:unm', array(
            ':unm'=>$nm
        ));
        foreach($ret as $p){
            if($p['totalusrs'] >= 1){
                return '1';
            }else{
                $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
                khatral::khquery('INSERT INTO user VALUES(NULL, :nm, :pass, :typ)', array(
                    ':nm'=>$nm,
                    ':pass'=>$pass_hashed,
                    ':typ'=>$role
                ));
                return '0';
            }
        }
    }
    //Insert Module to user
    public static function InsertModl($nm, $user){
        khatral::khquery('INSERT INTO modl VALUES(NULL, :nm, :user)', array(
            ':nm'=>$nm,
            ':user'=>$user
        ));
    }
    //Delete module from user
    public static function DeleteModl($id){
        khatral::khquery('DELETE FROM modl WHERE modl_id=:id', array(
            ':id'=>$id
        ));
    }
    //Display error for api
    public static function DisplayError(){
        echo 'You are not authorized to issue this request and your ip address will be reported';
        echo '<br />Valai API security version 11022021065030pm build 2021';
        echo '<br />Copyright &copy; 2021 Valai API. All Rights Reserved.';
    }
    //Update ticket information
    public static function UpdateTickComplete($id){
        $ret = khatral::khquery('SELECT * FROM ticket WHERE ticket_ri_id=:id', array(
            ':id'=>$id
        ));
        foreach($ret as $p){
            khatral::khquery('INSERT INTO ticket_finish VALUES(NULL, :tick_id, :mess, :ip, :group, :wherenm, :unm)', array(
                ':tick_id'=>$p['ticket_ri_id'],
                ':mess'=>$p['ticket_mess'],
                ':ip'=>$p['ticket_ip'],
                ':group'=>$p['ticket_group'],
                ':wherenm'=>$p['ticket_wherenm'],
                ':unm'=>$p['ticket_unm']
            ));
        }
        khatral::khquery('DELETE FROM ticket WHERE ticket_ri_id=:id', array(
            ':id'=>$id
        ));
        
    }
    //Insert software
    public static function insertSoftware($nm, $des, $purdt, $expdt, $rendt, $code, $loc){
        khatral::khquery('INSERT INTO pur_soft VALUES(NULL, :nm,
        :descr, :purdt, :expdt, :rendt, :code, :loc)', array(
            ':nm'=>$nm,
            ':descr'=>$des,
            ':purdt'=>$purdt,
            ':expdt'=>$expdt,
            ':rendt'=>$rendt,
            ':code'=>$code,
            ':loc'=>$loc
        ));
    }
    //Insert non it hardware information
    public static function insertNONIT($nm, $coll, $des, $purdt, $expdt, $rendt, $code, $loc){
        khatral::khquery('INSERT INTO nonit VALUES(NULL, :coll, :nm,
        :descr, :purdt, :expdt, :rendt, :code, :loc)', array(
            ':coll'=>$coll,
            ':nm'=>$nm,
            ':descr'=>$des,
            ':purdt'=>$purdt,
            ':expdt'=>$expdt,
            ':rendt'=>$rendt,
            ':code'=>$code,
            ':loc'=>$loc
        ));
    }
    public static function insertDownRec($nm, $mess, $ip, $group){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('dmYhis', time());
        $date1 = date('d/m/Y', time());
        $date2 = date('d/m/Y h:i:s', time());
        khatral::khquery('INSERT INTO down_record VALUES(NULL, :nm, :mess, :ip, :group, :tim)', array(
            ':nm'=>$nm,
            ':mess'=>$date2,
            ':ip'=>$ip,
            ':group'=>$group,
            ':tim'=>$date1
        ));
        echo 'inserted';
    }
    public static function insertApiKey($nm, $descr){
        $key = implode('va', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
        khatral::khquery('INSERT INTO api_key VALUES(NULL, :nm, :descr, :keyhash)', array(
            ':nm'=>$nm,
            ':descr'=>$descr,
            ':keyhash'=>$key
        ));
        echo 'successfully saved';
    }
    public static function deleteApiKey($id){
        khatral::khquery('DELETE FROM api_key WHERE api_id=:id', array(
            ':id'=>$id
        ));
        echo 'successfully deleted';
    }
    //Display Build Information
    public static function DisplayVerBuild(){
        // Australia/Adelaide
        date_default_timezone_set('Australia/Adelaide');
        $date = date('dmYhis', time());
        // echo 'v1.0 Build 13112020071510-alpha-r102';
        // echo 'v1.0 Build 18112020023550am-beta1-r100';
        // echo 'v1.0 Build 02122020035515am-beta2-r103';
        // echo 'v1.0 Build 14122020091145pm-beta3-r105';
        // echo 'v1.0 Release Candidate';
        // echo 'v1.1 Build 301220200200am-r100';
        // echo 'v1.2.1 Build 06012021015015am-r293';
        // echo 'v1.3 Build 02022021103020pm-r693';
        // echo 'v2.0 alpha1 Build 11022021063340pm-r759';
        // echo 'v2.1 alpha2 build 18022021101555pm-r780';
        // echo 'v2.0 beta 2 build 25022021030010pm-r785';
        // echo 'v3.0 alpha1 build 160420211123pm-r788';
        echo 'v3.0 alpha2 build 21042021031620am-r790';
    }
    //Display Version number
    public static function DisplayVersion(){
        // echo 'v1.0';
        echo 'v3.0 alpha2';
    }
    //Display Aves Engine version
    public static function DisplayAvesEngineVersion(){
        // echo 'v2.1-r401';
        echo 'v2.2-r845';
    }
    //Display Khatral Version
    public static function DisplayKhatralVersion(){
        // echo '0.0.4-r600';
        echo '0.0.6-r845';
    }
    //Display Change log
    public static function DisplayChangeLog(){
        // echo '<ul><li>Changed User Interface to accommodate more items</li>';
        // echo '<li>Changed Primary Navigation</li>';
        // echo '<li>Changed API file name to better suit the operation</li>';
        // echo '<li>Numerous Bug Fixes</li>';
        // echo '<li>Performance Improvements</li>';
        // echo '</ul>';
        // echo '<ul><li>Added functionality to purchased software for asset management</li>
        // <li>Purchased Software module is developed using fetchAPI without JQuery</li>
        // <li>API improvements</li>
        // <li>Bug fixes</li>
        // <li>Performance Improvements</li></ul>
        // ';
        // echo '<ul><li>Added functionality to NONIT Equipment for asset management</li>
        // <li>NONIT Equipment module is developed using fetchAPI without JQuery</li>
        // <li>Fixed bugs in purchased software and NON IT Equipments Page</li>
        // <li>Added option to raise generalized service tickets without specifying a particular IP</li>
        // <li>API Bug Fixes</li>
        // <li>JSON Improvements</li>
        // <li>API improvements</li>
        // <li>Bug fixes</li>
        // <li>Performance Improvements</li></ul>
        // ';
        echo '<ul>';
        // echo '<li>Added Functionality to monitor ping from a particular computer</li>';
        // echo '<li>JSON improvements</li>';
        // echo '<li>Fixed interface bugs in both user and technician</li>';
        // echo '<li>Fixed bugs in ticket view and admin user creation</li>';
        // echo '<li>Fixed bugs in linux clients when used under arch based linux</li>';
        // echo '<li>Performance Improvements</li>';
        // echo '<li>Fixed alert system</li>';
        // echo '<li>Alert System will now correctly record the process that is stopped</li>';
        // echo '<li>Bug fixes</li>';
        // echo '<li>Added graph to application downtime</li>';
        // echo '<li>Bug Fixes</li>';
        // echo '<li>Performance Improvements</li>';
        // echo '<li>JSON security improvement</li>';
        echo '<li>please refer github for changelog</li>';
        echo '</ul>';
    }
    //Display Known bugs
    public static function KnownBugs(){
        echo '<ul><li>Bug in the purchased software and nonit when server is not enabled</li>
        <li>Bug in process that is running (windows client)</li>
        </ul>';
    }
}
?>