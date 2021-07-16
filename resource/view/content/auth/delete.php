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
