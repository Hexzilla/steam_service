<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<style type="text/css">
@font-face {
    font-family:"Cangkhoi";
    src: url("/assets/dist/fonts/cangkhoi/Cangkhoi.etf") /* EOT file for IE */
}
@font-face {
    font-family:"Cangkhoi";
    src: url("/assets/dist/fonts/cangkhoi/Cangkhoi.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"1952-rheinmetall";
    src: url("/assets/dist/fonts/1952-rheinmetall/1952 RHEINMETALL.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"A Sensible Armadillo";
    src: url("/assets/dist/fonts/a-sensible-armadillo/A Sensible Armadillo.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"BlackberryJamPersonalUse-rXOB";
    src: url("/assets/dist/fonts/billy-argel_blackberry-jam-personal-use/BlackberryJamPersonalUse-rXOB.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"Cagliostro-Regular";
    src: url("/assets/dist/fonts/cagliostro/Cagliostro-Regular.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"JandaStylishScript";
    src: url("/assets/dist/fonts/kimberly-geswein_janda-stylish-script/JandaStylishScript.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"Raphtalia";
    src: url("/assets/dist/fonts/nurf-designs_raphtalia-personal-use-only/Raphtalia.otf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"Dancing Script";
    src: url("/assets/dist/fonts/pablo-impallari_dancing-script/Dancing Script.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"Sickness";
    src: url("/assets/dist/fonts/sickness/Sickness.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"URANIA CZECH";
    src: url("/assets/dist/fonts/urania-czech/URANIA CZECH.ttf") /* TTF file for CSS3 browsers */
}
@font-face {
    font-family:"GistUprightExtrabold";
    src: url("/assets/dist/fonts/yellow-design-studio_gist/ GistUprightExtraboldDemo-RwAe.otf") /* TTF file for CSS3 browsers */
}

.preview_card_area{
	position: absolute;
    width: 100%;
    height: 100%;
    
}
.preview_card_area.background{
	z-index: 1000000;
    background-color: #0a0a0a;
    opacity: 0.9;
}
.preview_card_area #_canvas{
	width: 500px;
    height: 710.5px;
    position: absolute;
    left: 50%;
    margin-left: -250px;
    top: 50%;
    margin-top: -360px;
    z-index: 1000001;
    background-color: white;
}
</style>
<div class="preview_card_area" style="display: none;">
	<div class="preview_card_area background"></div>
	<div style="z-index: 1000001;
    right: 25px;
    position: absolute;
    top: 10px;
    font-size: 30px;color: white;
    cursor: pointer;"><span class="close_btn" onclick="$('.preview_card_area').css('display','none');">close</span></div>
	<canvas id="_canvas" />
</div>
<div class="wrapper">

	<?php $this->load->view('_partials/navbar'); ?>

	<?php // Left side column. contains the logo and sidebar ?>
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel" style="height:65px">
				<div class="pull-left info" style="left:5px">
					<p><?php echo $user->first_name; ?></p>
					<a href="panel/account"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<?php // (Optional) Add Search box here ?>
			<?php //$this->load->view('_partials/sidemenu_search'); ?>
			<?php $this->load->view('_partials/sidemenu'); ?>
		</section>
	</aside>

	<?php // Right side column. Contains the navbar and content of the page ?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1><?php echo $page_title; ?></h1>
			<?php $this->load->view('_partials/breadcrumb'); ?>
		</section>
		<section class="content">
			<?php $this->load->view($inner_view); ?>
			<?php $this->load->view('_partials/back_btn'); ?>
		</section>
	</div>

	<?php // Footer ?>
	<?php $this->load->view('_partials/footer'); ?>

</div>
