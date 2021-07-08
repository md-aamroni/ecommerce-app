<main class="main">
   <div class="promo-section bg-gray" data-parallax="{'speed': 1.5, 'enableOnMobile': true, 'offset': 24 }" data-image-src="<?php echo asset('images/ecommerce/banners/promo-bg.png'); ?>">
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
               <h5 class="mb-0 coupon-sale-text ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary">$100</b> OFF</h5>
            </div>
         </div>
      </div>
   </div>

   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Men</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accessories</li>
         </ol>
      </div>
   </nav>

   <div class="container products-body mb-3">
      <nav class="toolbox horizontal-filter filter-sorts">
         <div class="sidebar-overlay d-lg-none"></div>
         <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
         <aside class="toolbox-left sidebar-shop mobile-sidebar">
            <div class="toolbox-item toolbox-sort select-custom">
               <a class="sort-menu-trigger" href="#">Size</a>
               <ul class="sort-list">
                  <li><a href="#">Extra Large</a></li>
                  <li><a href="#">Large</a></li>
                  <li><a href="#">Medium</a></li>
                  <li><a href="#">Small</a></li>
               </ul>
            </div><!-- End .toolbox-item -->

            <div class="toolbox-item toolbox-sort select-custom">
               <a class="sort-menu-trigger" href="#">Color</a>
               <ul class="sort-list">
                  <li><a href="#">Black</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Brown</a></li>
                  <li><a href="#">Green</a></li>
                  <li><a href="#">Indigo</a></li>
                  <li><a href="#">Light Blue</a></li>
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Yellow</a></li>
               </ul>
            </div><!-- End .toolbox-item -->

            <div class="toolbox-item toolbox-sort price-sort select-custom">
               <a class="sort-menu-trigger" href="#">Price</a>
               <div class="sort-list">
                  <form class="filter-price-form d-flex align-items-center m-0">
                     <input class="input-price mr-2" name="min_price" placeholder="55" /> -
                     <input class="input-price mx-2" name="max_price" placeholder="111" />
                     <button type="submit" class="btn btn-primary ml-3">Filter</button>
                  </form>
               </div>
            </div><!-- End .toolbox-item -->
         </aside><!-- End .toolbox-left -->

         <div class="toolbox-item toolbox-sort select-custom">
            <select name="orderby" class="form-control">
               <option value="menu_order" selected="selected">Default sorting</option>
               <option value="popularity">Sort by popularity</option>
               <option value="rating">Sort by average rating</option>
               <option value="date">Sort by newness</option>
               <option value="price">Sort by price: low to high</option>
               <option value="price-desc">Sort by price: high to low</option>
            </select>
         </div><!-- End .toolbox-item -->

         <div class="toolbox-item toolbox-show ml-auto">
            <label>Show:</label>

            <div class="select-custom">
               <select name="count" class="form-control">
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                  <option value="50">50</option>
               </select>
            </div><!-- End .select-custom -->
         </div><!-- End .toolbox-item -->

         <div class="toolbox-item layout-modes">
            <a href="category.php" class="layout-btn btn-grid active" title="Grid">
               <i class="fas fa-th"></i>
            </a>
            <a href="category-list.php" class="layout-btn btn-list" title="List">
               <i class="fas fa-th-list"></i>
            </a>
         </div><!-- End .layout-modes -->
      </nav>

      <div class="row">
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-1.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-hot">HOT</div>
                     <div class="product-label label-sale">-20%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Fleece Jacket</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->

         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-2.jpg'); ?>">
                  </a>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Ray Ban 5228</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="product-price">$33.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->

         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-3.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-sale">-20%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-5.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-sale">-30%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-6.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-hot">HOT</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-7.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-sale">-8%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-4.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-sale">-40%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-8.jpg'); ?>">
                  </a>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-9.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-hot">HOT</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-10.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-sale">-30%</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-11.jpg'); ?>">
                  </a>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
         <div class="col-6 col-sm-4 col-md-3">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-12.jpg'); ?>">
                  </a>
                  <div class="label-group">
                     <div class="product-label label-hot">HOT</div>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category.php" class="product-category">category</a>
                     </div>
                     <a href="#" class="btn-icon-wish"><i class="fas fa-heart"></i></a>
                  </div>
                  <h2 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h2>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .product-container -->
                  <div class="price-box">
                     <span class="old-price">$90.00</span>
                     <span class="product-price">$70.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .col-sm-4 -->
      </div><!-- End .row -->

      <nav class="toolbox toolbox-pagination">
         <div class="toolbox-item toolbox-show">
            <label>Show:</label>

            <div class="select-custom">
               <select name="count" class="form-control">
                  <option value="12">12</option>
                  <option value="24">24</option>
                  <option value="36">36</option>
               </select>
            </div><!-- End .select-custom -->
         </div><!-- End .toolbox-item -->

         <ul class="pagination toolbox-item">
            <li class="page-item disabled">
               <a class="page-link page-link-btn" href="#"><i class="fas fa-angle-left"></i></a>
            </li>
            <li class="page-item active">
               <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><span class="page-link">...</span></li>
            <li class="page-item">
               <a class="page-link page-link-btn" href="#"><i class="fas fa-angle-right"></i></a>
            </li>
         </ul>
      </nav>
   </div><!-- End .container -->
</main><!-- End .main -->