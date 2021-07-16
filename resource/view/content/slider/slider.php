<?php
<<<<<<< HEAD
use App\Http\Controllers\SliderController;
$sdCtrl = new SliderController;


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
	$result = $sdCtrl->status($_POST['status'], $_POST['id']);
	if ($result > 0) {
		echo notification('Congratulation! Status is changed successfully', 'success');
	} else {
		echo notification('Oops! Something went wrong, please retry...', 'warning');
	}
}

if (isset($_POST['edit_slider_submit'])) {
	if (!empty($_FILES['banner']['name'])) {
		$banner	= uniqid() . '_slider_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $sdCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $sdCtrl->update($_POST['sliderHeaderAdmin'], $_POST['sliderExerptAdmin'], $_POST['update_image'], $_POST['update_status'], $_POST['update_id']);
			if ($result) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['sliders'] . $banner);
				unlink('./../' . $GLOBALS['upDir']['sliders'] . $_POST['update_image']);
				echo notification('Congratulation! Data is updated successfully', 'success');
			} else {
				echo notification('Oops! Something went wrong', 'warning');
			}
		} else {
			echo notification('File Error! Please upload a valid file', 'danger');
		}
	} else {
		$result = $sdCtrl->update($_POST['sliderHeaderAdmin'], $_POST['sliderExerptAdmin'], $_POST['update_image'], $_POST['update_status'], $_POST['update_id']);

        
		if ($result) {
			echo notification('Congratulation! Data is updated successfully', 'success');
		} else {
			echo notification('Oops! Something went wrong, please retry...', 'warning');
		}
	}
}

// Create Data
if (isset($_POST['submit'])) {
	if (!empty($_POST['sliderHeaderAdmin']) && !empty($_POST['sliderExerptAdmin'])  && !empty($_FILES['banner']['name'])) {

		$banner	= date('Y_m_d_His') . uniqid() . '_slider_banner.' . pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$isValid	= $sdCtrl->checkImage(@$_FILES['banner']['type'], @$_FILES['banner']['size'], @$_FILES['banner']['error']);

		if ($isValid === 1) {
			$result = $sdCtrl->create($_POST['sliderHeaderAdmin'], $_POST['sliderExerptAdmin'], $banner, $_POST['status']);
			if (!empty($result) && is_array($result)) {
				move_uploaded_file($_FILES['banner']['tmp_name'], './../' . $GLOBALS['upDir']['sliders'] . $banner);
				echo notification('Congratulation! Data is added successfully', 'success');
			} else {
				echo notification('Oops! Something went wrong', 'warning');
			}
		} else {
			echo notification('File Error! Please upload a valid file', 'danger');
		}
	} else {
		echo notification('Validation Error, All fields are required', 'error');
	}
}


// Read Data

$slidersRead = $sdCtrl->allSlider(true);
=======

use App\Http\Controllers\SliderController;

$slider_ctrl =  new SliderController;
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


// Status Update  
if (isset($_POST['changeStatus'])) {
    $result = $slider_ctrl->status($_POST['status'], $_POST['id']);
    if ($result > 0) {
        echo notification('Congratulation! Status is changed successfully', 'success');
    } else {
        echo notification('Oops! Something went wrong, please retry...', 'warning');
    }
}

//update data

if (isset($_POST['updateSlider'])) {
    if (!empty($_FILES['slider']['name'])) {
        $slider    = date('Y_m_d_His') . uniqid() . '.' . pathinfo($_FILES['slider']['name'], PATHINFO_EXTENSION);
        $isValid    = $slider_ctrl->checkImage(@$_FILES['slider']['type'], @$_FILES['slider']['size'], @$_FILES['slider']['error']);

        if ($isValid === 1) {
            $result = $slider_ctrl->update($_POST['update_title'], $_POST['update_sub_title'], $slider, $_POST['update_alter_text'], $_POST['update_status'], $_POST['update_id']);
            if ($result) {
                move_uploaded_file($_FILES['slider']['tmp_name'], './../' . $GLOBALS['upDir']['slider'] . $slider);
                unlink('./../' . $GLOBALS['upDir']['slider'] . $_POST['update_image']);
                echo notification('Congratulation! Data is updated successfully', 'success');
            } else {
                echo notification('Oops! Something went wrong', 'warning');
            }
        } else {
            echo notification('File Error! Please upload a valid file', 'danger');
        }
    } else {
        $result = $slider_ctrl->update($_POST['update_title'], $_POST['update_sub_title'], $_POST['update_image'], $_POST['update_alter_text'], $_POST['update_status'], $_POST['update_id']);
        if ($result) {
            echo notification('Congratulation! Data is updated successfully', 'success');
        } else {
            echo notification('Oops! Something went wrong, please retry...', 'warning');
        }
    }
}


