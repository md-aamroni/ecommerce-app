<?php

use App\Http\Controllers\SettingsController;

$ctrl = new SettingsController;


// Create and/or Update
if (isset($_POST['submitPrivacyPolicy'])) {
	if (empty($_POST['update_id'])) {
		$result = $ctrl->create($_POST['title'], $_POST['details']);

		if (!empty($result) && is_array($result)) {
			echo notification('Congratulation! Data is added successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	} else {
		$result = $ctrl->update($_POST['title'], $_POST['details'], $_POST['update_id']);

		if ($result) {
			echo notification('Congratulation! Data is updated successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	}
}


// Fetch Data
$privacyPolicy = $ctrl->getPrivacyPolicy();
?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					Privacy Policy
					<div class="text-muted font-14">Please make sure that, you have followed the instruction...</div>
				</div>
				<div class="card-body pb-1">
					<form action="" method="POST" autocomplete="off">
						<input type="hidden" name="title" value="Privacy Policy" />
						<input type="hidden" name="update_id" value="<?php echo @$privacyPolicy[0]['id']; ?>" />
						<div class="form-group">
							<textarea name="details" id="summernote"><?php echo @$privacyPolicy[0]['details']; ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submitPrivacyPolicy">
								<i class="fas fa-plus mr-1"></i><?php echo !empty($privacyPolicy[0]['id']) ? 'Confirm and Update' : 'Confirm and Submit'; ?>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			placeholder: 'Privacy Policy content goes here..',
			tabsize: 2,
			height: 420,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'video']],
				['view', ['fullscreen', 'codeview', 'help']]
			]
		});
	});
</script>