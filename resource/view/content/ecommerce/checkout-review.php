<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Checkout</li>
			</ol>
		</div>
	</nav>

	<div class="container mb-6">
		<ul class="checkout-progress-bar">
			<li>
				<span>Conform order</span>
			</li>
			<li>
				<span>Shipping</span>
			</li>
			<li class="active">
				<span>Review &amp; Payments</span>
			</li>
		</ul>
		<div class="row">
			<div class="col-lg-4">
				<div class="order-summary">
					<h3>Summary</h3>

					<h4>
						<a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">2 products in Cart</a>
					</h4>

					<div class="collapse" id="order-cart-section">
						<table class="table table-mini-cart">
							<tbody>
								<tr>
									<td class="product-col">
										<figure class="product-image-container">
											<a href="product.php" class="product-image">
												<img src="<?php echo asset('images/ecommerce/products/product-1.jpg'); ?>" alt="product">
											</a>
										</figure>
										<div>
											<h2 class="product-title">
												<a href="product.php">USB Flash</a>
											</h2>

											<span class="product-qty">Qty: 4</span>
										</div>
									</td>
									<td class="price-col">$152.00</td>
								</tr>

								<tr>
									<td class="product-col">
										<figure class="product-image-container">
											<a href="product.php" class="product-image">
												<img src="<?php echo asset('images/ecommerce/products/product-2.jpg'); ?>" alt="product">
											</a>
										</figure>
										<div>
											<h2 class="product-title">
												<a href="product.php">Inline Headset</a>
											</h2>

											<span class="product-qty">Qty: 4</span>
										</div>
									</td>
									<td class="price-col">$192.00</td>
								</tr>
							</tbody>
						</table>
					</div><!-- End #order-cart-section -->
				</div><!-- End .order-summary -->

				<div class="checkout-info-box">
					<h3 class="step-title">Ship To:
						<a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i class="fas fa-pencil"></i></a>
					</h3>

					<address>
						Desmond Mason <br>
						123 Street Name, City, USA <br>
						Los Angeles, California 03100 <br>
						United States <br>
						(123) 456-7890
					</address>
				</div><!-- End .checkout-info-box -->

				<div class="checkout-info-box">
					<h3 class="step-title">Shipping Method:
						<a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i class="fas fa-pencil"></i></a>
					</h3>

					<p>Flat Rate - Fixed</p>
				</div><!-- End .checkout-info-box -->
			</div><!-- End .col-lg-4 -->

			<div class="col-lg-8 order-lg-first">
				<div class="checkout-payment">
					<h2 class="step-title">Payment Method:</h2>

					<h4>Check / Money order</h4>

					<div class="form-group-custom-control">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
							<label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
						</div><!-- End .custom-checkbox -->
					</div><!-- End .form-group -->

					<div id="checkout-shipping-address">
						<address>
							Desmond Mason <br>
							123 Street Name, City, USA <br>
							Los Angeles, California 03100 <br>
							United States <br>
							(123) 456-7890
						</address>
					</div><!-- End #checkout-shipping-address -->

					<div id="new-checkout-address" class="show">
						<form action="#">
							<div class="form-group required-field">
								<label>First Name </label>
								<input type="text" class="form-control" required>
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label>Last Name </label>
								<input type="text" class="form-control" required>
							</div><!-- End .form-group -->

							<div class="form-group">
								<label>Company </label>
								<input type="text" class="form-control">
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label>Street Address </label>
								<input type="text" class="form-control" required>
								<input type="text" class="form-control" required>
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label>City </label>
								<input type="text" class="form-control" required>
							</div><!-- End .form-group -->

							<div class="form-group">
								<label>State/Province</label>
								<div class="select-custom">
									<select class="form-control">
										<option value="CA">California</option>
										<option value="TX">Texas</option>
									</select>
								</div><!-- End .select-custom -->
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label>Zip/Postal Code </label>
								<input type="text" class="form-control" required>
							</div><!-- End .form-group -->

							<div class="form-group">
								<label>Country</label>
								<div class="select-custom">
									<select class="form-control">
										<option value="USA">United States</option>
										<option value="Turkey">Turkey</option>
										<option value="China">China</option>
										<option value="Germany">Germany</option>
									</select>
								</div><!-- End .select-custom -->
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label>Phone Number </label>
								<div class="form-control-tooltip">
									<input type="tel" class="form-control" required>
									<span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="fas fa-question-circle"></i></span>
								</div><!-- End .form-control-tooltip -->
							</div><!-- End .form-group -->

							<div class="form-group-custom-control">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="address-save">
									<label class="custom-control-label" for="address-save">Save in Address book</label>
								</div><!-- End .custom-checkbox -->
							</div><!-- End .form-group -->
						</form>
					</div><!-- End #new-checkout-address -->

					<div class="clearfix">
						<a href="#" class="btn btn-primary float-right">Place Order</a>
					</div><!-- End .clearfix -->
				</div><!-- End .checkout-payment -->

				<div class="checkout-discount">
					<h4>
						<a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Apply Discount Code</a>
					</h4>

					<div class="collapse" id="checkout-discount-section">
						<form action="#">
							<input type="text" class="form-control form-control-sm" placeholder="Enter discount code" required>
							<button class="btn btn-sm btn-outline-secondary" type="submit">Apply Discount</button>
						</form>
					</div><!-- End .collapse -->
				</div><!-- End .checkout-discount -->
			</div><!-- End .col-lg-8 -->
		</div><!-- End .row -->
	</div><!-- End .container -->
</main><!-- End .main -->