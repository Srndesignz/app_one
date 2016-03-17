<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<h3 class="text-center">Email id already registered!</h3>
			<h4 class="text-center">You can edit your details here</h4>
			<?php echo validation_errors();?>
			<table class="table">
				<?php echo form_open_multipart('staff/get');?>
					<tr>
						<td>Email: </td>
						<td><input class="form-control" type="text" id="email" name="email"/></td>
						<td><input class="btn btn-success" type="submit" name="submit" value="Go"/></td>
					</tr>
					<!--Ajax request:<input autocomplete="off" list="result" type="text" id="ajax_input" name="ajax_input"/>
					<datalist id="result"><option value="Result"></datalist>
					<a id="ajax_submit" href="">Ajax submit</a>-->
				</form>
			</table>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>