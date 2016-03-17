<div class="container">
	<div class="row login-row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4 login-div">
			<div class="login-logo">
				<img src="<?php echo base_url("assets/css/images/ihrd_logo.png");?>" width="100px"/>
			</div>
			<?php echo validation_errors();?>
			<table class="table login-table">
				<?php echo form_open_multipart('staff/login');?>
					<tr><td>Username: </td><td><input class="form-control" type="text" id="username" name="username"/></td></tr>
					<tr><td>Password: </td><td><input class="form-control" type="password" id="password" name="password"/></td></tr>
					<tr><td></td><td><input class="btn btn-success" type="submit" name="submit" value="Login"/></td></tr>
				</form>
			</table>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>