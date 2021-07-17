<?php

use App\Http\Controllers\CouponController;
$ctrl = new CouponController;

// Delete Data
if (!empty($_SESSION['isDataDeleted'])) {
   if ($_SESSION['isDataDeleted'] === true) {
      echo notification('Congratulation! Data is deleted successfully', 'success');
      unset($_SESSION['isDataDeleted']);
   } elseif ($_SESSION['isDataDeleted'] === false) {
      echo notification('Oops! Something went wrong, please retry...', 'warning');
      unset($_SESSION['isDataDeleted']);
   }
}


// Update Data
if (isset($_POST['changeStatus'])) {
	$result = $ctrl->status($_POST['is_expired'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}

if (isset($_POST['updateCouponList'])) {
	$result = $ctrl->update($_POST['editcode'], $_POST['editprice'], $_POST['edit_percentage'],$_POST['edit_max_total_amount'], $_POST['edit_start_date'], $_POST['edit_end_date'],$_POST['edit_isPremium'], $_POST['edit_user_limit'], $_POST['edit_total_usage'], $_POST['edit_status'], $_POST['update_id']);
	if ($result) {
		echo notification('Congratulation! Data is updated successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong', 'warning');
	}
}


// Create Data
if (isset($_POST['addNewCouponSubmit'])) {
	if (!empty($_POST['code'])) {
		$result = $ctrl->create($_POST['code'], @$_POST['price'], @$_POST['percentage'],$_POST['max_total_amount'], @$_POST['start_date'], @$_POST['end_date'],$_POST['isPremium'], @$_POST['user_limit'], @$_POST['total_usage'], @$_POST['status']);

		if (!empty($result) && is_array($result)) {
			echo notification('Congratulation! Data is added successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong', 'warning');
		}
	} else {
		echo notification('All fields are required', 'danger');
	}
}


// Read Data
$coupon = $ctrl->allCoupons(true);
?>

<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					<div class="float-left">
						coupon Lists
						<div class="text-muted font-14">
							Here you find all the admins list as well...
						</div>
					</div>
					<div class="float-right pt-2">
						<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#addNewCoupon">
							<i class="fas fa-plus"></i> Add New Coupon
						</button>
					</div>
				</div>
				<div class="card-body pb-3">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Code</th>
									<th scope="col">Price</th>
									<th scope="col">percentage</th>
									<th scope="col">Max total amount</th>
									<th scope="col">Start date</th>
									<th scope="col">End date</th>
									<th scope="col">Is premium user</th>
									<th scope="col">user_limit</th>
									<th scope="col">Total usagee</th>
									<th scope="col">Is expired</th>
									<th scope="col">Created at</th>
									<th scope="col">Updated at</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($coupon) && is_array($coupon)) : ?>
									<?php foreach ($coupon as $n => $CouponList) : ?>

										<tr>
											<td><?php echo ++$n; ?></td>
											<td><?php echo $CouponList['code']; ?></td>
											<td><?php echo $CouponList['price']; ?></td>
											<td><?php echo $CouponList['percentage']; ?></td>
											<td><?php echo $CouponList['max_total_amount']; ?></td>
											<td><?php echo $CouponList['start_date']; ?></td>
											<td><?php echo $CouponList['end_date']; ?></td>
											<td><?php echo $CouponList['is_premium_user']; ?></td>
											<td><?php echo $CouponList['user_limit']; ?></td>
											<td><?php echo $CouponList['total_usage']; ?></td>
											<td><?php echo changeStatus($CouponList['id'], $CouponList['is_expired']); ?></td>
											<td><?php echo dateFormat($CouponList['created_at'], 3); ?></td>
											
											
											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editCouponList" data-eid="<?php echo $CouponList['id']; ?>" data-code="<?php echo $ctrl->decode($CouponList['code']); ?>" data-price="<?php echo $CouponList['price']; ?>" 

												data-parcentage="<?php echo $CouponList['parcentage']; ?>" 
												data-max_total_amount="<?php echo $CouponList['max_total_amount']; ?>" 
												data-start_date="<?php echo $CouponList['start_date']; ?>" 
												data-end_date="<?php echo $CouponList['end_date']; ?>" 
												data-is_premium_user="<?php echo $CouponList['is_premium_user']; ?>" 
												data-user_limit="<?php echo $CouponList['user_limit']; ?>" 
												data-total_usage="<?php echo $CouponList['total_usage']; ?>" 
												data-is_expired="<?php echo $CouponList['is_expired']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($CouponList['id'], 'deleteCouponList'); ?>
											</td>
										</tr>

									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer text-muted">
					Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addNewCoupon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewCouponListLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Add New CouponList</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Code</label>
						<input type="text" class="form-control" name="code" placeholder="Enter Offer Price">
					</div>
					<div class="form-group">
						<label for="">Price</label>
						<input type="number" class="form-control" name="price" placeholder="Enter Offer Price">
					</div>
					<div class="form-group">
						<label for="">Percentage</label>
						<input type="number" class="form-control" name="percentage" placeholder="Enter Offer Percentage">
					</div>

					<div class="form-group">
						<label for="">Max total amount</label>
						<input type="number" class="form-control" name="max_total_amount" placeholder="Enter Max total amount">
					</div>
					<div class="form-group">
						<label for="">Start date</label>
						<input type="date" class="form-control" name="start_date" placeholder="Enter Start date">
					</div>
					<div class="form-group">
						<label for="">end_date</label>
						<input type="date" class="form-control" name="end_date" placeholder="Enter end date">
					</div>
					<div class="form-group">
						<label for="">Is Premium User</label>
						<select class="custom-select" name="isPremium">
							<option selected disabled>Please Select..</option>
							<option value="Premium">Premium</option>
							<option value="Regular" default>Regular</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">User limit</label>
						<input type="number" class="form-control" name="user_limit" placeholder="Enter User limit">
					</div>
					<div class="form-group">
						<label for="">Total usage</label>
						<input type="number" class="form-control" name="total_usage" placeholder="Enter total usage">
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="status">
							<option selected disabled>Please Select..</option>
							<option value="Inactive">Inactive</option>
							<option value="OnGoing">OnGoing</option>Expired
							<option value="Expired">Expired</option>
						</select>
					</div>
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewCouponSubmit">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="editCouponList" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editCouponListLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title mt-0">Edit Coupon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="update_id" value="" />
				<div class="modal-body">
				<div class="form-group">
						<label for="">Code</label>
						<input type="text" class="form-control" name="editcode" >
					</div>
					<div class="form-group">
						<label for="">Price</label>
						<input type="number" class="form-control" name="editprice" >
					</div>
					<div class="form-group">
						<label for="">Percentage</label>
						<input type="number" class="form-control" name="edit_percentage" >
					</div>

					<div class="form-group">
						<label for="">Max total amount</label>
						<input type="number" class="form-control" name="edit_max_total_amount" >
					</div>
					<div class="form-group">
						<label for="">Start date</label>
						<input type="date" class="form-control" name="edit_start_date" >
					</div>
					<div class="form-group">
						<label for="">end_date</label>
						<input type="date" class="form-control" name="edit_end_date" >
					</div>
					<div class="form-group">
						<label for="">Is Premium User</label>
						<select class="custom-select" name="edit_isPremium">
							<option selected disabled>Please Select..</option>
							<option value="Premium">Premium</option>
							<option value="Regular" default>Regular</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">User limit</label>
						<input type="number" class="form-control" name="edit_user_limit">
					</div>
					<div class="form-group">
						<label for="">Total usage</label>
						<input type="number" class="form-control" name="edit_total_usage" >
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="edit_status">
							<option selected disabled>Please Select..</option>
							<option value="Inactive" default>Inactive</option>
							<option value="OnGoing">OnGoing</option>Expired
							<option value="Expired">Expired</option>
						</select>
					</div>
				</div>
				<div class="modal-footer py-2">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="updateCouponList">Update coupon</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		// Edit Data
		$(document).on('click', '.editData', function() {
			const editable = {
				id: $(this).data('eid'),
				code: $(this).data('code'),
				price: $(this).data('price'),
				parcentage: $(this).data('parcentage'),
				max_total_amount: $(this).data('max_total_amount'),
				start_date: $(this).data('start_date'),
				end_date: $(this).data('end_date'),
				is_premium_user: $(this).data('is_premium_user'),
				user_limit: $(this).data('user_limit'),
				total_usage: $(this).data('total_usage'),
				is_expired: $(this).data('is_expired')
			}

			if (editable) {
				$('[name="update_id"]').val(editable['id']);
				$('[name="editcode"]').val(editable['code']);
				$('[name="editprice"]').val(editable['price']);
				$('[name="edit_percentage"]').val(editable['percentage']);
				$('[name="edit_max_total_amount"]').val(editable['max_total_amount']);
				$('[name="edit_start_date"]').val(editable['start_date']);
				$('[name="edit_end_date"]').val(editable['end_date']);
				$('[name="edit_isPremium"]').val(editable['is_premium_user']);
				$('[name="edit_user_limit"]').val(editable['user_limit']);
				$('[name="edit_total_usage"]').val(editable['total_usage']);
				$('[name="edit_status"]').val(editable['is_expired']);
			}
		});
	});
</script>
