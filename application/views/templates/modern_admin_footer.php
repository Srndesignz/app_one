                    </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	<!-- Scripts -->
	<script src="<?php echo base_url("assets/js/jquery-1.10.2.min.js");?>"></script>
	<script src="<?php echo base_url("assets/js/navigation.js");?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
	<script>
		$("#email").keyup(check_email);
		$(document).on("click", "#add_qualifications_link", add_qualifications);
		$(document).on("click", "#clear_qualifications", clear_qualifications);
		//$("#edit_email_btn").click(fetch_details_for_edit);
		$(document).on("click", "#update_modal_submit", update_details_modal);
		$("#hanging-email-nav").click(move_hanging_email_div);
		$(document).on("change", "#photo", function(){
			readURL(this);
		});
		$(document).on("click", "#edit_staff_link", fetch_details_modal);
		$(document).on("click", "#delete_staff_link", delete_staff);
	</script>
</body>
</html>