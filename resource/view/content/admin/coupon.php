<div class="page-content-wrapper">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header font-16 mt-0 bg-light border-success py-2">

                    <div class="text-muted font-14 float-left">
                        <h5>Cupon Lists</h5>
                        Please make sure that, you have followed the instruction...
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add cupon</button>
                    </div>

                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Add Cupon</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="cuponName">Cupon name</label>
                                            <input type="text" class="form-control" id="cuponName" aria-describedby="emailHelp" placeholder="Enter cupon name">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="couponPrice">Fixt price</label>
                                            <input type="number" class="form-control" id="couponPrice" placeholder="Enter fixt price ">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="offerForCupon">Free for: % free</label>
                                            <input type="number" class="form-control" id="offerForCupon" placeholder="amount of coupon ">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="durationOffer">Time</label>
                                            <input type="number" class="form-control" id="durationOffer" placeholder="define time limit ">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="productId">Product Id</label>
                                            <input type="number" class="form-control" id="productId" placeholder="enter product Id">
                                            
                                        </div>
                                      
                                       
                                    
                                </div>
                                <div class="modal-footer text-center" style="text-align: center;">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>

                <div class="card-body pb-3">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Departments</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Modified</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Date Modified: <?php echo dateFormat(date('Y-m-d H:i:s'), 6); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header font-16 mt-0 bg-light border-success py-2">
                            How it Use
                            <div class="text-muted font-14">See the following instruction...</div>
                        </div>
                        <div class="card-body text-muted">
                            <div class="font-12">1. To change items status please click the status <code class="ml-1">button</code></div>
                            <div class="font-12">2. To preview details about admin, please click the profile <code class="ml-1">button</code></div>
                            <div class="font-12">3. <code>[recommanded]</code> To avoid any error make sure all the fields are filled as required during add an item</div>
                            <div class="font-12">4. <code>[recommanded]</code> To delete an item, may not works due to using anywhere else</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header font-16 mt-0 bg-light border-success pt-2 pb-1">
                            <div class="float-left">
                                Profile Details
                                <div class="text-muted font-14">Please click to the <code>Preview</code> button for more details...</div>
                            </div>
                            <div class="float-right">
                                <img src="<?php echo asset('images/placeholder.jpg'); ?>" alt="Profile Image" id="profileImage" class="thumb-md rounded-circle">
                            </div>
                        </div>
                        <div class="card-body" id="profileDetails">
                            <div class="display-4 font-16 text-center text-muted">Doctor Profile Details Appear Here..</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>