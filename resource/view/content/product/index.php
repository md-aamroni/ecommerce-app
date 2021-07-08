<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
		<div class="card">
                <div class="card-header font-16 mt-0 bg-light border-success py-2">

                    <div class="text-muted font-14 float-left">
                        <h5>Products Lists</h5>
                        Please make sure that, you have followed the instruction...
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add Product</button>
                    </div>

                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Add Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                  
                                        <div class="form-group">
                                            <label for="productTitleAdmin">Product title</label>
                                            <input type="email" class="form-control" id="productTitleAdmin" placeholder="Enter Product title ">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="productDetilasAdmin">Product Exerpt</label>
                                            <input type="text" class="form-control" id="productDetilasAdmin" placeholder="Enter phone number ">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="productImageAdmin">Product Image</label>
                                            <input type="file" class="form-control" id="productImageAdmin" placeholder="select image">
                                            
                                        </div>

										<div class="form-group">
                                            <label for="avilabePriceAdmin">Avilabe price</label>
                                            <input type="number" class="form-control" id="avilabePriceAdmin" placeholder="Enter Avilabe price">
                                            
                                        </div>
										
										<!-- also check % and direct vlalue -->
										<div class="form-group">
                                            <label for="offerPriceAdmin">offer price</label>
                                            <input type="number" class="form-control" id="offerPriceAdmin" placeholder="Enter offer price">
                            
                                        </div>

										<div class="form-group">
											<label for="productCategoryAdmin">category</label>
											<select name="productCategoryAdmin" id="productCategoryAdmin" class="form-control" required>
											
											<option value="" >Select category</option>
											<option value="mobile">mobile</option>
											</select>

										</div>
										
										
										<div class="form-group">
											<label for="productSubCategoryAdmin">Sub-category</label>
											<select name="productSubCategoryAdmin" id="productSubCategoryAdmin" class="form-control" required>
											
											<option value="" >Select sub-category</option>
											<option value="mobile">Apple</option>
											</select>

										</div>
                                    
                                      
                                       
                                    
                                </div>
                                <div class="modal-footer text-center" style="text-align: center;">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-3">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Exerpt</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Sub-category</th>
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


		</div>
	</div>
</div>
