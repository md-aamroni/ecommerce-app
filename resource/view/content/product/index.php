<div class="page-content-wrapper">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header font-16 mt-0 bg-light border-success py-2">

                    <div class="text-muted font-14 float-left">
                        <h5>Products Lists</h5>
                        Please make sure that, you have followed the instruction...
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