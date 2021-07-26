<?php
if (isset($_POST['aboutUs'])) {
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}
?>


<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					About Us
					<div class="text-muted font-14">Please make sure that, you have followed the instruction...</div>
				</div>
				<div class="card-body pb-3">
					<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				
						<div id="summernote" name="aboutUsText">

						</div>
						<button type="submit" name="aboutUs">Post</button>
					</form>
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

		$('#summernote').summernote({
			placeholder: 'Hello stand alone ui',
			tabsize: 2,
			height: 520,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
				['view', ['fullscreen', 'codeview', 'help']]
			]
		});

	});
</script>