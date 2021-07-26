<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					Terms and Conditions
					<div class="text-muted font-14">Please make sure that, you have followed the instruction...</div>
				</div>
				<div class="card-body pb-3">
					<div id="summernote">
						<p>Write Terms and Conditions the website.</p>
					</div>

				</div>
				<div class="card-footer text-muted">
					Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#summernote').summernote();
	});
</script>