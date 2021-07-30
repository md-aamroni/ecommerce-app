<div class="page-content-wrapper">
	<div class="row justify-content-center align-item-center">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">

					<div class="text-muted font-14 float-left">
						<h5>Edit Product</h5>
						Please make sure that, you have followed the instruction...
					</div>
				</div>
				<div class="row justify-content-center align-item-center">
					<div class="col-10 col-md-10">
						<div class="form-body mt-3">
							<form>
								<div class="form-group">
									<label for="">Category</label>
									<select class="custom-select" name="category">
										<option selected disabled>Please Select..</option>
										<option value="Active">Category-1</option>
										<option value="Inactive">Category-2</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Sub Category</label>
									<select class="custom-select" name="subCategory">
										<option selected disabled>Please Select..</option>
										<option value="Active">Sub Category-1</option>
										<option value="Inactive">Sub Category-2</option>
									</select>
								</div>
								<div class="form-group">
									<label for="adminEmail">Product Name</label>
									<input type="text" name="productName" class="form-control" placeholder="Enter Product Name ">
								</div>
								<div class="form-group">
									<label for="">Product Details</label>
									<textarea name="details" id="summernote"></textarea>
								</div>
								<div class="form-group">
									<label for="">Product Price</label>
									<input type="number" name="price" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Product Quantity</label>
									<input type="number" name="quantity" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Product Status</label>
									<select class="custom-select" name="productStatus">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Product Feature</label>
									<select class="custom-select" name="productFeature">
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Upload Product Image</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<button class="btn btn-secondary" type="button" id="uploadIcon">
												<i class="fas fa-cloud-upload-alt"></i>
											</button>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input upload" name="productImage" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div2" />
											<label class="custom-file-label fileName pt-2" for="">Choose Logo File</label>
										</div>
									</div>
								</div>
								<div class="form-group my-0">
									<div id="updateImg"></div>
								</div>
								<div class="form-group">
									<label for="">Upload More Image</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<button class="btn btn-secondary" type="button" id="uploadIcon">
												<i class="fas fa-cloud-upload-alt"></i>
											</button>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input upload" name="moreProductImage" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div3" />
											<label class="custom-file-label fileName pt-2" for="">Choose Logo File</label>
										</div>
										<button type="submit" class="btn btn-primary waves-effect waves-light">Add More</button>
									</div>
								</div>
								<div class="form-group my-0">
									<div id="moreImg"></div>
								</div>
								<div class="form-group">
									<label for="">Product Tags</label>
									<input type="text" name="productTag" class="form-control">
								</div>
								<div class="modal-footer text-center" style="text-align: center;">

									<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
							</form>
						</div>
					</div>
				</div>
				<div class="card-footer text-muted">
					Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
				</div>
			</div>

		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
	// File Size Reader
	function bytesToSize(bytes) {
		let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

	$(document).ready(function() {
		$('#summernote').summernote({
			placeholder: 'Product Details content goes here..',
			tabsize: 2,
			height: 80,
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
		//Upload Product Image Preview
		$(document).on('change', '[name="productImage"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});

		$(document).on('change', '[name="productImage"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#updateImg').html('<img src="" class="img-fluid" alt="..." id="div2" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});

		//Upload More Product Image Preview
		$(document).on('change', '[name="moreProductImage"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid1');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});

		$(document).on('change', '[name="moreProductImage"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid1');
			$('#moreImg').html('<img src="" class="img-fluid" alt="..." id="div3" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});


		// Banner Image Preview from Table
		$(document).on('click', '.previewBannerImage', function() {
			let image = $(this).data('image');

			if (image) {
				$('#subCategoryBannerImage').attr('src', image);
			}
		});

	});
</script>