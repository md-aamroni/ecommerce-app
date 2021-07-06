<main class="main">
	<section class="home-slider owl-carousel owl-theme owl-carousel-lazy text-uppercase nav-big bg-gray" data-owl-options="{
		'loop': false
	}">
		<div class="home-slide home-slide1 banner">
			<img class="owl-lazy slide-bg" src="<?php echo asset('images/ecommerce/lazy.png'); ?>" data-src="<?php echo asset('images/ecommerce/slider/slide-1.jpg'); ?>" alt="slider image" width="1120" height="500"></img>

			<div class="container">
				<div class="banner-layer banner-layer-middle banner-layer-right">
					<h4 class="text-capitalize m-b-3">Totally Wireless High-Performance</h4>
					<h2 class="m-b-2">Select headphones</h2>
					<h3 class="m-b-2">30% Off</h3>
					<h5 class="d-inline-block pt-2 mb-1 pb-1 ls-n-20 align-middle">Starting AT
						<b class="coupon-sale-text bg-secondary text-white d-inline-block align-sub">$<em class="align-middle">199</em>99</b>
					</h5>
					<a href="category-grid.php" class="btn btn-dark">Shop Now!</a>
				</div>
			</div>
		</div>

		<div class="home-slide home-slide2 banner">
			<img class="owl-lazy slide-bg" src="<?php echo asset('images/ecommerce/lazy.png'); ?>" data-src="<?php echo asset('images/ecommerce/slider/slide-2.jpg'); ?>" alt="slider image" width="1120" height="500"></img>

			<div class="container">
				<div class="banner-layer banner-layer-middle banner-layer-left">
					<h4 class="mb-0">Extra</h4>
					<h3 class="m-b-2">20% off</h3>
					<h3 class="m-b-3 heading-border">Accessories</h3>
					<h2 class="m-b-4">Drones on sale</h2>
					<a href="category-grid.php" class="btn btn-block btn-dark">Shop All Sale</a>
				</div>
			</div>
		</div>
	</section>

	<div class="info-boxes-container bg-gray">
		<div class="container py-3">
			<div class="info-boxes-slider owl-carousel owl-theme py-3" data-owl-options="{
				'dots': false,
				'margin': 20,
				'loop': false,
				'responsive': {
					'576': {
						'items': 2
					},
					'992': {
						'items': 3
					}
				}
			}">
				<div class="info-box info-box-icon-left">
					<i class="fas fa-shipping-fast"></i>

					<div class="info-box-content">
						<h4 class="pb-1">FREE SHIPPING & RETURN</h4>
						<p>Free shipping on all orders over $99</p>
					</div>
				</div>

				<div class="info-box info-box-icon-left">
					<i class="fas fa-dollar-sign"></i>

					<div class="info-box-content">
						<h4 class="pb-1">MONEY BACK GUARANTEE</h4>
						<p>100% money back guarantee</p>
					</div>
				</div>

				<div class="info-box info-box-icon-left">
					<i class="fas fa-headset"></i>

					<div class="info-box-content">
						<h4 class="pb-1">ONLINE SUPPORT 24/7</h4>
						<p>Lorem ipsum dolor sit amet.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="banners-section container mt-4">
		<div class="banners-slider owl-carousel owl-theme dots-mt-1" data-owl-options="{
			'loop': false,
			'nav': false,
			'margin': 20,
			'responsive': {
				'768': {
					'items': 3
				},
				'576': {
					'items': 2
				}
			}
		}">
			<div class="banner">
				<img src="<?php echo asset('images/ecommerce/banners/banner1.jpg'); ?>" width="360" height="280" alt="category banner">
				<div class="banner-content bg-dark text-center">
					<h5 class="m-b-1"><a href="category-grid.php">Save Up To</a></h5>
					<h4 class="text-white m-b-1">$100</h4>
					<h5 class="text-white mb-0">on Porto Watch Series 5</h5>
				</div>
			</div>
			<div class="banner">
				<img src="<?php echo asset('images/ecommerce/banners/banner2.jpg'); ?>" width="360" height="280" alt="category banner">
				<div class="banner-content bg-dark text-center">
					<h5 class="m-b-1"><a href="category-grid.php">Save Up To</a></h5>
					<h4 class="text-white m-b-1">$80</h4>
					<h5 class="text-white mb-0">on Porto Pods Professional</h5>
				</div>
			</div>
			<div class="banner">
				<img src="<?php echo asset('images/ecommerce/banners/banner3.jpg'); ?>" width="360" height="280" alt="category banner">
				<div class="banner-content bg-dark text-center">
					<h5 class="m-b-1"><a href="category-grid.php">Save Up To</a></h5>
					<h4 class="text-white m-b-1">$90</h4>
					<h5 class="text-white mb-0">on Bluetooth Speaker</h5>
				</div>
			</div>
		</div>
	</div>

	<div class="home-product-tabs pt-5 pt-md-0">
		<div class="container">
			<ul class="nav nav-tabs mb-3" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab" aria-controls="featured-products" aria-selected="true">Featured Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="latest-products-tab" data-toggle="tab" href="#latest-products" role="tab" aria-controls="latest-products" aria-selected="false">Latest Products</a>
				</li>
			</ul>
			<div class="tab-content m-b-4">
				<div class="tab-pane fade show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
					<div class="tab-products-carousel owl-carousel owl-theme quantity-inputs show-nav-hover nav-outer nav-image-center">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-1.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-2.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-3.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-5.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-4.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="latest-products" role="tabpanel" aria-labelledby="latest-products-tab">
					<div class="tab-products-carousel owl-carousel owl-theme quantity-inputs show-nav-hover nav-outer nav-image-center">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-5.jpg'); ?>">
									<img src="<?php echo asset('images/ecommerce/products/product-5-2.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-6.jpg'); ?>">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-7.jpg'); ?>">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-8.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="product.php">
									<img src="<?php echo asset('images/ecommerce/products/product-9.jpg'); ?>">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish"><i class="fas fa-heart"></i></a>
								</div>
								<a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category-grid.php" class="product-category">category</a>
								</div>
								<h2 class="product-title">
									<a href="product.php">Product Short Name</a>
								</h2>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:0%"></span>
										<span class="tooltiptext tooltip-top"></span>
									</div>
								</div>
								<div class="price-box">
									<span class="old-price">$49.00</span>
									<span class="product-price">$59.00</span>
								</div>
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="feature-boxes-container">
		<div class="container mt-6 mb-2">
			<div class="row">
				<div class="col-md-4">
					<div class="feature-box px-md-4 mx-md-3 feature-box-simple text-center">
						<i class="fas fa-headset"></i>

						<div class="feature-box-content">
							<h3 class="m-b-1">Customer Support</h3>
							<h5 class="m-b-3">Need Assistance?</h5>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="feature-box px-md-4 mx-md-3 feature-box-simple text-center">
						<i class="far fa-credit-card"></i>

						<div class="feature-box-content">
							<h3 class="m-b-1">Secured Payment</h3>
							<h5 class="m-b-3">Safe &amp; Fast</h5>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="feature-box px-md-4 mx-md-3 feature-box-simple text-center">
						<i class="fas fa-undo-alt"></i>

						<div class="feature-box-content">
							<h3 class="m-b-1">Returns</h3>
							<h5 class="m-b-3">Easy &amp; Free</h5>

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="promo-section bg-gray" data-parallax="{'speed': 1.5, 'enableOnMobile': true}" data-image-src="<?php echo asset('images/ecommerce/banners/promo-bg.png'); ?>">
		<div class="promo-banner banner container text-uppercase">
			<div class="banner-content row align-items-center text-center">
				<div class="col-md-5 col-lg-4 ml-xl-auto text-md-right">
					<h2 class="mb-md-0">Top electronic<br>Deals</h2>
				</div>
				<div class="col-md-3 pb-4 pb-md-0">
					<a href="#" class="btn btn-primary ls-10">View Sale</a>
				</div>
				<div class="col-md-4 mr-xl-auto text-md-left">
					<h4 class="mb-1 coupon-sale-text p-0 d-block ls-10 text-transform-none">
						<b class="bg-dark text-white font1">Exclusive COUPON</b>
					</h4>
					<h5 class="mb-2 coupon-sale-text ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary">$100</b> OFF</h5>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="brands-slider owl-carousel owl-theme images-center mt-4">
			<img src="<?php echo asset('images/ecommerce/brands/brand1.png'); ?>" width="140" height="60" alt="brand">
			<img src="<?php echo asset('images/ecommerce/brands/brand2.png'); ?>" width="140" height="60" alt="brand">
			<img src="<?php echo asset('images/ecommerce/brands/brand3.png'); ?>" width="140" height="60" alt="brand">
			<img src="<?php echo asset('images/ecommerce/brands/brand4.png'); ?>" width="140" height="60" alt="brand">
			<img src="<?php echo asset('images/ecommerce/brands/brand5.png'); ?>" width="140" height="60" alt="brand">
			<img src="<?php echo asset('images/ecommerce/brands/brand6.png'); ?>" width="140" height="60" alt="brand">
		</div>

		<hr class="mt-4 mb-5">

		<div class="product-widgets row pt-1 m-b-2 mb-6">
			<div class="col-md-4 col-sm-6 pb-5">
				<h4 class="section-sub-title text-uppercase m-b-3">Top Rated Products</h4>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-1.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top"></span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-2.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-3.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top"></span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 pb-5">
				<h4 class="section-sub-title text-uppercase m-b-3">Best Selling Products</h4>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-4.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-5.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top"></span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-6.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 pb-5">
				<h4 class="section-sub-title text-uppercase m-b-3">Latest Products</h4>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-7.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>

				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-8.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
				<div class="product-default left-details product-widget mb-2">
					<figure>
						<a href="product.php">
							<img src="<?php echo asset('images/ecommerce/products/small/product-9.jpg'); ?>" width="168" height="168">
						</a>
					</figure>
					<div class="product-details">
						<div class="category-list">
							<a href="category-grid.php" class="product-category">category</a>
						</div>
						<h2 class="product-title">
							<a href="product.php">Product Short Name</a>
						</h2>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top">5.00</span>
							</div>
						</div>
						<div class="price-box">
							<del class="old-price">$59.00</del>
							<span class="product-price">$49.00</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main>