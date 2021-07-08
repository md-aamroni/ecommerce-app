<div class="page-content-wrapper">
	<div class="row justify-content-center align-item-center">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">

					<div class="text-muted font-14 float-left">
						<h5>Add admin</h5>
						Please make sure that, you have followed the instruction...
					</div>

				</div>
				
					<div class="row justify-content-center align-item-center">
						<div class="col-8 col-md-8">
							<div class="card">
								<div class="card-body pb-3">


									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title mt-0" id="myModalLabel">Add admin</h5>
										
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




										</div>
										<div class="modal-footer text-center" style="text-align: center;">
											
											<button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
				

				</div>

				<div class="card-footer text-muted">
					Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-4">
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
				<div class="col-12 col-md-8">
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