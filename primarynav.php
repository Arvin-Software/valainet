<?php
echo '<div class="bg-dark">';
echo '<nav class="navbar navbar-expand-lg navbar-light shadow">
  <!-- Brand -->
  <img src="images/valaiweb.svg" class="mx-auto d-block rounded-circle p-2" style="background-color: #fff; width: 48px;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 2%; ">
    <ul class="navbar-nav">
      <li class="nav-item">';
        if($mainnav=="comp"){
            echo '<a class="btn-nav nav-item nav-link btn text-left  btn-bb bg-light text-dark bor-none" href="dash.php"><img src="images/computer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Computers / servers</a>';
        }else{
            echo '<a class="btn-nav nav-item nav-link btn text-left text-light btn-bb bor-none" href="dash.php"><img src="images/computer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Computers / servers</a>';
        }
      echo '</li><li class="nav-item">';
      if($mainnav=="pur"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="devl.php"><img src="images/software.png" class="" style="width: 28px;">&nbsp;&nbsp;Purchased Software</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="devl.php"><img src="images/software.png" class="" style="width: 28px;">&nbsp;&nbsp;Purchased Software</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="pur"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="devl.php"><img src="images/other.svg" class="" style="width: 28px;">&nbsp;&nbsp;Non IT Equipment</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="devl.php"><img src="images/other.svg" class="" style="width: 28px;">&nbsp;&nbsp;Non IT Equipment</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="about"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="about.php"><img src="images/info.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Valai</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="about.php"><img src="images/info.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Valai</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="users"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="users.php"><img src="images/painter.svg" class="" style="width: 28px;">&nbsp;&nbsp;Admins / Users</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="users.php"><img src="images/painter.svg" class="" style="width: 28px;">&nbsp;&nbsp;Admins / Users</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="serv"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="ticket.php"><img src="images/ticket.svg" class="" style="width: 28px;">&nbsp;&nbsp;Service Tickets</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="ticket.php"><img src="images/ticket.svg" class="" style="width: 28px;">&nbsp;&nbsp;Service Tickets</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="logout"){
        echo '<a class="btn-nav nav-item nav-link btn text-left  bor-none bg-light text-dark" href="logout.php"><img src="images/logout.svg" class=" bg-white bor-twen p-1" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left text-light bor-none" href="logout.php"><img src="images/logout.svg" class=" bg-white bor-twen p-1" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }
      echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
?>