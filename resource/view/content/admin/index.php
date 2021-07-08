<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-9">
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
											<th scope="col">#</th>
											<th scope="col">full name</th>
											<th scope="col">image</th>
											<th scope="col">email</th>
											<th scope="col">Status</th>
											<th scope="col">Date Modified</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<!-- table content goes here... -->
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
		<div class="col-12 col-md-3">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					How it Use
					<div class="text-muted font-14">See the following instruction...</div>
				</div>
				<div class="card-body text-muted">
					<form>
						<div class="form-group">
							<label for="">Admin name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter admin name" />
						</div>
						<div class="form-group">
							<label for="">Email Address</label>
							<input type="email" class="form-control" name="email" placeholder="Enter Email Address" />
						</div>
						<div class="form-group">
							<label for="">Phone number</label>
							<input type="tel" class="form-control" name="mobile" placeholder="Enter phone number" />
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Enter password" />
						</div>
						<div class="form-group">
							<label for="">Confirm Password</label>
							<input type="password" class="form-control" name="rePassword" placeholder="Enter password" />
						</div>
						<div class="form-group">
							<label for="">Upload Avatar</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<button class="btn btn-secondary" type="button" id="uploadIcon">
										<i class="fas fa-cloud-upload-alt"></i>
									</button>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input upload" name="avatar" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div1" />
									<label class="custom-file-label fileName pt-2" for="avatar">Choose Logo File</label>
								</div>
							</div>
						</div>
						<div class="form-group my-0">
                     <div id="img"></div>
                  </div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewAdmin">Save changes</button>
						</div>
					</form>
				</div>
			</div>
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
		$(document).on('change', '[name="avatar"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});
	});
</script>




<!--
<div id="addAdminInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addAdminInfoLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Add admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="cuponName">Admin name</label>
						<input type="text" class="form-control" id="cuponName" aria-describedby="emailHelp" placeholder="Enter admin name">
					</div>
					<div class="form-group">
						<label for="adminEmail">Email Address</label>
						<input type="email" class="form-control" id="adminEmail" placeholder="Enter Email Address ">
					</div>
					<div class="form-group">
						<label for="adminPhone">Phone number</label>
						<input type="number" class="form-control" id="adminPhone" placeholder="Enter phone number ">
					</div>
					<div class="form-group">
						<label for="durationOffer">Password</label>
						<input type="password" class="form-control" id="adminPassword" placeholder="Enter password">
					</div>
					<div class="form-group">
						<label for="imageAdmin">admin image</label>
						<input type="file" class="form-control" id="imageAdmin" placeholder="select image">
					</div>
					<div class="modal-footer text-center" style="text-align: center;">
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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
-->
