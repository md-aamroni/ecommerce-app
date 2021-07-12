<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

$catCtrl = new CategoryController;
$subCtrl = new SubCategoryController;


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
	$result = $subCtrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}

if (isset($_POST['updateSubCategory'])) {
	if (!empty($_FILES['banner']['name'])) {
		$banner	= date('Y_m_d_His') . uniqid() . '_sub_category_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $subCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $subCtrl->update($_POST['update_category'], $_POST['update_title'], $banner, $_POST['update_status'], $_POST['update_id']);
			if ($result) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['subCat'] . $banner);
				unlink('./../' . $GLOBALS['upDir']['subCat'] . $_POST['update_image']);
				echo notification('Congratulation! Data is updated successfully', 'success');
			} else {
				echo notification('Oops! Something went wrong', 'warning');
			}
		} else {
			echo notification('File Error! Please upload a valid file', 'danger');
		}
	} else {
		$result = $subCtrl->update($_POST['update_category'], $_POST['update_title'], $_POST['update_image'], $_POST['update_status'], $_POST['update_id']);
		if ($result) {
			echo notification('Congratulation! Data is updated successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong, please retry...', 'warning');
		}
	}
}


// Create Data
if (isset($_POST['addNewSubCategory'])) {
	if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_FILES['banner']['name'])) {

		$banner	= date('Y_m_d_His') . uniqid() . '_sub_category_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $subCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $subCtrl->create($_POST['category'], $_POST['title'], $banner, $_POST['status']);
			if (!empty($result) && is_array($result)) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['subCat'] . $banner);
				echo notification('Congratulation! Data is added successfully', 'success');
			} else {
				echo notification('Oops! Something went wrong', 'warning');
			}
		} else {
			echo notification('File Error! Please upload a valid file', 'danger');
		}
	} else {
		echo notification('Validation Error, All fields are required', 'error');
	}
}


// Read Data
$categories = $catCtrl->isActive();
$subCategories = $subCtrl->allSubCategories(true);

?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					<div class="float-left">
						Sub Categories Lists
						<div class="text-muted font-14">
							Here you find all the admins list as well...
						</div>
					</div>
					<div class="float-right pt-2">
						<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addNewSubCategory">
							<i class="fas fa-plus"></i> Add New Sub-Category
						</button>
					</div>
				</div>
				<div class="card-body pb-3">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Category</th>
									<th scope="col">Title</th>
									<th scope="col">Slug</th>
									<th scope="col">Is Stock</th>
									<th scope="col">Preview</th>
									<th scope="col">Status</th>
									<th scope="col">Date Modified</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($subCategories) && is_array($subCategories)) : ?>
									<?php foreach ($subCategories as $n => $subCategory) : ?>

										<?php
										if (!empty($subCategory['banner']) && file_exists('./../' . $GLOBALS['upDir']['subCat']  . $subCategory['banner'])) :
											$bannerImage = './../' . $GLOBALS['upDir']['subCat']  . $subCategory['banner'];
										else :
											$bannerImage = asset('images/placeholder.jpg');
										endif;

										$categoryTitle = $catCtrl->isExist($subCategory['category_id']);
										?>

										<tr>
											<td class="text-center font-weight-bold"><?php echo ++$n; ?></td>
											<td><?php echo $categoryTitle[0]['title']; ?></td>
											<td><?php echo $subCtrl->decode($subCategory['title']); ?></td>
											<td><?php echo $subCategory['slug']; ?></td>
											<td><?php echo $subCategory['is_stock']; ?></td>
											<td>
												<button type="button" class="btn btn-light btn-sm waves-effect waves-light previewBannerImage" data-toggle="modal" data-target="#previewBannerImage" data-image="<?php echo $bannerImage; ?>">
													<i class="fas fa-eye"></i> View
												</button>
											</td>
											<td><?php echo changeStatus($subCategory['id'], $subCategory['status']); ?></td>
											<td><?php echo dateFormat($subCategory['created_at'], 3); ?></td>
											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editSubCategory" data-eid="<?php echo $subCategory['id']; ?>" data-category="<?php echo $subCategory['category_id']; ?>" data-title="<?php echo $subCategory['title']; ?>" data-image="<?php echo $subCategory['banner']; ?>" data-filepath="<?php echo $bannerImage; ?>" data-status="<?php echo $subCategory['status']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($subCategory['id'], 'deleteSubCategory', './../' . $GLOBALS['upDir']['subCat']  . $subCategory['banner']); ?>
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


