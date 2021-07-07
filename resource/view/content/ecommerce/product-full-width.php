<main class="main">
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.php"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
         </ol>
      </div>
   </nav>

   <div class="container-fluid pl-lg-0 padding-right-lg">
      <div class="product-single-container product-single-default">
         <div class="row">
            <div class="col-lg-6 product-single-gallery">
               <div class="sticky-slider">
                  <div class="product-slider-container">
                     <div class="product-single-carousel owl-carousel owl-theme">
                        <div class="product-item">
                           <img class="product-single-image" src="<?php echo asset('images/ecommerce/products/zoom/product-1-big.jpg');?>" data-zoom-image="<?php echo asset('images/ecommerce/products/zoom/product-1-big.jpg');?>" />
                        </div>
                        <div class="product-item">
                           <img class="product-single-image" src="<?php echo asset('images/ecommerce/products/zoom/product-2-big.jpg');?>" data-zoom-image="<?php echo asset('images/ecommerce/products/zoom/product-2-big.jpg');?>" />
                        </div>
                        <div class="product-item">
                           <img class="product-single-image" src="<?php echo asset('images/ecommerce/products/zoom/product-3-big.jpg');?>" data-zoom-image="<?php echo asset('images/ecommerce/products/zoom/product-3-big.jpg');?>" />
                        </div>
                     </div>
                     <!-- End .product-single-carousel -->
                     <span class="prod-full-screen">
                        <i class="fas fa-plus"></i>
                     </span>
                  </div>

                  <div class="prod-thumbnail owl-dots transparent-dots flex-column" id='carousel-custom-dots'>
                     <div class="owl-dot">
                        <img src="<?php echo asset('images/ecommerce/products/zoom/product-1.jpg');?>" />
                     </div>
                     <div class="owl-dot">
                        <img src="<?php echo asset('images/ecommerce/products/zoom/product-2.jpg');?>" />
                     </div>
                     <div class="owl-dot">
                        <img src="<?php echo asset('images/ecommerce/products/zoom/product-3.jpg');?>" />
                     </div>
                  </div>
               </div>
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
               <div class="product-single-details">
                  <h1 class="product-title">Product Long Name</h1>

                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                     </div><!-- End .product-ratings -->

                     <a href="#" class="rating-link">( 6 Reviews )</a>
                  </div><!-- End .product-container -->

                  <hr class="short-divider">

                  <div class="price-box">
                     <span class="old-price">$81.00</span>
                     <span class="product-price">$101.00</span>
                  </div><!-- End .price-box -->

                  <div class="product-desc">
                     <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                  </div><!-- End .product-desc -->

                  <div class="product-filters-container">
                     <div class="product-single-filter">
                        <label>Colors:</label>
                        <ul class="config-swatch-list">
                           <li class="active">
                              <a href="#" style="background-color: #0188cc;"></a>
                           </li>
                           <li>
                              <a href="#" style="background-color: #ab6e6e;"></a>
                           </li>
                           <li>
                              <a href="#" style="background-color: #ddb577;"></a>
                           </li>
                           <li>
                              <a href="#" style="background-color: #6085a5;"></a>
                           </li>
                        </ul>
                     </div><!-- End .product-single-filter -->
                  </div><!-- End .product-filters-container -->

                  <hr class="divider">

                  <div class="product-action">
                     <div class="product-single-qty">
                        <input class="horizontal-quantity form-control" type="text">
                     </div><!-- End .product-single-qty -->

                     <a href="shop-cart.php" class="btn btn-dark add-cart fas fa-shopping-cart" title="Add to Cart">Add to Cart</a>
                  </div><!-- End .product-action -->

                  <hr class="divider mb-1">

                  <div class="product-single-share">
                     <label class="sr-only">Share:</label>

                     <div class="social-icons mr-2">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                        <a href="#" class="social-icon social-mail far fa-envelope" target="_blank" title="Mail"></a>
                     </div><!-- End .social-icons -->

                     <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
                  </div><!-- End .product single-share -->
               </div><!-- End .product-single-details -->

               <div class="product-single-tabs mb-1">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (3)</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                           <ul>
                              <li><i class="fa fa-check-circle"></i>Any Product types that You want - Simple, Configurable</li>
                              <li><i class="fa fa-check-circle"></i>Downloadable/Digital Products, Virtual Products</li>
                              <li><i class="fa fa-check-circle"></i>Inventory Management with Backordered items</li>
                           </ul>
                           <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div><!-- End .product-desc-content -->
                     </div><!-- End .tab-pane -->

                     <div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                        <div class="product-desc-content">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                        </div><!-- End .product-desc-content -->
                     </div><!-- End .tab-pane -->

                     <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                        <div class="product-tags-content">
                           <form action="#">
                              <h4>Add Your Tags:</h4>
                              <div class="form-group">
                                 <input type="text" class="form-control form-control-sm" required>
                                 <input type="submit" class="btn btn-dark" value="Add Tags">
                              </div><!-- End .form-group -->
                           </form>
                           <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                        </div><!-- End .product-tags-content -->
                     </div><!-- End .tab-pane -->

                     <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                        <div class="product-reviews-content">

                           <div class="row">
                              <div class="col-12">
                                 <h2 class="reviews-title">3 reviews for Product Long Name</h2>

                                 <ol class="comment-list">
                                    <li class="comment-container">
                                       <div class="comment-avatar">
                                          <img src="<?php echo asset('images/ecommerce/avatar/avatar1.jpg');?>" width="65" height="65" alt="avatar" />
                                       </div><!-- End .comment-avatar-->

                                       <div class="comment-box">
                                          <div class="ratings-container">
                                             <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                             </div><!-- End .product-ratings -->
                                          </div><!-- End .ratings-container -->

                                          <div class="comment-info mb-1">
                                             <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                          </div><!-- End .comment-info -->

                                          <div class="comment-text">
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                          </div><!-- End .comment-text -->
                                       </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->

                                    <li class="comment-container">
                                       <div class="comment-avatar">
                                          <img src="<?php echo asset('images/ecommerce/avatar/avatar2.jpg');?>" width="65" height="65" alt="avatar" />
                                       </div><!-- End .comment-avatar-->

                                       <div class="comment-box">
                                          <div class="ratings-container">
                                             <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                             </div><!-- End .product-ratings -->
                                          </div><!-- End .ratings-container -->

                                          <div class="comment-info mb-1">
                                             <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                          </div><!-- End .comment-info -->

                                          <div class="comment-text">
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                          </div><!-- End .comment-text -->
                                       </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->

                                    <li class="comment-container">
                                       <div class="comment-avatar">
                                          <img src="<?php echo asset('images/ecommerce/avatar/avatar3.jpg');?>" width="65" height="65" alt="avatar" />
                                       </div><!-- End .comment-avatar-->

                                       <div class="comment-box">
                                          <div class="ratings-container">
                                             <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                             </div><!-- End .product-ratings -->
                                          </div><!-- End .ratings-container -->

                                          <div class="comment-info mb-1">
                                             <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                          </div><!-- End .comment-info -->

                                          <div class="comment-text">
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                          </div><!-- End .comment-text -->
                                       </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->
                                 </ol><!-- End .comment-list -->
                              </div>

                              <div class="col-12">
                                 <div class="add-product-review">
                                    <form action="#" class="comment-form m-0">
                                       <h3 class="review-title">Add a Review</h3>

                                       <div class="rating-form">
                                          <label for="rating">Your rating</label>
                                          <span class="rating-stars">
                                             <a class="star-1" href="#">1</a>
                                             <a class="star-2" href="#">2</a>
                                             <a class="star-3" href="#">3</a>
                                             <a class="star-4" href="#">4</a>
                                             <a class="star-5" href="#">5</a>
                                          </span>

                                          <select name="rating" id="rating" required="" style="display: none;">
                                             <option value="">Rate…</option>
                                             <option value="5">Perfect</option>
                                             <option value="4">Good</option>
                                             <option value="3">Average</option>
                                             <option value="2">Not that bad</option>
                                             <option value="1">Very poor</option>
                                          </select>
                                       </div>

                                       <div class="form-group">
                                          <label>Your Review</label>
                                          <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                       </div><!-- End .form-group -->

                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Your Name</label>
                                                <input type="text" class="form-control form-control-sm" required>
                                             </div><!-- End .form-group -->
                                          </div>

                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Your E-mail</label>
                                                <input type="text" class="form-control form-control-sm" required>
                                             </div><!-- End .form-group -->
                                          </div>
                                       </div>

                                       <input type="submit" class="btn btn-dark ls-n-15" value="Submit">
                                    </form>
                                 </div><!-- End .add-product-review -->
                              </div>
                           </div>
                        </div><!-- End .product-reviews-content -->
                     </div><!-- End .tab-pane -->
                  </div><!-- End .tab-content -->
               </div><!-- End .product-single-tabs -->
            </div><!-- End .col-lg-6 -->
         </div><!-- End .row -->
      </div><!-- End .product-single-container -->
   </div>

   <div class="product-single-video" style="background-image: url('<?php echo asset("images/ecommerce/products/single/extended/bg-4.jpg");?>')">
      <div class="container">
         <h3>Concept Film</h3>
         <a href="https://www.youtube.com/watch?v=Ph_VkTVmXh4" class="video-btn">
            Watch <img src="<?php echo asset('images/ecommerce/products/single/extended/icon-play.png');?>" alt="play">
         </a>
      </div><!-- End .container -->
   </div><!-- End .product-single-video -->

   <div class="products-section">
      <div class="container-fluid">
         <h2 class="section-title">Related Products</h2>

         <div class="products-slider owl-carousel owl-theme dots-top">
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-14.jpg');?>">
                  </a>
                  <div class="label-group">
                     <span class="product-label label-sale">-20%</span>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-13.jpg');?>">
                  </a>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-12.jpg');?>">
                  </a>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-11.jpg');?>">
                  </a>
                  <div class="label-group">
                     <span class="product-label label-hot">HOT</span>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-10.jpg');?>">
                  </a>
                  <div class="label-group">
                     <span class="product-label label-hot">HOT</span>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-9.jpg');?>">
                  </a>
                  <div class="label-group">
                     <span class="product-label label-sale">-30%</span>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
            <div class="product-default inner-quickview inner-icon">
               <figure>
                  <a href="product.php">
                     <img src="<?php echo asset('images/ecommerce/products/product-8.jpg');?>">
                  </a>
                  <div class="label-group">
                     <span class="product-label label-sale">-20%</span>
                  </div>
                  <div class="btn-icon-group">
                     <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="fas fa-shopping-cart"></i></button>
                  </div>
                  <a href="ajax/product-quick-view.php" class="btn-quickview" title="Quick View">Quick View</a>
               </figure>
               <div class="product-details">
                  <div class="category-wrap">
                     <div class="category-list">
                        <a href="category-grid.php" class="product-category">category</a>
                     </div>
                  </div>
                  <h3 class="product-title">
                     <a href="product.php">Product Short Name</a>
                  </h3>
                  <div class="ratings-container">
                     <div class="product-ratings">
                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                        <span class="tooltiptext tooltip-top"></span>
                     </div><!-- End .product-ratings -->
                  </div><!-- End .ratings-container -->
                  <div class="price-box">
                     <span class="old-price">$59.00</span>
                     <span class="product-price">$49.00</span>
                  </div><!-- End .price-box -->
               </div><!-- End .product-details -->
            </div>
         </div><!-- End .products-slider -->
      </div>
   </div><!-- End .products-section -->
</main><!-- End .main -->