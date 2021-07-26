<?php

use App\Http\Controllers\SeoController;

$ctrl = new SeoController;

// Delete Data
if (!empty($_SESSION['isDataDeleted'])) {
	if ($_SESSION['isDataDeleted'] === true) {
		echo notification('Congratulation! Data is deleted successfully', 'success');
		unset($_SESSION['isDataDeleted']);
	} elseif ($_SESSION['isDataDeleted'] === false) {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
		unset($_SESSION['isDataDeleted']);
	}
}


// Update status
if (isset($_POST['changeStatus'])) {
	$result = $ctrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}


//update data
if (isset($_POST['updateSeoPage'])) {

	$result = $ctrl->update($_POST['update_page_url'], $_POST['update_priority'], $_POST['update_status'], $_POST['update_keywords'], $_POST['update_description'], $_POST['update_id']);
	if ($result) {
		echo notification('Congratulation! Page Url is updated successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong', 'warning');
	}
}


// Create Data
if (isset($_POST['addNewPageUrl'])) {
	if (!empty($_POST['page_url']) && !empty($_POST['keywords'])) {
		$result = $ctrl->create($_POST['page_url'], @$_POST['priority'], @$_POST['status'], $_POST['keywords'], $_POST['description']);

		if (!empty($result) && is_array($result)) {
			echo notification('Congratulation! Page Url is added successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	} else {
		echo notification('All fields are required', 'danger');
	}
}


// Fetch read
$seo_lists = $ctrl->allSeoList(true);
?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					<div class="float-left">
						<h5>SEO Pages List</h5>
						<div class="text-muted font-14">
							Here you find all the admins list as well...
						</div>
					</div>

					<div class="float-right pt-3">
						<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addNewPage">
							<i class="fas fa-plus"></i> Add Page</button>
					</div>
				</div>
				<div class="card-body pb-2">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Page URL</th>
									<th scope="col">Priority</th>
									<th scope="col">Status</th>
									<th scope="col">Details</th>
									<th scope="col">Date Modified</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($seo_lists) && is_array($seo_lists)) : ?>
									<?php foreach ($seo_lists as $n => $seo_list) : ?>
										<tr>
											<td><?php echo ++$n; ?></td>
											<td><?php echo $ctrl->decode($seo_list['page_url']); ?></td>
											<td><?php echo $ctrl->decode($seo_list['priority']); ?></td>
											<td><?php echo changeStatus($seo_list['id'], $seo_list['status']); ?></td>
											<td>
												<button class="btn btn-outline-warning btn-sm" name="detailsPreview" data-key="<?php echo $seo_list['keywords']; ?>" data-detail="<?php echo $seo_list['description']; ?>">
													Preview</button>
											</td>
											<td><?php echo dateFormat($seo_list['created_at'], 3); ?></td>

											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editSeoPage" data-eid="<?php echo $seo_list['id']; ?>" data-page_url="<?php echo $ctrl->decode($seo_list['page_url']); ?>" data-priority="<?php echo $seo_list['priority']; ?>" data-status="<?php echo $seo_list['status']; ?>" data-keywords="<?php echo $seo_list['keywords']; ?>" data-description="<?php echo $seo_list['description']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($seo_list['id'], 'deletePageUrl'); ?>
											</td>
										</tr>

									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>

						</table>
					</div>
				</div>
				<div class="card-footer text-muted">
					Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success pt-2 pb-1">
					Profile Details
					<div class="text-muted font-14">Please click to the <code>Preview</code> button for more details...</div>
				</div>
				<div class="card-body py-2">
					<ul class="list-group list-group-flush" id="pageDetails">
						<div class="display-4 font-16 text-center py-2">Page Details Content Appear Here...</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addNewPage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewPageLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Add New Page URL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" autocomplete="off">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Page URL</label>
						<input type="text" class="form-control" name="page_url" placeholder="Enter URL">
					</div>

					<div class="form-group">
						<label for="">Priority</label>
						<select class="custom-select" name="priority">
							<option selected disabled>Please Select..</option>
							<option value="0.50">0.50</option>
							<option value="0.60">0.60</option>
							<option value="0.70">0.70</option>
							<option value="0.80">0.80</option>
							<option value="0.90">0.90</option>

						</select>
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="status">
							<option selected disabled>Please Select..</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Keywords</label>
						<input type="text" class="form-control" name="keywords" placeholder="Enter keywords">
					</div>
					<div class="form-group">
						<label for="">Description</label>
						<input type="text" class="form-control" name="description" placeholder="Enter description">
					</div>
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewPageUrl">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="editSeoPage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editSeoPageLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Edit Seo Page Url</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" autocomplete="off">
				<input type="hidden" name="update_id" value="" />
				<div class="modal-body">
					<div class="form-group">
						<label for="">Page URL</label>
						<input type="text" class="form-control" name="update_page_url" placeholder="Enter URL">
					</div>

					<div class="form-group">
						<label for="">Priority</label>
						<select class="custom-select" name="update_priority">
							<option selected disabled>Please Select..</option>
							<option value="0.50">0.50</option>
							<option value="0.60">0.60</option>
							<option value="0.70">0.70</option>
							<option value="0.80">0.80</option>
							<option value="0.90">0.90</option>

						</select>
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="update_status">
							<option selected disabled>Please Select..</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Keywords</label>
						<input type="text" class="form-control" name="update_keywords" placeholder="Enter keywords">
					</div>
					<div class="form-group">
						<label for="">Description</label>
						<input type="text" class="form-control" name="update_description" placeholder="Enter description">
					</div>
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="updateSeoPage">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		// Edit Data
		$(document).on('click', '.editData', function() {
			const editable = {
				id: $(this).data('eid'),
				page_url: $(this).data('page_url'),
				priority: $(this).data('priority'),
				status: $(this).data('status'),
				keywords: $(this).data('keywords'),
				description: $(this).data('description'),
			}

			if (editable) {
				$('[name="update_id"]').val(editable['id']);
				$('[name="update_page_url"]').val(editable['page_url']);
				$('[name="update_priority"]').val(editable['priority']);
				$('[name="update_status"]').val(editable['status']);
				$('[name="update_keywords"]').val(editable['keywords']);
				$('[name="update_description"]').val(editable['description']);
			}
		});


		$(document).on('click', '[name="detailsPreview"]', function() {
			let pageDetails = {
				keyword: $(this).data('key'),
				details: $(this).data('detail')
			};

			$('#pageDetails').html(`
				<li class="list-group-item d-flex justify-content-between align-items-start py-2">
					<div class="ml-2 my-auto">
						<div class="h6 mb-0">Keywords</div>
						${pageDetails['keyword']}
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start py-2">
					<div class="ml-2 my-auto">
						<div class="h6 mb-0">Description</div>
						${pageDetails['details']}
					</div>
				</li>
			`);
		});
	});
</script>