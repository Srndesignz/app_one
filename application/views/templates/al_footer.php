		<div class="container already-register-container">
			<div class="col-md-12">
				<h3 class="text-center">Already Registered</h3>
				<h4 class="text-center">You can edit your details here</h4>
				<form>
				<table class="table">
					<tr>
						<td><input class="form-control" placeholder="Email" type="text" name="email"/></td>
						<td><input class="btn btn-success" type="submit" name="submit" value="Go"/></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
		<!--
		<div class="container-fluid">
		  	<div class="row" id="footer">
				<div class="col-md-12" id="copyright">
					College of Engineering Attingal © 2015
				</div>
			</div>
		</div>
		-->
		<!-- Scripts -->
		<script src="<?php echo base_url("assets/js/jquery-1.10.2.min.js");?>"></script>
		<script src="<?php echo base_url("assets/js/navigation.js");?>"></script>
		<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
		<script>
			var site_url = "<?php echo site_url();?>";
			$("#email").keyup(check_email);
			$(document).on("click", "#add_qualifications_link", add_qualifications);
			$(document).on("click", "#clear_qualifications", clear_qualifications);
			$("#hanging-email-nav").click(move_hanging_email_div);
			$(document).on("change", "#photo", function(){
			    readURL(this);
			});
			//$(document).on("click", "#edit_staff_link", fetch_details_modal);
			//$(document).on("click", "#delete_staff_link", delete_staff);
			$(document).on('click', '#enter', enter);
			$(document).on('click', '#edit_email_link', load_modal_al);
			$(document).on('click', '#update_modal_submit', update_modal_al);
			$(document).on('click', '#delete_alumni_link', delete_alumni);
			$(document).on('click', '#edit_alumni_link', load_modal_al_admin);
		</script>
	</body>
</html>