<?php
use App\Http\Controllers\AdminController;
$adminCtrl = new AdminController;





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


// Update Status
if (isset($_POST['changeStatus'])) {
	$result = $adminCtrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}


// Update Data
if (isset($_POST['updateAdmin'])) {
	if (!empty($_FILES['banner']['name'])) {
		$banner	= uniqid() . '_admin_profile_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $adminCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $adminCtrl->update($_POST['edit_admin_name'], $_POST['edit_admin_email'], $_POST['edit_admin_Password'], $_POST['edit_admin_roles'], $_POST['editAdminImage'], $_POST['edit_admin_status'], $_POST['editAdminId']);
			if ($result) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['admin'] . $banner);
				unlink('./../' . $GLOBALS['upDir']['admin'] . $_POST['editAdminImage']);
				echo notification('Congratulation! Data is updated successfully', 'success');
			} else {
				echo notification('Oops! Something went wrong', 'warning');
			}
		} else {
			echo notification('File Error! Please upload a valid file', 'danger');
		}
	} else {
		$result = $adminCtrl->update($_POST['edit_admin_name'], $_POST['edit_admin_email'], $_POST['edit_admin_Password'], $_POST['edit_admin_roles'], $_POST['banner'], $_POST['edit_admin_status'], $_POST['editAdminId']);
		if ($result) {
			echo notification('Congratulation! Data is updated successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong, please retry...', 'warning');
		}
	}
}




