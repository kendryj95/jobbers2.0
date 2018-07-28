<?php
			$back="";
			 if(isset($atras))
             {
                for ($i=0; $i < $atras; $i++) { 
                $back=$back."../";
             } 
             }
			?>
 <header class="stick-top">
    <div class="menu-sec">
        <div class="container">
            <div class="logo">
                <a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 120px;"></a>
            </div>
            <!-- Logo -->
            <div class="my-profiles-sec">
                <span>Bivenvenido, Daniel Maidana</span>
            </div>

        </div>
    </div>
</header>
<section class="overlape mt-responsive" style="padding: 0px;">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_candidato_dash.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
                        <h3 style="font-size: 26px;font-weight: 300;"><?php echo session()->get('candidato');?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>