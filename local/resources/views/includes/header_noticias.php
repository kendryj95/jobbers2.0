<?php
			$back="";
			if(isset($atras) && $atras==1)
			{
				$back="../";
			}
?>
<header class="stick-top">
	<div class="menu-sec">
		<div class="container">
			<div class="logo">
				<a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 120px;"></a>
				</div><!-- Logo -->
				<div class="wishlist-dropsec">
					<!--<span><i class="la la-heart"></i><strong>3</strong></span>-->
					<div class="wishlist-dropdown">
						<ul class="scrollbar">
							<li>
								<div class="job-listing">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Massimo Artemisis</span>
									</div>
									</div><!-- Job -->
								</li>
								<li>
									<div class="job-listing">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
											<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
											<span>StarHealth</span>
										</div>
										</div><!-- Job -->
									</li>
									<li>
										<div class="job-listing">
											<div class="job-title-sec">
												<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
												<h3><a href="#" title="">Marketing Director</a></h3>
												<span>Tix Dog</span>
											</div>
											</div><!-- Job -->
										</li>
										<li>
											<div class="job-listing">
												<div class="job-title-sec">
													<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
													<h3><a href="#" title="">Web Designer / Developer</a></h3>
													<span>Massimo Artemisis</span>
												</div>
												</div><!-- Job -->
											</li>
											<li>
												<div class="job-listing">
													<div class="job-title-sec">
														<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
														<h3><a href="#" title="">Web Designer / Developer</a></h3>
														<span>Massimo Artemisis</span>
													</div>
													</div><!-- Job -->
												</li>
											</ul>
										</div>
									</div>
									<nav>
										
										</nav><!-- Menus -->
									</div>
								</div>
							</header>
							<section class="overlape" style="padding: 0px;">
								<div class="block no-padding">
									<div data-velocity="-.1" style="background: url(<?php echo $back;?>local/resources/views/images/fondo_panel_noticias.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
									<div class="container fluid" >
										<div class="row">
											<div class="col-lg-12" >
												<div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
													<h3 style="font-size: 26px;font-weight: 300;"><?php echo session()->get('nombre');?></h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>