<div id="addNewSubCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewSubCategoryLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Add New Sub Category</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Sub Category Title</label>
						<input type="text" class="form-control" name="title" placeholder="Enter Title">
					</div>
					<div class="form-group">
						<label for="">Category</label>
						<select class="custom-select" name="category">
							<option selected disabled>Please Select</option>
							<?php if (!empty($categories) && is_array($categories)) : ?>
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Upload Banner</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<button class="btn btn-secondary" type="button" id="uploadIcon">
									<i class="fas fa-cloud-upload-alt"></i>
								</button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input upload" name="banner" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div1" />
								<label class="custom-file-label fileName pt-2" for="banner">Choose Logo File</label>
							</div>
						</div>
					</div>
					<div class="form-group my-0">
						<div id="img"></div>
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
				<div class="modal-footer py-2	">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewSubCategory">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="editSubCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editSubCategoryLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Edit Sub Category</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="update_id" value="">
				<input type="hidden" name="update_image" value="">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Sub Category Title</label>
						<input type="text" class="form-control" name="update_title" value="">
					</div>
					<div class="form-group">
						<label for="">Category</label>
						<select class="custom-select" name="update_category">
							<option selected disabled>Please Select</option>
							<?php if (!empty($categories) && is_array($categories)) : ?>
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Upload Banner</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<button class="btn btn-secondary" type="button" id="uploadIcon">
									<i class="fas fa-cloud-upload-alt"></i>
								</button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input upload" name="banner" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div2" />
								<label class="custom-file-label fileName pt-2" for="banner">Choose Logo File</label>
							</div>
						</div>
					</div>
					<div class="form-group my-0">
						<div id="updateImg"></div>
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
				<div class="modal-footer py-2	">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="updateSubCategory">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="previewBannerImage" aria-labelledby="previewBannerImageModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Sub Category Banner Image</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body pb-3 text-center">
				<img src="" id="subCategoryBannerImage" alt="Sub Category Banner Image" class="img-fluid" style="max-height:340px;">
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	// File Size Reader
	function bytesToSize(bytes) {
		let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}


	$(document).ready(function() {
		// Image Preview
		$(document).on('change', '[name="banner"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});

		$(document).on('change', '[name="banner"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#updateImg').html('<img src="" class="img-fluid" alt="..." id="div2" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});


		// Banner Image Preview from Table
		$(document).on('click', '.previewBannerImage', function() {
			let image = $(this).data('image');

			if (image) {
				$('#subCategoryBannerImage').attr('src', image);
			}
		});


		// Edit Data
		$(document).on('click', '.editData', function() {
			const editable = {
				id: $(this).data('eid'),
				category: $(this).data('category'),
				title: $(this).data('title'),
				image: $(this).data('image'),
				filepath: $(this).data('filepath'),
				status: $(this).data('status'),
			}

			if (editable) {
				$('[name="update_id"]').val(editable['id']);
				$('[name="update_image"]').val(editable['image']);
				$('[name="update_title"]').val(editable['title']);
				$('[name="update_category"]').val(editable['category']);
				$('.fileName').html(editable['image']);
				$('#updateImg').html('<img src="' + editable['filepath'] + '" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/>');
				$('[name="update_status"]').val(editable['status']);
			}
		});
	});
</script>
