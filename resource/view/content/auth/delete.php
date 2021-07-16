<?php

use App\Http\Controllers\DeleteController;

$ctrl = new DeleteController;


// Delete Category
if (isset($_POST['deleteCategory'])) {
	if (!empty($_POST['delete_id'])) {
		$result = $ctrl->single('categories', $_POST['delete_id']);
		if ($result) {
			if (file_exists($_POST['filePath'])) {
				unlink($_POST['filePath']);
			}
			$_SESSION['isDataDeleted'] = true;
		}
	} else {
		$_SESSION['isDataDeleted'] = false;
	}

	$ctrl->redirect('categories');
}


// Delete Sub Category
if (isset($_POST['deleteSubCategory'])) {
	if (!empty($_POST['delete_id'])) {
		$result = $ctrl->single('sub_categories', $_POST['delete_id']);
		if ($result) {
			if (file_exists($_POST['filePath'])) {
				unlink($_POST['filePath']);
			}
			$_SESSION['isDataDeleted'] = true;
		}
	} else {
		$_SESSION['isDataDeleted'] = false;
	}

	$ctrl->redirect('sub-categories');
}

<<<<<<< HEAD

// Delete Sub Category
if (isset($_POST['deleteCouponList'])) {
	if (!empty($_POST['delete_id'])) {
		$result = $ctrl->single('coupons', $_POST['delete_id']);
		if ($result) {
			if (file_exists($_POST['filePath'])) {
				unlink($_POST['filePath']);
			}
			$_SESSION['isDataDeleted'] = true;
		}
	} else {
		$_SESSION['isDataDeleted'] = false;
	}

	$ctrl->redirect('coupon-list');



}


// Delete Slider
if (isset($_POST['deleteSlidersList'])) {
=======
// Delete Slider
if (isset($_POST['deleteSlider'])) {
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
	if (!empty($_POST['delete_id'])) {
		$result = $ctrl->single('sliders', $_POST['delete_id']);
		if ($result) {
			if (file_exists($_POST['filePath'])) {
				unlink($_POST['filePath']);
			}
			$_SESSION['isDataDeleted'] = true;
		}
	} else {
		$_SESSION['isDataDeleted'] = false;
	}

	$ctrl->redirect('slider-list');
}

<<<<<<< HEAD
// Delete admins
if (isset($_POST['deleteAdmin'])) {
	if (!empty($_POST['delete_id'])) {
		$result = $ctrl->single('admins', $_POST['delete_id']);
		if ($result) {
			if (file_exists($_POST['filePath'])) {
				unlink($_POST['filePath']);
			}
			$_SESSION['isDataDeleted'] = true;
		}
	} else {
		$_SESSION['isDataDeleted'] = false;
	}

	$ctrl->redirect('admin-list');
}
=======
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
