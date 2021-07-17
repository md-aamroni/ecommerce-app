<div class="page-content-wrapper">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header font-16 mt-0 bg-light border-success py-2">
					Invoice Lists
					<div class="text-muted font-14">Please make sure that, you have followed the instruction...</div>
				</div>
				<div class="card-body pb-3">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table dt-responsive nowrap table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Cstm.Id</th>
									<th scope="col">Order.Id</th>
									<th scope="col">Invoice.Id</th>
                           <th scope="col">Shopping.Id</th>
									<th scope="col">Billing.Id</th>
									<th scope="col">Order Status</th>
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