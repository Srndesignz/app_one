<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>STAFF DETAILS</title>
		<link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css");?>">
		<link href="<?php echo base_url("assets/css/style.css")?>" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="hanging-menu" class="text-center">
			<ul id="hanging-menu-ul">
				<li><a href="<?php echo base_url("index.php/staff/enter");?>"><i class="fa fa-home fa-1x"></i><br>HOME</a></li>
				<li><a href="<?php echo base_url("index.php/staff/logout");?>"><i class="fa fa-power-off fa-1x"></i><br>LOGOUT</a></li>
			</ul>
		</div>
		<div id="hanging-already-reg-div" class="text-center">
			Already Registered?
		</div>
		<div id="hanging-email-div-wrap">
			<div id="hanging-wrap">
				<div id="hanging-email-nav">
					<a href="#" id="already-reg-link-nav"><i id="hanging-email-nav-icon" class="fa fa-chevron-left"></i></a>
				</div>
				<div id="hanging-email-div" class="text-center">
					<h4 class="text-center">You can edit your details here</h4>
						<?php echo validation_errors();?>
							<table class="table">
								<?php echo form_open_multipart('staff/get');?>
								<tr>
									<td>Email: </td>
									<td><input class="form-control" type="text" id="edit_email_field" name="email" required/></td>
									<td><input id="edit_email_btn" class="btn btn-success" type="submit" name="submit" value="Go"/></td>
								</tr>
							</form>
						</table>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row top-menu">
				<div class="col-md-12 main-menu-div">
					<div class="navbar navbar-default">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>
					    <div class="collapse navbar-collapse">
					      <ul class="nav navbar-nav">
					      	<li class="menu-link-li"><div id="new-top"></div><a href="<?php echo base_url("index.php/staff/enter");?>">HOME</a></li>
					      	<li class="menu-link-li"><div id="logout-top"></div><a href="<?php echo base_url("index.php/staff/logout");?>">LOGOUT</a></li>
					      </ul>
					    </div>
					  </div>
				</div>
			</div>
			<div class="row header">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-2 title-logo">
							<img src="<?php echo base_url("assets/css/images/ihrd_logo.png"); ?>" width="120px"/>
						</div>
						<div class="col-md-8 title-whole">
							<div class="row">
								<h3><b>College of Engineering Attingal</b></h3>
							</div>
							<div class="row">
								<h6>Portal for entering details of teaching faculties</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>