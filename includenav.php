
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row" style="">
                <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarWEX" style="border-radius: 20px 20px 20px 20px; padding: 0px 0px 0px 0px;">
                    <div class="nav flex-md-column flex-column" style="overflow: auto;  width: 100%; padding: 0px 0px 0px 0px;">
                            <br />
                            
                            <a style="margin-bottom: 5%;" href="dash.php" <?php if($curr == 'dash'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb "';} ?>  id="users" name="users"><img src="images/valai.svg" class="" style="width: 28px;">&nbsp;&nbsp;Dashboard</a>
                            <a href="collection.php" style="margin-bottom: 5%;" <?php if($curr == 'announce'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="images/ping.svg" class="" style="width: 28px;">&nbsp;&nbsp;Collections</a>
                            <a href="alertview.php" style="margin-bottom: 5%;" <?php if($curr == 'mod'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="images/warning.svg" class="" style="width: 28px;">&nbsp;&nbsp;Alerts</a>
                            <!-- <a href="users.php" style="margin-bottom: 5%;" <?php if($curr == 'user'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="images/painter.svg" class="" style="width: 28px;">&nbsp;&nbsp;Users</a>
                            <a href="ticket.php" style="margin-bottom: 5%;" <?php if($curr == 'tickets'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="images/ticket.svg" class="" style="width: 28px;">&nbsp;&nbsp;Service Tickets</a> -->
                            <!-- <a href="about.php" style="margin-bottom: 5%;" <?php if($curr == 'about'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="images/info.svg" class="" style="width: 28px;">&nbsp;&nbsp;About</a> -->
                            <!-- <a href="logout.php" class="btn-nav nav-item nav-link btn text-left btn-bb bor-none"  id="invoi" name="invoi"><img src="images/logout.svg" class=" bg-white bor-twen p-1" style="width: 28px;">&nbsp;&nbsp;Logout</a>  -->
                    </div>
                </div>
            </nav>