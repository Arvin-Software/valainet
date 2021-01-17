<?php
include 'header.php';
echo '<body class="bg-dark">';
echo '<div class="container-fluid" style="margin-top: 10%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border p-4" style="border-radius: 20px 20px 20px 20px;">';
echo '<h3><img src="../images/valaiweb.svg" style="width: 48px;">&nbsp;Valai - Database creation and testing</h3>';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to Database check configuration<br />';
    die("Connection failed: " . $conn->connect_error);
    
}

echo '<img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Connected successfully';
$conn = new mysqli($servername, $username, $password, "valai");
$query = 'CREATE TABLE IF NOT EXISTS contact_us(
            contact_id              INTEGER         NOT NULL        AUTO_INCREMENT,
            contact_name            VARCHAR(255)    NOT NULL,
            contact_email           VARCHAR(255)    NOT NULL,
            contact_message         LONGTEXT        NOT NULL,
            contact_ip              VARCHAR(255)    NOT NULL,
            PRIMARY KEY(contact_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table contact_us created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table contact_us ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS actions(
            act_id                  INTEGER             NOT NULL        AUTO_INCREMENT,
            act_ip                  VARCHAR(255)        NOT NULL,
            act_nm                  VARCHAR(255)        NOT NULL,
            act_stat                VARCHAR(255)        NOT NULL,
            PRIMARY KEY(act_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table actions created successfully';
}else{
    echo'<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table actions ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS stat(
    act_id                  INTEGER             NOT NULL        AUTO_INCREMENT,
    act_ip                  VARCHAR(255)        NOT NULL,
    act_group               VARCHAR(255)        NOT NULL,
    act_nm                  VARCHAR(255)        NOT NULL,
    act_stat                VARCHAR(255)        NOT NULL,
    PRIMARY KEY(act_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table stat created successfully';
}else{
echo'<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table stat ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS comp_info(
            comp_id             INTEGER             NOT NULL        AUTO_INCREMENT,
            comp_ip             VARCHAR(255)        NOT NULL,
            comp_group          VARCHAR(255)        NOT NULL,
            comp_asset_tag      VARCHAR(255)        NOT NULL,
            comp_nm             VARCHAR(255)        NOT NULL,
            comp_os             VARCHAR(500)        NOT NULL,
            comp_processor      VARCHAR(255)        NOT NULL,
            comp_ram_tot        VARCHAR(255)        NOT NULL,
            display             VARCHAR(255)        NOT NULL,
            PRIMARY KEY(comp_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table comp_info created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table comp_info' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS comp_group(
            group_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            group_nm            VARCHAR(255)    NOT NULL,
            group_descr         VARCHAR(255)    NOT NULL,
            PRIMARY KEY(group_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table comp_group created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table comp_group';
}
$query = 'CREATE TABLE IF NOT EXISTS storag(
            storage_id              INTEGER             NOT NULL        AUTO_INCREMENT,
            nm                      VARCHAR(255)        NOT NULL,
            tot                     VARCHAR(255)        NOT NULL,
            avl                     VARCHAR(255)        NOT NULL,
            ip                      VARCHAR(255)        NOT NULL,
            group_nm                   VARCHAR(255)        NOT NULL,
            PRIMARY KEY(storage_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table storage created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table storage' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS os(
            os_id               INTEGER         NOT NULL        AUTO_INCREMENT,
            os_bit              VARCHAR(255)    NOT NULL,
            os_serial           VARCHAR(255)    NOT NULL,
            os_installed        VARCHAR(255)    NOT NULL,
            os_uptime           VARCHAR(255)    NOT NULL,
            os_booted           VARCHAR(255)    NOT NULL,
            os_extip            VARCHAR(255)    NOT NULL,
            os_ip               VARCHAR(255)    NOT NULL,
            os_group            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(os_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table os created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table os' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS process_moni(
            moni_id             INTEGER             NOT NULL        AUTO_INCREMENT,
            moni_nm             VARCHAR(255)        NOT NULL,
            moni_stat           VARCHAR(255)        NOT NULL,
            moni_ip             VARCHAR(255)        NOT NULL,
            moni_group          VARCHAR(255)        NOT NULL,
            PRIMARY KEY(moni_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table process_moni created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table process_moni' . $conn->error;
}

$query = 'CREATE TABLE IF NOT EXISTS my_license(
            license_id              INTEGER         NOT NULL            AUTO_INCREMENT,
            license_key             VARCHAR(255)    NOT NULL,
            license_hash            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(license_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table my_license created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table my_license' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS alerts(
                alert_id                INTEGER         NOT NULL        AUTO_INCREMENT,
                alert_nm                VARCHAR(255)    NOT NULL,
                alert_mess              VARCHAR(255)    NOT NULL,
                alert_ip                VARCHAR(255)    NOT NULL,
                alert_group             VARCHAR(255)    NOT NULL,
                alert_time              VARCHAR(255)    NOT NULL,
                alert_stat              VARCHAR(255)    NOT NULL,
                PRIMARY KEY(alert_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table alerts created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table alerts ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS user(
                user_id             INTEGER         NOT NULL        AUTO_INCREMENT,
                user_nm             VARCHAR(255)    NOT NULL,
                user_pass           VARCHAR(255)    NOT NULL,
                user_typ            VARCHAR(255)    NOT NULL,
                PRIMARY KEY(user_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table user created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table user ' . $conn->error;
}

$query = 'CREATE TABLE IF NOT EXISTS process_run(
            pro_id              INTEGER         NOT NULL        AUTO_INCREMENT,
            pro_nm              VARCHAR(255)    NOT NULL,
            proc_id             VARCHAR(255)    NOT NULL,
            pro_mem             VARCHAR(255)    NOT NULL,
            pro_ip                VARCHAR(255)    NOT NULL,
            pro_group             VARCHAR(255)    NOT NULL,
            PRIMARY KEY(pro_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table process_run created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table process_run ' . $conn->error;
}
// $query = 'CREATE TABLE IF NOT EXISTS '
// $query = 'CREATE TABLE IF NOT EXISTS avail_info(
//             avail_info          INTEGER         NOT NULL        AUTO_INCREMENT,
//             avail_ip            VARCHAR(255)    NOT NULL,
//             avail_stat          VARCHAR(255)    NOT NULL,
//             avail_tim           VARCHAR(255)    NOT NULL,
//             PRIMARY KEY(avail_info))';
$query = 'CREATE TABLE IF NOT EXISTS modl(
            modl_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            modl_nm         VARCHAR(255)    NOT NULL,
            modl_user       VARCHAR(255)    NOT NULL,
            PRIMARY KEY(modl_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table modl created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table modl ' . $conn->error;
}

$query = 'CREATE TABLE IF NOT EXISTS ticket(
            ticket_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            ticket_ri_id        VARCHAR(255)    NOT NULL,
            ticket_mess         LONGTEXT        NOT NULL,
            ticket_ip           VARCHAR(255)    NOT NULL,
            ticket_group        VARCHAR(255)    NOT NULL,
            ticket_wherenm      VARCHAR(255)    NOT NULL,
            ticket_unm          VARCHAR(255)    NOT NULL,
            PRIMARY KEY(ticket_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table ticket created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table ticket ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS ticket_finish(
            ticket_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            ticket_ri_id        VARCHAR(255)    NOT NULL,
            ticket_mess         LONGTEXT        NOT NULL,
            ticket_ip           VARCHAR(255)    NOT NULL,
            ticket_group        VARCHAR(255)    NOT NULL,
            ticket_wherenm      VARCHAR(255)    NOT NULL,
            ticket_unm          VARCHAR(255)    NOT NULL,
            PRIMARY KEY(ticket_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table ticket_finish created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table ticket_finish ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS per_stat(
            stat_id             INTEGER         NOT NULL        AUTO_INCREMENT,
            ticket_nm           VARCHAR(255)    NOT NULL,
            user_nm             VARCHAR(255)    NOT NULL,
            conv                LONGTEXT        NOT NULL,
            timestam            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(stat_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table per_stat created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table per_stat ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS assign_tick(
            assign_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            assign_tick_id      VARCHAR(255)    NOT NULL,
            assign_user_id      VARCHAR(255)    NOT NULL,
            assign_user_nm      VARCHAR(255)    NOT NULL,
            timestam            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(assign_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table assign_tick created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table assign_tick ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS asset(
            asset_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            asset_code          VARCHAR(255)    NOT NULL,
            asset_loc           VARCHAR(255)    NOT NULL,
            asset_inst          VARCHAR(255)    NOT NULL,
            asset_war_exp       VARCHAR(255)    NOT NULL,
            asset_last_serv     VARCHAR(255)    NOT NULL,
            asset_ip            VARCHAR(255)    NOT NULL,
            asset_group         VARCHAR(255)    NOT NULL,
            PRIMARY KEY(asset_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table asset created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table asset ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS pur_soft(
            soft_id             INTEGER         NOT NULL        AUTO_INCREMENT,
            soft_nm             VARCHAR(500)    NOT NULL,
            soft_des            LONGTEXT        NOT NULL,
            soft_pur_date       VARCHAR(255)    NOT NULL,
            soft_exp_date       VARCHAR(255)    NOT NULL,
            soft_ren_date       VARCHAR(255)    NOT NULL,
            asset_code          VARCHAR(255)    NOT NULL,
            loc                 VARCHAR(255)    NOT NULL,
            PRIMARY KEY(soft_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table pur_soft created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table pur_soft ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS nonit(
            nonit_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            nonit_coll          VARCHAR(255)    NOT NULL,
            nonit_nm            VARCHAR(500)    NOT NULL,
            nonit_des           LONGTEXT        NOT NULL,
            nonit_pur_date      VARCHAR(255)    NOT NULL,
            nonit_exp_date      VARCHAR(255)    NOT NULL,
            nonit_ren_date      VARCHAR(255)    NOT NULL,
            asset_code          VARCHAR(255)    NOT NULL,
            loc                 VARCHAR(255)    NOT NULL,
            PRIMARY KEY(nonit_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table nonit created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table nonit ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS api_valai(
            api_id          INTEGER             NOT NULL        AUTO_INCREMENT,
            api_nm          VARCHAR(255)        NOT NULL,
            api_key         VARCHAR(255)        NOT NULL,
            api_hash        VARCHAR(255)        NOT NULL,
            PRIMARY KEY(api_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table api_valai created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table api_valai ' . $conn->error;
}
// $query = 'CREATE TABLE IF NOT EXISTS process_moni(
//     moni_id             INTEGER             NOT NULL        AUTO_INCREMENT,
//     moni_nm             VARCHAR(255)        NOT NULL,
//     moni_stat           VARCHAR(255)        NOT NULL,
//     moni_ip             VARCHAR(255)        NOT NULL,
//     moni_group          VARCHAR(255)        NOT NULL,
//     PRIMARY KEY(moni_id))';
$query = 'CREATE TABLE IF NOT EXISTS ip_addr_moni(
                aip_id               INTEGER         NOT NULL        AUTO_INCREMENT,
                aip_nm               VARCHAR(255)    NOT NULL,
                aip_stat             VARCHAR(255)    NOT NULL,
                aip_ip               VARCHAR(255)    NOT NULL,
                aip_group            VARCHAR(255)    NOT NULL,
                PRIMARY KEY(aip_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table ip_addr_moni created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table ip_addr_moni ' . $conn->error;
}
echo '<br /><br />';
echo '<a href="../installation/second.php" class="btn btn-dark bor-ten float-left">&lt; Previous</a>
<a href="../installation/finish.php" class="btn btn-dark bor-ten float-right">Next &gt;</a>';
echo '</div>';
echo '<div class="col-sm-4"></div>';