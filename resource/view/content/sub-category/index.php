<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">

					<div class="text-muted font-14 float-left">
						<h5>sub-category Lists</h5>
						Please make sure that, you have followed the instruction...
					</div>
					<div class="float-right">
						<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add sub-category</button>
					</div>

					<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title mt-0" id="myModalLabel">Add sub-category</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="subCategoryName">sub-category name</label>
											<input type="text" class="form-control" id="subCategoryName" aria-describedby="emailHelp" placeholder="Enter Sub-Category name">
										
										</div>
										<div class="form-group">
											<label for="sub-category_slug">sub-category slug</label>
											<input type="text" class="form-control" id="sub-category_slug" placeholder="Enter sub-category slug">

										</div>
										<div class="form-group">
											<label for="offerForCupon">under category</label>
											<select name="adminCategory" id="adminCategory" class="form-control" required>
											
											<option value="" >Select category</option>
											<option value="mobile">mobile</option>
											</select>

										</div>

										

								</div>
								<div class="modal-footer text-center" style="text-align: center;">
									<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
									</form>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>

				<div class="card-body pb-3">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Departments</th>
									<th scope="col">Profile</th>
									<th scope="col">Status</th>
									<th scope="col">Date Modified</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
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