<?php
define('STS',1);
include_once('includes/config.php');
(defined('SESSIONDEBUG')&&isset($_SESSION)?print("<!--".print_r($_SESSION,true)."-->"):Null);
if($_SERVER['REQUEST_METHOD'] == "POST"){
	print_r($_SERVER);
	include_once('');
}else{
?>
<!DOCTYPE html public "✰">
	<!--[if lt IE 7]> <html lang="en-us" class="no-js ie6"> <![endif]-->
	<!--[if IE 7]>    <html lang="en-us" class="no-js ie7"> <![endif]-->
	<!--[if IE 8]>    <html lang="en-us" class="no-js ie8"> <![endif]-->
	<!--[if IE 9]>    <html lang="en-us" class="no-js ie9"> <![endif]-->
	<!--[if gt IE 8]><!--><html lang="en-us" class="no-js fuelux"> <!--<![endif]-->
	<head utc="<?php echo $math->now().'000';?>" tabid="<?php echo $math->unique();?>">
		<meta charset="utf-8">
		<title><?php echo WEBSITETITLE;?></title>
  		<meta name="description" content="<?php echo WEBSITETITLE;?>">
  		<meta name="author" content="Power Generation Solutions Reaserches Lab">
	<!-- iPhone, iPad and Android specific settings -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<link href="images/interface/iOS_icon.png" rel="apple-touch-icon">
	<!-- Styles -->
		<link rel="stylesheet" href="css/normalize.css" />
		
		<link rel="stylesheet" href="css/fuelux.min.css">
		<link rel="stylesheet" href="css/fuelux-responsive.css">
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img class="logo" src="img/logo.png" /></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="javascript:void(0);">Simulator</a></li>
            <!--li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase" role="main">
      <div class="jumbotron div-welcome">
        <h1>Radar Simulator</h1>
        <br />
        <p>This simulator is created by Power Generation Solutions research lab ME.<br /><br /><i class="red">IMPORTANT: </i>Use at your own risk.</p>
        <p><a href="javascript:void(0);" class="btn btn-primary btn-lg btn-proceed" role="button">I Agree &raquo;</a></p>
      </div>
      <div class="jumbotron div-wizard" style="display:none">
		<div class="wizard">
			<ul class="steps">
				<li data-target="#step1" class="active"><span class="badge badge-info">1</span>Region & Standards<span class="chevron"></span></li>
				<li data-target="#step2"><span class="badge">2</span>Car Dimensions<span class="chevron"></span></li>
				<li data-target="#step3"><span class="badge">3</span>Sensor Details<span class="chevron"></span></li>
				<li data-target="#step4"><span class="badge">4</span>Road Data<span class="chevron"></span></li>
				<li data-target="#step5"><span class="badge">5</span>Sensors Model<span class="chevron"></span></li>
			</ul>
		</div>
		<div class="step-content">
			<div class="step-pane active" id="step1">
				<div class="div-region">
					<h3>Please select your region:</h3>
					<div class="list-group">
						<a href="javascript:void(0);" val="us" class="Region list-group-item btn-option active">
							<h4 class="list-group-item-heading">US Standards</h4>
						</a>
						<a href="javascript:void(0);" val="eu" class="Region list-group-item btn-option">
							<h4 class="list-group-item-heading">Europian/Asian Standards</h4>
						</a>
						<!--a href="javascript:void(0);" class="list-group-item btn-option">
							<h4 class="list-group-item-heading">Custom</h4>
							<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
						</a-->
					</div>
				</div>
			</div>
			<div class="step-pane" id="step2">
				<div class="row">
			        <div class="col-sm-5">
			          <ul class="list-group">
			            <li class="list-group-item">(<span class="red" title="Required">*</span>) Car height: <br /><input type="text" class="input CarHeight" name="CarHeight" placeholder="figure(A)" /><span class="length-measurement">inches</span></li>
			            <li class="list-group-item">(<span class="red" title="Required">*</span>) Car width: <br /><input type="text" class="input CarWidth" name="CarWidth" placeholder="figure(B)" /><span class="length-measurement">inches</span></li>
			            <li class="list-group-item">(<span class="red" title="Required">*</span>) Car length: <br /><input type="text" class="input CarLength" name="CarLength" placeholder="figure(C)" /><span class="length-measurement">inches</span></li>
			          </ul>
			        </div><!-- /.col-sm-4 -->
			        <div class="col-sm-4">
				        <ul class="list-group">
							<li class="list-group-item"><img src="img/sketch1.jpg" /></li>
						</ul>
			        </div><!-- /.col-sm-4 >
			        <div class="col-sm-4">
			          <ul class="list-group">
			            <li class="list-group-item">Not Used</li>
			          </ul>
			        </div><!-- /.col-sm-4 -->
			      </div>
			</div>
			<div class="step-pane" id="step3">
				<div class="btn-toolbar front-sensors" role="toolbar">
					<div class="btn-group">
						<button type="button" class="btn btn-default active">1</button>
						<button type="button" class="btn btn-default">2</button>
						<button type="button" class="btn btn-default">3</button>
						<button type="button" class="btn btn-default">4</button>
					</div>
				</div>
				<div class="btn-toolbar rear-sensors" role="toolbar">
					<div class="btn-group">
						<button type="button" class="btn btn-default active">1</button>
						<button type="button" class="btn btn-default">2</button>
						<button type="button" class="btn btn-default">3</button>
						<button type="button" class="btn btn-default">4</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<div class="dropdown theme-dropdown clearfix">
							<a id="dropdownMenu1" href="#" role="button" class="sr-only dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								<li role="presentation" class="dropdown-header">AL Priority Sensores</li>
								<li role="presentation"><a class="sensorModel" role="menuitem" tabindex="-1">Model1</a></li>
								<li role="presentation"><a class="sensorModel" role="menuitem" tabindex="-1">Model2</a></li>
								<li role="presentation"><a class="sensorModel" role="menuitem" tabindex="-1">Model3</a></li>
								<li role="presentation" class="divider"></li>
								<li role="presentation" class="dropdown-header">Custom</li>
								<li role="presentation"><a class="sensorModel" role="menuitem" tabindex="-1">Custom</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
				        <ul class="list-group">
							<li class="list-group-item"><img src="img/sketch2-h.jpg" /></li>
							<li class="list-group-item"><img src="img/sketch2-v.jpg" /></li>
							<li class="list-group-item"><img src="img/sketch2-d.jpg" /></li>
						</ul>
					</div>
					<div class="col-sm-4 beamDetails" style="margin-left: 0;padding-left: 0;">
						<ul class="list-group" style="margin: 0">
				            <li class="list-group-item" style="height:101px">(<span class="red" title="Required">*</span>) Beam Arc(Horizontal)/per sensor: <br><input type="text" class="input BeamArcH" name="beamArcH" placeholder="figure(A)" /><span class="">°</span></li>
				            <li class="list-group-item" style="height:101px">(<span class="red" title="Required">*</span>) Beam Arc(Vertical): <br><input type="text" class="input BeamArcV" name="beamArcV" placeholder="figure(B)" /><span class="">°</span></li>
				            <li class="list-group-item" style="height:101px">(<span class="red" title="Required">*</span>) Beam Distance: <br><input type="text" class="input BeamArcD" name="beamArcD" placeholder="figure(C)" /><span class="length-measurement">inches</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="step-pane" id="step4">This is step 4</div>
			<div class="step-pane" id="step5">This is step 5</div>
		</div>
		<div class='div-wizard-control'>
			<button type="button" class="btn btn-default btnWizardPrev">« prev</button>
			<button type="button" class="btn-lg btn-primary btnWizardNext" >next »</button>
			<button type="button" class="btn btn-mini btnWizardStep hidden">current step</button>
		</div>
    </div>
    <div class="data hidden">
    <input class="hidden data region" name="data[region]" value="us" />
    <input class="hidden data carHeight" name="data[car][height]" value="" />
    <input class="hidden data carWidth" name="data[car][width]" value="" />
    <input class="hidden data carLength" name="data[car][length]" value="" />
    <input class="hidden data sensorsCountFront" name="data[sensor][front]" value="" />
    <input class="hidden data sensorsCountRear" name="data[sensor][rear]" value="" />
    <input class="hidden data sensorBrand" name="data[sensor][brand]" value="" />
    <input class="hidden data sensorModel" name="data[sensor][model]" value="" />
    <input class="hidden data beamH" name="data[sensor][beam][h]" value="" />
    <input class="hidden data beamV" name="data[sensor][beam][v]" value="" />
    <input class="hidden data beamD" name="data[sensor][beam][d]" value="" />
    <input class="hidden data " name="" value="" />
    <input class="hidden data " name="" value="" />
    </div>
    <!-- /container -->
   	<!-- Scripts -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/require.js"></script>
		<script type="text/javascript" src="js/fuelux.loader.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
<?php } ?>