// Create Data
if (isset($_POST['addNewSlider'])) {

    if (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_FILES['slider']['name']) && !empty($_POST['alter_text'])) {

        $slider    = date('Y_m_d_His') . uniqid() . '.' . pathinfo($_FILES['slider']['name'], PATHINFO_EXTENSION);
        $isValid    = $slider_ctrl->checkImage(@$_FILES['slider']['type'], @$_FILES['slider']['size'], @$_FILES['slider']['error']);

        if ($isValid === 1) {
            $result = $slider_ctrl->create($_POST['title'], $_POST['subtitle'], $slider, $_POST['alter_text'], $_POST['is_activ']);
            if (!empty($result) && is_array($result)) {
                move_uploaded_file($_FILES['slider']['tmp_name'], './../' . $GLOBALS['upDir']['slider'] . $slider);
                echo notification('Congratulation! Data is added successfully', 'success');
            } else {
                echo notification('Oops! Something went wrong', 'warning');
            }
        } else {
            echo notification('File Error! Please upload a valid file', 'danger');
        }
    } else {
        echo notification('Validation Error, All fields are required', 'error');
    }
}

// Read Data

$slider_lists = $slider_ctrl->allSlider(true);


>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
?>

<div class="page-content-wrapper">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header font-16 mt-0 bg-light border-success py-2">
                    <div class="float-left">
                        <h5>Slider Lists</h5>
                        <div class="text-muted font-14">
                            Please make sure that, you have followed the instruction...
                        </div>
                    </div>
                    <div class="float-right pt-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addSlider"> <i class="fas fa-plus"></i> Add Slider</button>
                    </div>

<<<<<<< HEAD

=======
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
                </div>

                <div class="card-body pb-3">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Sub Title</th>
                                    <th scope="col">Alter Text</th>
                                    <th scope="col">Sequence</th>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Date Modified</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<<<<<<< HEAD
                            <?php if (!empty($slidersRead) && is_array($slidersRead)) : ?>
									<?php foreach ($slidersRead as $n => $slidersList) : ?>

										<?php
										if (!empty($slidersList['banner']) && file_exists('./../' . $GLOBALS['upDir']['sliders']  . $slidersList['banner'])) :
											$bannerImage = './../' . $GLOBALS['upDir']['sliders']  . $slidersList['banner'];
										else :
											$bannerImage = asset('images/placeholder.jpg');
										endif;

										
										?>

										<tr>
											<td class="text-center font-weight-bold"><?php echo ++$n; ?></td>
											
											<td><?php echo $slidersList['title']; ?></td>
											<td><?php echo $slidersList['sub_title']; ?></td>
											
											<td>
												<button type="button" class="btn btn-light btn-sm waves-effect waves-light previewBannerImage" data-toggle="modal" data-target="#previewBannerImage" data-image="<?php echo $bannerImage; ?>">
													<i class="fas fa-eye"></i> View
												</button>
											</td>
											<td><?php echo changeStatus($slidersList['id'], $slidersList['status']); ?></td>
											<td><?php echo dateFormat($slidersList['created_at'], 3); ?></td>
											<td class="d-flex">
												<button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editSlider" data-eid="<?php echo $slidersList['id']; ?>" data-title="<?php echo $slidersList['title']; ?>" data-sub_title="<?php echo $slidersList['sub_title']; ?>" data-image="<?php echo $slidersList['banner']; ?>" data-filepath="<?php echo $bannerImage; ?>" data-status="<?php echo $slidersList['status']; ?>">
													<i class="fas fa-pencil-alt mr-1"></i> Edit
												</button>
												<?php echo deleteButton($slidersList['id'], 'deleteSlidersList', './../../' . $GLOBALS['upDir']['sliders']  . $slidersList['banner']); ?>
											</td>
                                            
										</tr>

									<?php endforeach; ?>
								<?php endif; ?>
