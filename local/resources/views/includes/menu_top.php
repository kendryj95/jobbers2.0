<?php
      $back="";
      if(isset($atras) && $atras==1)
      {
      $back="../";  
      } 

      ?>
<header class="gradient">
  <div class="menu-sec">
    <div class="container">
      <div class="logo">
        <a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 120px;"></a>
        </div><!-- Logo -->
        <div class="btn-extars">
           <?php include("local/resources/views/includes/menus_publicos.php");?>
          </div>
        </div>
      </header>