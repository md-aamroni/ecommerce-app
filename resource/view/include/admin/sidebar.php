<div class="left side-menu">
	<div class="slimscroll-menu" id="remove-scroll">
		<div id="sidebar-menu">
			<ul class="metismenu" id="side-menu">
				<li class="menu-title">Main</li>
				<li>
					<a href="dashboard" class="waves-effect">
						<i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span><span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Manage Category <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
					<ul class="submenu">
						<li><a href="categories">Categories</a></li>
						<li><a href="sub-categories">Sub Categories</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Manage Products <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
					<ul class="submenu">
						<li><a href="products">All Products</a></li>
						<li><a href="add-product">Add Product</a></li>
						<li><a href="edit-product">Edit Product</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="waves-effect"><i class="mdi mdi-email"></i><span> Manage Admin
						<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span>
					</a>
					<ul class="submenu">
						<li><a href="admin-list">All Admins</a></li>
						<li><a href="add-admin">Create Admin</a></li>
					</ul>
				</li>
				<li class="menu-title">Extras</li>

				<li>
					<a href="javascript:;" class="waves-effect"><i class="mdi mdi-email"></i><span> App Configuration
						<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span>
					</a>
					<ul class="submenu">
						<li><a href="javascript:;">Privacy Policy</a></li>
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;">Terms &amp; Condition</a></li>
					</ul>
				</li>

			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>


<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-title-box">
						<h4 class="page-title"><?php echo currentPageTitle();?></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item active">Welcome to Agroxa Dashboard</li>
						</ol>
						<div class="state-information d-none d-sm-block">
							<div class="state-graph">
								<div id="header-chart-1"></div>
								<div class="info">Balance $ 2,317</div>
							</div>
							<div class="state-graph">
								<div id="header-chart-2"></div>
								<div class="info">Item Sold 1230</div>
							</div>
						</div>
					</div>
				</div>
			</div>