=======
                                <?php if (!empty($slider_lists) && is_array($slider_lists)) : ?>
                                    <?php foreach ($slider_lists as $n => $slider_list) : ?>
                                        <?php
                                        if (!empty($slider_list['images']) && file_exists('./../' . $GLOBALS['upDir']['slider'] . $slider_list['images'])) :
                                            $sliderImage = './../' . $GLOBALS['upDir']['slider']  . $slider_list['images'];
                                        else :
                                            $sliderImage = asset('images/placeholder.jpg');
                                        endif;
                                        ?>

                                        <tr>
                                            <td class="text-center font-weight-bold"><?php echo ++$n; ?></td>
                                            <td><?php echo $slider_list['title'] ?></td>
                                            <td><?php echo $slider_list['sub_title'] ?></td>
                                            <td><?php echo $slider_list['alt_text'] ?></td>
                                            <td><?php echo $slider_list['sequence'] ?></td>
                                            <td><button type="button" class="btn btn-light btn-sm waves-effect waves-light previewSliderImage" data-toggle="modal" data-target="#previewSliderImage" data-image="<?php echo $sliderImage; ?>">
                                                    <i class="fas fa-eye"></i> View
                                                </button></td>
                                            <td><?php echo changeStatus($slider_list['id'], $slider_list['is_active']) ?></td>
                                            <td><?php echo dateFormat($slider_list['created_at'], 3) ?></td>
                                            <td class="d-flex">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light editData mr-1" data-toggle="modal" data-target="#editSlider" data-eid="<?php echo $slider_list['id']; ?>" data-title="<?php echo $slider_list['title'] ?>" data-sub_title="<?php echo $slider_list['sub_title']; ?>" data-image="<?php echo $slider_list['images']; ?>" data-filepath="<?php echo $sliderImage; ?>" data-alt_text="<?php echo $slider_list['alt_text']; ?>" data-status="<?php echo $slider_list['is_active']; ?>">
                                                    <i class="fas fa-pencil-alt mr-1"></i> Edit
                                                </button>
                                                <?php echo deleteButton($slider_list['id'], 'deleteSlider', './../' . $GLOBALS['upDir']['slider'] . $slider_list['images']); ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
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
<<<<<<< HEAD
</div>

