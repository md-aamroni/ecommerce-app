<?php

use App\Http\Controllers\CategoryController;

$ctrl = new CategoryController;


if (isset($_POST['changeStatus'])) {
	$result = $ctrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('success', 'Congratulation! Status is changed successfully');
	} else {
		echo notification('warning', 'Oops! Something went wrong, please retry...');
	}
}


if (isset($_POST['addNewCategory'])) {
	if (!empty($_POST['title'])) {
		$result = $ctrl->create($_POST['title'], $_POST['isFeatured'], $_POST['status']);

		if (!empty($result) && is_array($result)) {
			echo notification('Congratulation! Data is added successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	} else {
		echo notification('All fields are required', 'danger');
	}
}


$categories = $ctrl->allCategories(true);
?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					<div class="float-left">
						Categories Lists
						<div class="text-muted font-14">
							Here you find all the admins list as well...
						</div>
					</div>
					<div class="float-right pt-2">
						<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addNewCategory">
							<i class="fas fa-plus"></i> Add New Category
						</button>
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
									<?php foreach($categories as $n => $category) : ?>

										<tr>
											<td><?php echo ++$n; ?></td>
											<td><?php echo $category['title']; ?></td>
											<td><?php echo ++$n; ?></td>
											<td><?php echo $category['is_featured']; ?></td>
											<td><?php echo changeStatus($category['id'], $category['status']); ?></td>
											<td><?php echo dateFormat($category['created_at'], 3); ?></td>
											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editCategory" data-eid="<?php echo $category['id']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($category['id'], 'deleteCategory'); ?>
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

<script type="text/javascript">
	//File Size Reader
	function bytesToSize(bytes) {
		let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

	$(document).ready(function() {
		//Image Preview
		$(document).on('change', '[name="banner"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});
	});
</script>
