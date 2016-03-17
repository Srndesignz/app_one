<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Alumni</title>
		<link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css");?>">
		<link href="<?php echo base_url("assets/css/style.css")?>" rel="stylesheet">
		<!--<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet" type="text/css">-->
	</head>
	<body>
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
						<form>
							<table class="table">
								<tr>
									<td>Email: </td>
									<td><input class="form-control" type="text" id="edit_email_field" required/></td>
									<td><a href="#" data-toggle="modal" data-target="#edit_modal_al" id="edit_email_link" class="btn btn-success">Go</a></td>
								</tr>
							</form>
						</table>
				</div>
			</div>
		</div>
		<!--<div class="title-logo">
			<img src="<?php echo base_url("assets/css/images/ihrd_logo.png"); ?>" width="120px"/>
		</div>-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<div class="row">
								<h3><b>Alumni Registration</b></h3>
							</div>
							<div class="row">
								<h6>College of Engineering Attingal</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_modal_al" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content modal_al">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Alumni</h4>
			      </div>
			      <div class="modal-body">
			        <p>Some text in the modal.</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>