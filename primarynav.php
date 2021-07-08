<?php
echo '<div class="" style="background-color: #f2f2f2;">';
echo '<nav class="navbar navbar-expand-lg navbar-light border shadow" style="margin-bottom: 2px;">
  <!-- Brand -->
  <img src="/valainet/images/logonew1.svg" class="p-2" style="width: 58px; margin-left: 12%;" alt="logo">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="padding-left: 3%; ">
    <ul class="navbar-nav">
      <li class="nav-item">';
        if($mainnav=="comp"){
            echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  btn-bb text-light bor-none"  style="background-color: #999999" href="dash.php"><img src="/valainet/images/computer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Servers / Computers</a>';
        }else{
            echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark btn-bb bor-none" href="dash.php"><img src="/valainet/images/computer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Servers / Computers</a>';
        }
      echo '</li><li class="nav-item">';
      if($mainnav=="pur"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="pursoft.php"><img src="/valainet/images/software.png" class="" style="width: 28px;">&nbsp;&nbsp;Purchased Software</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="pursoft.php"><img src="/valainet/images/software.png" class="" style="width: 28px;">&nbsp;&nbsp;Purchased Software</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="it"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="nonit.php"><img src="/valainet/images/other.svg" class="" style="width: 28px;">&nbsp;&nbsp;Non IT Equipment</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="nonit.php"><img src="/valainet/images/other.svg" class="" style="width: 28px;">&nbsp;&nbsp;Non IT Equipment</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="about"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="about.php"><img src="/valainet/images/information.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Valai</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="about.php"><img src="/valainet/images/information.svg" class="" style="width: 28px;">&nbsp;&nbsp;About Valai</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="users"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="users.php"><img src="/valainet/images/customer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="users.php"><img src="/valainet/images/customer.svg" class="" style="width: 28px;">&nbsp;&nbsp;Access control</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="serv"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="ticket.php"><img src="/valainet/images/ticket.svg" class="" style="width: 28px;">&nbsp;&nbsp;Service Tickets</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="ticket.php"><img src="/valainet/images/ticket.svg" class="" style="width: 28px;">&nbsp;&nbsp;Service Tickets</a>';
      }
      echo '</li><li class="nav-item">';
      if($mainnav=="logout"){
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five  bor-none text-light" style="background-color: #999999" href="../loginhandle/logout.php"><img src="/valainet/images/logout.svg" class="" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }else{
        echo '<a class="btn-nav nav-item nav-link btn text-left bor-five text-dark bor-none" href="../loginhandle/logout.php"><img src="/valainet/images/logout.svg" class="" style="width: 28px;">&nbsp;&nbsp;Logout session</a>';
      }
      echo '</li>
    </ul>
  </div>
</nav>';
echo '</div>';
?>