// Create Data
if (isset($_POST['submit'])) {
	if (!empty($_POST['adminName']) && !empty($_POST['adminEmail']) && !empty($_POST['adminPassword'])  && !empty($_FILES['banner']['name'])) {

		$banner	= date('Y_m_d_His') . uniqid() . '_admin_profile_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $adminCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $adminCtrl->create($_POST['adminName'], $_POST['userName'], $_POST['adminEmail'], $_POST['adminPassword'], $_POST['roles'], $banner, $_POST['status']);
			if (!empty($result) && is_array($result)) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['admin'] . $banner);
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
$readAdmin = $adminCtrl->allAdminController(true);
$admin_images = $readAdmin['banner'];
print_r($admin_images);
?>


<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header font-16 mt-0 bg-light border-success py-2">
							<div class="float-left">
								Admin Lists 
								<div class="text-muted font-14">
									Here you find all the admins list as well...
								</div>
							</div>
							<div class="float-right pt-2">
								<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addAdminInfo">
									<i class="fas fa-plus"></i> Add New Admin
								</button>
							</div>
						</div>
						<div class="card-body pb-3">
							<div class="table-responsive">
								<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">full name</th>
											<th scope="col">User name</th>
											<th scope="col">email</th>
											<th scope="col">password</th>
											<th scope="col">roles</th>
											<th scope="col">image</th>
											<th scope="col">Status</th>
											<th scope="col">Date Modified</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php if (!empty($readAdmin) && is_array($readAdmin)) : ?>
											<?php foreach ($readAdmin as $n => $adminList) : ?>

												<?php
												if (!empty($adminList['banner']) && file_exists('./../' . $GLOBALS['upDir']['admin']  . $adminList['banner'])) :
													$bannerImage = './../' . $GLOBALS['upDir']['admin']  . $adminList['banner'];
												else :
													$bannerImage = asset('images/placeholder.jpg');
												endif;



												?>

												<tr>
													<td class="text-center font-weight-bold">
														<?php echo ++$n; ?></td>

													<td><?php echo $adminList['full_name']; ?></td>
													<td><?php echo $adminList['user_name']; ?></td>
													<td><?php echo $adminList['email']; ?></td>
													<td><?php echo $adminList['password']; ?></td>
													<td><?php echo $adminList['roles']; ?></td>

												<?php  $admin_images = $_SESSION['banner'] = $adminList['banner'];
														 ?>

													<td>
														<button type="button" class="btn btn-light btn-sm waves-effect waves-light previewBannerImage" data-toggle="modal" data-target="#previewBannerImage" data-image="<?php echo $bannerImage; ?>">
															<i class="fas fa-eye"></i> View
														</button>
													</td>
													<td><?php echo changeStatus($adminList['id'], $adminList['status']); ?></td>
													<!--
													<td><?php //echo dateFormat($adminList['created_at'], 3); 
														?></td>

														-->
													<td class="d-flex">
														<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editAdmin" data-eid="<?php echo $adminList['id']; ?>" data-email="<?php echo $adminList['email']; ?>" data-full_name="<?php echo $adminList['full_name']; ?>" data-password="<?php echo $adminList['password']; ?>" data-roles="<?php echo $adminList['roles']; ?>" data-image="<?php echo $adminList['banner']; ?>" data-filepath="<?php echo $bannerImage; ?>" data-status="<?php echo $adminList['status']; ?>">
															<i class="fas fa-pencil-alt mr-1"></i> Edit
														</button>
														<?php echo deleteButton($adminList['id'], 'deleteAdmin', './../' . $GLOBALS['upDir']['admin']  . $adminList['banner']); ?>
													</td>
												</tr>

											<?php endforeach; ?>
											<?

											?>
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
				<div class="col-md-4">
					<div class="card">
						<div class="card-header font-16 mt-0 bg-light border-success py-2">
							How it Use
							<div class="text-muted font-14">See the following instruction...</div>
						</div>
						<div class="card-body text-muted">
							<div class="font-12">1. To change items status please click the status <code class="ml-1">button</code></div>
							<div class="font-12">2. To preview details about admin, please click the profile <code class="ml-1">button</code></div>
							<div class="font-12">3. <code>[recommanded]</code> To avoid any error make sure all the fields are filled as required during add an item</div>
							<div class="font-12">4. <code>[recommanded]</code> To delete an item, may not works due to using anywhere else</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-header font-16 mt-0 bg-light border-success pt-2 pb-1">
							<div class="float-left">
								Profile Details
								<div class="text-muted font-14">Please click to the <code>Preview</code> button for more details...</div>
							</div>
							<div class="float-right">
								<img src="<?php echo asset('images/placeholder.jpg'); ?>" alt="Profile Image" id="profileImage" class="thumb-md rounded-circle">
							</div>
						</div>
						<div class="card-body" id="profileDetails">
							<div class="display-4 font-16 text-center text-muted">Doctor Profile Details Appear Here..</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>







<div id="addAdminInfo" class="modal fade" tabindex="-1" roles="dialog" aria-labelledby="addAdminInfoLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Add new admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form autocomplete="off" method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="adminName">Admin name</label>
						<input type="text" class="form-control" name="adminName" aria-describedby="emailHelp" placeholder="Enter admin name">
					</div>
					<div class="form-group">
						<label for="userName">Admin username</label>
						<input type="text" class="form-control" name="userName" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="adminEmail">Email Address</label>
						<input type="email" class="form-control" name="adminEmail" placeholder="Enter Email Address ">
					</div>
					<div class="form-group">
						<label for="">roles</label>
						<select class="custom-select" name="roles">
							<option selected disabled>Please Select..</option>
							<option value="Root Admin">Root Admin</option>
							<option value="Administrator">Administrator</option>
							<option value="Manager">Manager</option>
							<option value="Accountant">Accountant</option>

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
						<label for="durationOffer">Password</label>
						<input type="password" class="form-control" name="adminPassword" placeholder="Enter password">
					</div>
					<div class="form-group">
						<label for="durationOffer">Confirm Password</label>
						<input type="password" class="form-control" name="ConAdminPassword" placeholder="Enter confirm password">
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
					<div class="modal-footer text-center" style="text-align: center;">
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Save me</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" tabindex="-1" roles="dialog" id="previewBannerImage" aria-labelledby="previewBannerImageModal" aria-hidden="true">
	<div class="modal-dialog" roles="document">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Admin Banner Image</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body pb-3 text-center">
				<img src="" id="adminBannerImage" alt="Admin Banner Image" class="img-fluid" style="max-height:340px;">
			</div>
		</div>
	</div>
</div>


<div id="editAdmin" class="modal fade" tabindex="-1" roles="dialog" aria-labelledby="editSubCategoryLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Edit Admin</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" class="form-control" name="editAdminId">
				<input type="hidden" class="form-control" name="editAdminImage">
				<div class="modal-body">
					<div class="form-group">
						<label for="edit_admin_name">Admin name</label>
						<input type="text" class="form-control" name="edit_admin_name" value="">
					</div>
					<div class="form-group">
						<label for="edit_admin_email">Email Address</label>
						<input type="email" class="form-control" name="edit_admin_email" value="">
					</div>
					<div class="form-group">
						<label for="">roles</label>
						<select class="custom-select" name="edit_admin_roles">
							<option selected disabled>Please Select..</option>
							<option value="Root Admin">Root Admin</option>
							<option value="Administrator">Administrator</option>
							<option value="Manager">Manager</option>
							<option value="Accountant">Accountant</option>

						</select>
					</div>


					<div class="form-group">
						<label for="edit_admin_Password">Password</label>
						<input type="password" class="form-control" name="edit_admin_Password" value="">
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
						<select class="custom-select" name="edit_admin_status">
							<option selected disabled>Please Select..</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>
				</div>
				<div class="modal-footer py-2	">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="updateAdmin">Confirm and Submit</button>
				</div>
			</form>
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
				$('#adminBannerImage').attr('src', image);
			}
		});


		// Edit Data
		$(document).on('click', '.editData', function() {
			const editable = {
				id: $(this).data('eid'),
				full_name: $(this).data('full_name'),
				email: $(this).data('email'),
				image: $(this).data('image'),
				password: $(this).data('password'),
				roles: $(this).data('roles'),
				filepath: $(this).data('filepath'),
				status: $(this).data('status'),
			}

			if (editable) {
				$('[name="editAdminId"]').val(editable['id']);
				$('[name="editAdminImage"]').val(editable['image']);
				$('[name="edit_admin_name"]').val(editable['full_name']);
				$('[name="edit_admin_email"]').val(editable['email']);
				$('[name="edit_admin_Password"]').val(editable['password']);
				$('[name="edit_admin_roles"]').val(editable['roles']);
				$('.fileName').html(editable['image']);
				$('#updateImg').html('<img src="' + editable['filepath'] + '" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/>');
				$('[name="edit_admin_status"]').val(editable['status']);
			}
		});
	});
</script>