<div id="editSlider" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editSliderLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Edit Slider</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="update_id" value="">
				<input type="hidden" name="update_image" value="">
				<div class="modal-body">
                <div class="form-group">
                        <label for="sliderHeaderAdmin">Slider title</label>
                        <input type="text" class="form-control" name="sliderHeaderAdmin">

                    </div>
                    <div class="form-group">
                        <label for="sliderExerptAdmin">Slider sub title</label>
                        <input type="text" class="form-control" name="sliderExerptAdmin" placeholder="Enter slider exerpt">

                    </div>
					<div class="form-group">
						<label for="">Upload Banner</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<button class="btn btn-secondary" type="button" id="uploadIcon">
									<i class="fas fa-cloud-upload-alt"></i>
								</button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input upload" name="banner" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div2" />
								<label class="custom-file-label fileName pt-2" for="banner">Choose Logo File</label>
							</div>
						</div>
					</div>
					<div class="form-group my-0">
						<div id="updateImg"></div>
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="update_status">
							<option selected disabled>Please Select..</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>
				</div>
				<div class="modal-footer py-2	">
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="edit_slider_submit">Confirm and Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label for="sliderHeaderAdmin">Slider title</label>
                        <input type="text" class="form-control" name="sliderHeaderAdmin" placeholder="Enter slider title ">

                    </div>
                    <div class="form-group">
                        <label for="sliderExerptAdmin">Slider sub title</label>
                        <input type="text" class="form-control" name="sliderExerptAdmin" placeholder="Enter slider exerpt">

                    </div>


                    <div class="form-group">
						<label for="">Upload Banner</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<button class="btn btn-secondary" type="button" id="uploadIcon">
									<i class="fas fa-cloud-upload-alt"></i>
								</button>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input upload" name="banner" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div1" />
								<label class="custom-file-label fileName pt-2" for="banner">Choose Logo File</label>
							</div>
						</div>
					</div>
					<div class="form-group my-0">
						<div id="img"></div>
					</div>
                    <div class="form-group">
						<label for="">Status</label>
						<select class="custom-select" name="status">
							<option selected disabled>Please Select..</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>

            </div>
            <div class="modal-footer text-center" style="text-align: center;">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="previewBannerImage" aria-labelledby="previewBannerImageModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header py-2">
				<div class="display-4 font-18 pt-1">Slider Banner Image</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body pb-3 text-center">
				<img src="" id="slidersListBannerImage" alt="Sub Category Banner Image" class="img-fluid" style="max-height:340px;">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// File Size Reader
	function bytesToSize(bytes) {
		let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}


	$(document).ready(function() {
		// Image Preview
		$(document).on('change', '[name="banner"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});

		$(document).on('change', '[name="banner"]', function(event) {
			let file = event.target.files[0];
			let id = $(this).data('uid');
			$('#updateImg').html('<img src="" class="img-fluid" alt="..." id="div2" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
		});


		// Banner Image Preview from Table
		$(document).on('click', '.previewBannerImage', function() {
			let image = $(this).data('image');

			if (image) {
				$('#slidersListBannerImage').attr('src', image);
			}
		});


		// Edit Data
		$(document).on('click', '.editData', function() {
			const editable = {
				id: $(this).data('eid'),
				title: $(this).data('title'),
				sub_title: $(this).data('sub_title'),
				filepath: $(this).data('filepath'),
				status: $(this).data('status'),
			}

			if (editable) {
				$('[name="update_id"]').val(editable['id']);
				$('[name="update_image"]').val(editable['image']);
				$('[name="sliderHeaderAdmin"]').val(editable['title']);
				$('[name="sliderExerptAdmin"]').val(editable['sub_title']);
				$('.fileName').html(editable['image']);
				$('#updateImg').html('<img src="' + editable['filepath'] + '" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/>');
				$('[name="update_status"]').val(editable['status']);
			}
		});
	});
</script>
=======
</div>

<div id="addSlider" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewSliderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-2">
                <div class="display-4 font-18 pt-1">Add New Slider</div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Title</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="">Upload Slider Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" id="uploadIcon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </div>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input upload" name="slider" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div1" />
                                <label class="custom-file-label fileName pt-2" for="slider">Choose Logo File</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-0">
                        <div id="img"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Alter Text</label>
                        <input type="text" class="form-control" name="alter_text" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="custom-select" name="status">
                            <option selected disabled>Please Select..</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer py-2	">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="addNewSlider">Confirm and Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editSlider" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewSliderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-2">
                <div class="display-4 font-18 pt-1">Add New Slider</div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="update_id" value="">
                <input type="hidden" name="update_image" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="update_title" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Title</label>
                        <input type="text" class="form-control" name="update_sub_title" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Upload Slider Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" id="uploadIcon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </div>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input upload" name="slider" aria-describedby="uploadIcon" onchange="readURL(this);" set-to="div2" />
                                <label class="custom-file-label fileName pt-2" for="slider">Choose Logo File</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-0">
                        <div id="updateImg"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Alter Text</label>
                        <input type="text" class="form-control" name="update_alter_text" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="custom-select" name="update_status">
                            <option selected disabled>Please Select..</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer py-2	">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="updateSlider">Confirm and Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="previewSliderImage" aria-labelledby="previewSliderImageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <div class="display-4 font-18 pt-1">Slider Image</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-3 text-center">
                <img src="" id="sliderImage" alt="Slider Image" class="img-fluid" style="max-height:340px;">
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // File Size Reader
    function bytesToSize(bytes) {
        let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }


    $(document).ready(function() {
        // Image Preview
        $(document).on('change', '[name="slider"]', function(event) {
            let file = event.target.files[0];
            let id = $(this).data('uid');
            $('#img').html('<img src="" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
        });

        $(document).on('change', '[name="slider"]', function(event) {
            let file = event.target.files[0];
            let id = $(this).data('uid');
            $('#updateImg').html('<img src="" class="img-fluid" alt="..." id="div2" style="width:auto;max-height:180px;"/><div class="shadow p-2 mb-1 mt-2 bg-white rounded text-left"><strong>File Name: </strong>' + file.name + '</div><div class="shadow p-2 mb-1 bg-white rounded text-left"><strong>File Type: </strong>' + file.type + '</div><div class="shadow p-2 mb-2 bg-white rounded text-left"><strong>File Size: </strong>' + bytesToSize(file.size) + '</div>');
        });

        // Banner Image Preview from Table
        $(document).on('click', '.previewSliderImage', function() {
            let image = $(this).data('image');

            if (image) {
                $('#sliderImage').attr('src', image);
            }
        });



        // Edit Data
        $(document).on('click', '.editData', function() {
            const editable = {
                id: $(this).data('eid'),
                title: $(this).data('title'),
                sub_title: $(this).data('sub_title'),
                image: $(this).data('image'),
                filepath: $(this).data('filepath'),
                altertext: $(this).data('alt_text'),
                status: $(this).data('status'),
            }

            if (editable) {
                $('[name="update_id"]').val(editable['id']);
                $('[name="update_title"]').val(editable['title']);
                $('[name="update_sub_title"]').val(editable['sub_title']);
                $('[name="update_image"]').val(editable['image']);
                $('.fileName').html(editable['image']);
                $('#updateImg').html('<img src="' + editable['filepath'] + '" class="img-fluid" alt="..." id="div1" style="width:auto;max-height:180px;"/>');
                $('[name="update_alter_text"]').val(editable['altertext']);
                $('[name="update_status"]').val(editable['status']);
            }
        });
    });
</script>
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
