<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">My Account</li>
			</ol>
		</div>
	</nav>

	<div class="container mb-5">
		<div class="row">
			<div class="col-lg-9 order-lg-last dashboard-content">
				<h2>Edit Account Information</h2>

				<form action="#">
					<div class="row">
						<div class="col-sm-11">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group required-field">
										<label for="acc-name">First Name</label>
										<input type="text" class="form-control" id="acc-name" name="acc-name" required>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="acc-mname">First Name</label>
										<input type="text" class="form-control" id="acc-mname" name="acc-mname">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group required-field">
										<label for="acc-lastname">Last Name</label>
										<input type="text" class="form-control" id="acc-lastname" name="acc-lastname" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group required-field">
						<label for="acc-email">Email</label>
						<input type="email" class="form-control" id="acc-email" name="acc-email" required>
					</div>

					<div class="form-group required-field">
						<label for="acc-password">Password</label>
						<input type="password" class="form-control" id="acc-password" name="acc-password" required>
					</div>

					<div class="mb-2"></div>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="change-pass-checkbox" value="1">
						<label class="custom-control-label" for="change-pass-checkbox">Change Password</label>
					</div>

					<div id="account-chage-pass">
						<h3 class="mb-2">Change Password</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="acc-pass2">Password</label>
									<input type="password" class="form-control" id="acc-pass2" name="acc-pass2">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="acc-pass3">Confirm Password</label>
									<input type="password" class="form-control" id="acc-pass3" name="acc-pass3">
								</div>
							</div>
						</div>
					</div>

					<div class="required text-right">* Required Field</div>
					<div class="form-footer">
						<a href="#"><i class="fas fa-angle-double-left"></i>Back</a>

						<div class="form-footer-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>

			<aside class="sidebar col-lg-3">
				<div class="widget widget-dashboard">
					<h3 class="widget-title">My Account</h3>

					<ul class="list">
						<li class="active"><a href="#">Account Dashboard</a></li>
						<li><a href="#">Account Information</a></li>
						<li><a href="#">Address Book</a></li>
						<li><a href="#">My Orders</a></li>
						<li><a href="#">Billing Agreements</a></li>
						<li><a href="#">Recurring Profiles</a></li>
						<li><a href="#">My Product Reviews</a></li>
						<li><a href="#">My Tags</a></li>
						<li><a href="#">My Wishlist</a></li>
						<li><a href="#">My Applications</a></li>
						<li><a href="#">Newsletter Subscriptions</a></li>
						<li><a href="#">My Downloadable Products</a></li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</main>