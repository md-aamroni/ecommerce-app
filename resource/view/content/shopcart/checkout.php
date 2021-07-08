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
			<li class="active">
				<span>Conform order</span>
			</li>
			<li >
				<span>Shipping</span>
			</li>
			<li>
				<span>Review &amp; Payments</span>
			</li>
		</ul>
		<div class="row">
			<div class="col-lg-8">
				<ul class="checkout-steps">
					<li>
						<h2 class="step-title">Shipping Address</h2>

						<div class="shipping-step-addresses">
							<div class="shipping-address-box active">
								<address>
									Desmond Mason <br>
									123 Street Name, City Name <br>
									Los Angeles, California 03100 <br>
									United States <br>
									(123) 456-7890 <br>
								</address>

								<div class="address-box-action clearfix">
									<a href="#" class="btn btn-sm btn-link">
										Edit
									</a>

									<a href="#" class="btn btn-sm btn-outline-secondary float-right">
										Ship Here
									</a>
								</div>
							</div>
							<div class="shipping-address-box">
								<address>
									Susan Mason <br>
									123 Street Name, City Name <br>
									Los Angeles, California 03100 <br>
									United States <br>
									(123) 789-6150 <br>
								</address>

								<div class="address-box-action clearfix">
									<a href="#" class="btn btn-sm btn-link">
										Edit
									</a>

									<a href="#" class="btn btn-sm btn-outline-secondary float-right">
										Ship Here
									</a>
								</div>
							</div>
						</div>
						<a href="#" class="btn btn-sm btn-outline-secondary btn-new-address" data-toggle="modal" data-target="#addressModal">+ New Address</a>
					</li>

					<li>
						<div class="checkout-step-shipping">
							<h2 class="step-title">Shipping Methods</h2>

							<table class="table table-step-shipping">
								<tbody>
									<tr>
										<td><input type="radio" name="shipping-method" value="flat"></td>
										<td><strong>$20.00</strong></td>
										<td>Fixed</td>
										<td>Flat Rate</td>
									</tr>

									<tr>
										<td><input type="radio" name="shipping-method" value="best"></td>
										<td><strong>$15.00</strong></td>
										<td>Table Rate</td>
										<td>Best Way</td>
									</tr>
								</tbody>
							</table>
						</div>
					</li>
				</ul>
			</div>

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
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-steps-action">
					<a href="checkout-review.php" class="btn btn-primary float-right">NEXT</a>
				</div>
			</div>
		</div>
	</div>
</main>