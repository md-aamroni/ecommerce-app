<div class="top-notice text-white bg-primary">
	<div class="container text-center">
		<h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles </h5>
		<small>* Limited time only.</small>
		<button title="Close (Esc)" type="button" class="mfp-close">×</button>
	</div>
</div>

<header class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-left header-dropdowns">
				<div class="header-dropdown">
					<a href="#" class="pl-0"><img src="<?php echo asset('images/ecommerce/flags/en.png'); ?>" alt="England flag">ENG</a>
					<div class="header-menu">
						<ul>
							<li><a href="#"><img src="<?php echo asset('images/ecommerce/flags/en.png'); ?>" alt="England flag">ENG</a></li>
							<li><a href="#"><img src="<?php echo asset('images/ecommerce/flags/fr.png'); ?>">FRA</a></li>
						</ul>
					</div>
				</div>

				<div class="header-dropdown ml-4">
					<a href="#">USD  </a>
					<div class="header-menu">
						<ul>
							<li><a href="#">EUR</a></li>
							<li><a href="#">USD</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="header-right">
				<p class="top-message text-uppercase d-none d-sm-block mr-4">Free returns. Standard shipping orders $99+</p>

				<span class="separator"></span>

				<div class="header-dropdown dropdown-expanded mx-2 px-1">
					<a href="#">Links</a>
					<div class="header-menu">
						<ul>
							<li><a href="about.php">About </a></li>
							<li><a href="#">Our Stores</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="login.php" class="">Log In</a></li>
						</ul>
					</div>
				</div>

				<span class="separator"></span>

				<div class="social-icons">
					<a href="#" class="social-icon social-facebook fab fa-facebook-f" target="_blank"></a>
					<a href="#" class="social-icon social-twitter fab fa-twitter" target="_blank"></a>
					<a href="#" class="social-icon social-instagram fab fa-instagram" target="_blank"></a>
				</div>
			</div>
		</div>
	</div>

	<div class="header-middle">
		<div class="container">
			<div class="header-left w-lg-max ml-auto ml-lg-0">
				<div class="header-icon header-search header-search-inline header-search-category">
					<a href="#" class="search-toggle" role="button"><i class="fas fa-search"></i></a>
					<form action="#" method="get">
						<div class="header-search-wrapper">
							<input type="search"  class="form-control" name="q" id="q" placeholder="Search..." required>



							<script>
								function autocomplete(inp, arr) {
									/*the autocomplete function takes two arguments,
									the text field element and an array of possible autocompleted values:*/
									var currentFocus;
									/*execute a function when someone writes in the text field:*/
									inp.addEventListener("input", function(e) {
										var a, b, i, val = this.value;
										/*close any already open lists of autocompleted values*/
										closeAllLists();
										if (!val) {
											return false;
										}
										currentFocus = -1;
										/*create a DIV element that will contain the items (values):*/
										a = document.createElement("DIV");
										a.setAttribute("id", this.id + "autocomplete-list");
										a.setAttribute("class", "autocomplete-items");
										/*append the DIV element as a child of the autocomplete container:*/
										this.parentNode.appendChild(a);
										/*for each item in the array...*/
										for (i = 0; i < arr.length; i++) {
											/*check if the item starts with the same letters as the text field value:*/
											if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
												/*create a DIV element for each matching element:*/
												b = document.createElement("DIV");
												/*make the matching letters bold:*/
												b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
												b.innerHTML += arr[i].substr(val.length);
												/*insert a input field that will hold the current array item's value:*/
												b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
												/*execute a function when someone clicks on the item value (DIV element):*/
												b.addEventListener("click", function(e) {
													/*insert the value for the autocomplete text field:*/
													inp.value = this.getElementsByTagName("input")[0].value;
													/*close the list of autocompleted values,
													(or any other open lists of autocompleted values:*/
													closeAllLists();
												});
												a.appendChild(b);
											}
										}
									});
									/*execute a function presses a key on the keyboard:*/
									inp.addEventListener("keydown", function(e) {
										var x = document.getElementById(this.id + "autocomplete-list");
										if (x) x = x.getElementsByTagName("div");
										if (e.keyCode == 40) {
											/*If the arrow DOWN key is pressed,
											increase the currentFocus variable:*/
											currentFocus++;
											/*and and make the current item more visible:*/
											addActive(x);
										} else if (e.keyCode == 38) { //up
											/*If the arrow UP key is pressed,
											decrease the currentFocus variable:*/
											currentFocus--;
											/*and and make the current item more visible:*/
											addActive(x);
										} else if (e.keyCode == 13) {
											/*If the ENTER key is pressed, prevent the form from being submitted,*/
											e.preventDefault();
											if (currentFocus > -1) {
												/*and simulate a click on the "active" item:*/
												if (x) x[currentFocus].click();
											}
										}
									});

									function addActive(x) {
										/*a function to classify an item as "active":*/
										if (!x) return false;
										/*start by removing the "active" class on all items:*/
										removeActive(x);
										if (currentFocus >= x.length) currentFocus = 0;
										if (currentFocus < 0) currentFocus = (x.length - 1);
										/*add class "autocomplete-active":*/
										x[currentFocus].classList.add("autocomplete-active");
									}

									function removeActive(x) {
										/*a function to remove the "active" class from all autocomplete items:*/
										for (var i = 0; i < x.length; i++) {
											x[i].classList.remove("autocomplete-active");
										}
									}

									function closeAllLists(elmnt) {
										/*close all autocomplete lists in the document,
										except the one passed as an argument:*/
										var x = document.getElementsByClassName("autocomplete-items");
										for (var i = 0; i < x.length; i++) {
											if (elmnt != x[i] && elmnt != inp) {
												x[i].parentNode.removeChild(x[i]);
											}
										}
									}
									/*execute a function when someone clicks in the document:*/
									document.addEventListener("click", function(e) {
										closeAllLists(e.target);
									});
								}

								/*An array containing all the country names in the world:*/
								var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

								/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
								autocomplete(document.getElementById("q"), countries);
							</script>



							<!-- <div class="select-custom body-text">
										<select id="cat" name="cat">
											<option value="">All Categories</option>
											<option value="4">Fashion</option>
											<option value="12">- Women</option>
											<option value="13">- Men</option>
											<option value="66">- Jewellery</option>
											<option value="67">- Kids Fashion</option>
											<option value="5">Electronics</option>
											<option value="21">- Smart TVs</option>
											<option value="22">- Cameras</option>
											<option value="63">- Games</option>
											<option value="7">Home &amp; Garden</option>
											<option value="11">Motors</option>
											<option value="31">- Cars and Trucks</option>
											<option value="32">- Motorcycles &amp; Powersports</option>
											<option value="33">- Parts &amp; Accessories</option>
											<option value="34">- Boats</option>
											<option value="57">- Auto Tools &amp; Supplies</option>
										</select>
									</div> -->
							<button class="btn fas fa-search p-0" type="submit"></button>
						</div>
					</form>
				</div>
			</div>

			<div class="header-center order-first order-lg-0 ml-0 ml-lg-auto">
				<button class="mobile-menu-toggler" type="button">
					<i class="icon-menu"></i>
				</button>
				<a href="index.php" class="logo">
					<img src="<?php echo asset('images/ecommerce/logo.png'); ?>" alt="Porto Logo">
				</a>
			</div>

			<div class="header-right w-lg-max ml-0 ml-lg-auto">
				<div class="header-contact d-none d-lg-flex align-items-center ml-auto pr-xl-4 mr-4">
					<i class="fas fa-phone"></i>
					<h6 class="pt-1 line-height-1 pr-2">Call us now<a href="tel:#" class="d-block text-dark pt-1 font1">+123 5678 890</a></h6>
				</div>

				<a href="login.php" class="header-icon  pl-1"><i class="fas fa-user-tag"></i></a>

				<a href="#" class="header-icon pl-1 pr-2"><i class="far fa-heart"></i></a>

				<div class="dropdown cart-dropdown">
					<a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
						<i class="fas fa-shopping-bag"></i>
						<span class="cart-count badge-circle">2</span>
					</a>

					<div class="dropdown-menu">
						<div class="dropdownmenu-wrapper">
							<div class="dropdown-cart-header">
								<span>2 Items</span>

								<a href="checkout.php" class="float-right">View Cart</a>
							</div>

							<div class="dropdown-cart-products">
								<div class="product">
									<div class="product-details">
										<h4 class="product-title">
											<a href="product.php">Woman Ring</a>
										</h4>

										<span class="cart-product-info">
											<span class="cart-product-qty">1</span>
											x $99.00
										</span>
									</div>

									<figure class="product-image-container">
										<a href="product.php" class="product-image">
											<img src="<?php echo asset('images/ecommerce/products/cart/product-1.jpg'); ?>" alt="product" width="80" height="80">
										</a>

										<a href="#" class="btn-remove fas fa-times" title="Remove Product"></a>
									</figure>
								</div>

								<div class="product">
									<div class="product-details">
										<h4 class="product-title">
											<a href="product.php">Woman Necklace</a>
										</h4>

										<span class="cart-product-info">
											<span class="cart-product-qty">1</span>
											x $35.00
										</span>
									</div>

									<figure class="product-image-container">
										<a href="product.php" class="product-image">
											<img src="<?php echo asset('images/ecommerce/products/cart/product-2.jpg'); ?>" alt="product" width="80" height="80">
										</a>
										<a href="#" class="btn-remove fas fa-times" title="Remove Product"></a>
									</figure>
								</div>
							</div>

							<div class="dropdown-cart-total">
								<span>Total</span>

								<span class="cart-total-price float-right">$134.00</span>
							</div>

							<div class="dropdown-cart-action">
								<a href="shop-cart.php" class="btn btn-dark btn-block">Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{
				'move': [
					{
						'item': '.logo',
						'position': 'start',
						'clone': false
					},
					{
						'item': '.header-search',
						'position': 'end',
						'clone': false
					},
					{
						'item': '.header-icon:not(.header-search)',
						'position': 'end',
						'clone': false
					},
					{
						'item': '.cart-dropdown',
						'position': 'end',
						'clone': false
					}
				],
				'moveTo': '.container',
				'changes': [
					{
						'item': '.header-search',
						'removeClass': 'header-search-inline',
						'addClass': 'header-search-popup ml-auto'
					},
					{
						'item': '.main-nav li.custom',
						'removeClass': 'd-xl-block'
					}
				]
			}">
		<div class="container">
			<nav class="main-nav d-flex w-lg-max justify-content-center">
				<ul class="menu">
					<li class="active">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="category-grid.php">Categories</a>
						<div class="megamenu megamenu-fixed-width megamenu-3cols">
							<div class="row">
								<div class="col-lg-4">
									<a href="#" class="nolink">VARIATION 1</a>
									<ul class="submenu">
										<li><a href="category-grid.php">Fullwidth Banner</a></li>
										<li><a href="category-banner-boxed-slider.php">Boxed Slider Banner</a></li>
										<li><a href="category-banner-boxed-image.php">Boxed Image Banner</a></li>
										<li><a href="category-grid.php">Left Sidebar</a></li>
										<li><a href="category-sidebar-right.php">Right Sidebar</a></li>
										<li><a href="category-horizontal-filter1.php">Horizontal Filter1</a></li>
										<li><a href="category-horizontal-filter2.php">Horizontal Filter2</a></li>
									</ul>
								</div>
								<div class="col-lg-4">
									<a href="#" class="nolink">VARIATION 2</a>
									<ul class="submenu">
										<li><a href="category-list.php">List Types</a></li>
										<li><a href="category-grid.php">Ajax Infinite Scroll</a></li>
										<li><a href="category-grid.php">3 Columns Products</a></li>

									</ul>
								</div>
								<div class="col-lg-4 p-0" style="background: #f4f4f4 no-repeat center 82%/cover url(<?php echo asset('images/ecommerce/menu-banner.jpg'); ?>)"></div>
							</div>
						</div>
					</li>
					<li>
						<a href="#">Products</a>
						<div class="megamenu megamenu-fixed-width">
							<div class="row">
								<div class="col-lg-3">
									<a href="#" class="nolink">Variations 1</a>
									<ul class="submenu">
										<li><a href="product.php">Horizontal Thumbs</a></li>
										<li><a href="product-full-width.php">Vertical Thumbnails</a></li>
										<li><a href="product.php">Inner Zoom</a></li>
										<li><a href="product-sidebar-left.php">Accordion Tabs</a></li>
									</ul>
								</div>
								<div class="col-lg-3">
									<a href="#" class="nolink">Variations 2</a>
									<ul class="submenu">
										<li><a href="product-sticky-tab.php">Sticky Tabs</a></li>
										<li><a href="product-simple.php">Simple Product</a></li>
										<li><a href="product-sidebar-left.php">With Left Sidebar</a></li>
									</ul>
								</div>
								<div class="col-lg-3">
									<a href="#" class="nolink">Product Layout Types</a>
									<ul class="submenu">
										<li><a href="product.php">Default Layout</a></li>
										<li><a href="product-full-width.php">Full Width Layout</a></li>
										<li><a href="product-grid-layout.php">Grid Images Layout</a></li>
									</ul>
								</div>

								<div class="col-lg-3 p-0">
									<img src="<?php echo asset('images/ecommerce/menu-bg.png'); ?>" alt="Menu banner" class="product-promo">
								</div>
							</div>
						</div>
					</li>
					<li>
						<a href="#">Pages</a>
						<ul>
							<li><a href="shop-cart.php">Shopping Cart</a></li>
							<li><a href="#">Checkout</a>
								<ul>
									<li><a href="checkout.php">Checkout Shipping</a></li>
									<li><a href="checkout-shipping-2.php">Checkout Shipping 2</a></li>
									<li><a href="checkout-review.php">Checkout Review</a></li>
								</ul>
							</li>
							<li><a href="#">Dashboard</a>
								<ul>
									<li><a href="dashboard.php">Dashboard</a></li>
									<li><a href="my-account.php">My Account</a></li>
								</ul>
							</li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="#">Blog</a>
								<ul>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="blog-post.php">Blog Post</a></li>
								</ul>
							</li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="login.php" class="">Login</a></li>
							<li><a href="forgot-password.php">Forgot Password</a></li>
						</ul>
					</li>
					<li><a href="blog.php">Blog</a></li>
					<li><a href="about.php">About Us</a></li>
					<li class="d-none d-xl-block custom"><a href="#">Special Offer!</a></li>

				</ul>
			</nav>
		</div>
	</div>
</header>