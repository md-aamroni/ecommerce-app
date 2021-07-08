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
									<th scope="col">Title</th>
									<th scope="col">Slug</th>
									<th scope="col">Image</th>
									<th scope="col">Avlible products</th>
									<th scope="col">Status</th>
									<th scope="col">Date Modified</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- table content goes here.. -->
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
				<h5 class="modal-title mt-0">Add New Sub-Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Category name</label>
						<input type="text" class="form-control" placeholder="Enter Category name">
					</div>
					<div class="form-group">
						<label for="">Category slug</label>
						<input type="text" class="form-control" placeholder="Enter Category slug ">
					</div>
					<div class="form-group">
						<label for="">Category slug</label>
						<select name="" id="" class="custom-select">
							<option value=""></option>
							<option value=""></option>
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
				</div>
				<div class="modal-footer py-2	">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
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
