<?php

use App\Http\Controllers\CategoryController;

$ctrl = new CategoryController;

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


// Update Data
if (isset($_POST['changeStatus'])) {
	$result = $ctrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}

if (isset($_POST['updateCategory'])) {
	$result = $ctrl->update($_POST['update_title'], $_POST['update_is_featured'], $_POST['update_status'], $_POST['update_id']);
	if ($result) {
		echo notification('Congratulation! Data is updated successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong', 'warning');
	}
}


// Create Data
if (isset($_POST['addNewCategory'])) {
	if (!empty($_POST['title'])) {
		$result = $ctrl->create($_POST['title'], @$_POST['isFeatured'], @$_POST['status']);

		if (!empty($result) && is_array($result)) {
			echo notification('Congratulation! Data is added successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	} else {
		echo notification('All fields are required', 'danger');
	}
}


// Read Data
$categories = $ctrl->allCategories(true);
?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					<div class="float-left">
					<h5>Categories Lists</h5> 	
						<div class="text-muted font-14">
							Here you find all the admins list as well...
						</div>
					</div>

					<div class="float-right pt-3">
						<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addNewCategory">
							<i class="fas fa-plus"></i> Add New Category</button>
					</div>
				</div>
				<div class="card-body pb-3">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Slug</th>
									<th scope="col">Is Featured</th>
									<th scope="col">Status</th>
									<th scope="col">Date Modified</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($categories) && is_array($categories)) : ?>
									<?php foreach ($categories as $n => $category) : ?>

										<tr>
											<td><?php echo ++$n; ?></td>
											<td><?php echo $ctrl->decode($category['title']); ?></td>
											<td><?php echo $ctrl->decode($category['slug']); ?></td>
											<td><?php echo $category['is_featured']; ?></td>
											<td><?php echo changeStatus($category['id'], $category['status']); ?></td>
											<td><?php echo dateFormat($category['created_at'], 3); ?></td>
											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editCategory" data-eid="<?php echo $category['id']; ?>" data-title="<?php echo $ctrl->decode($category['title']); ?>" data-featured="<?php echo $category['is_featured']; ?>" data-status="<?php echo $category['status']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($category['id'],'deleteCategory'); ?>
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
</div>

<div id="addNewCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewCategoryLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Add New Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" autocomplete="off">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" class="form-control" name="title" placeholder="Enter Title">
					</div>
					<div class="form-group">
						<label for="">Is Featured</label>
						<select class="custom-select" name="isFeatured">
							<option selected disabled>Please Select..</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
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
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewCategory">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="editCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Edit Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" autocomplete="off">
				<input type="hidden" name="update_id" value="" />
				<div class="modal-body">
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" class="form-control" name="update_title" value="" />
					</div>
					<div class="form-group">
						<label for="">Is Featured</label>
						<select class="custom-select" name="update_is_featured">
							<option selected disabled>Please Select..</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
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
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="updateCategory">Confirm and Submit</button>
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
				title: $(this).data('title'),
				featured: $(this).data('featured'),
				status: $(this).data('status'),
			}

			if (editable) {
				$('[name="update_id"]').val(editable['id']);
				$('[name="update_title"]').val(editable['title']);
				$('[name="update_is_featured"]').val(editable['featured']);
				$('[name="update_status"]').val(editable['status']);
			}
		});
	});
</script>