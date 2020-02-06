
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Label Barcode</h6>
				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('barcode/create') ?>"><i class="fas fa-plus"></i>
						Buat Label
					</a>
				</div>
			</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th></th>
									<th>Barcode</th>
									<th>NoSpp</th>
									<th>Nama Part</th>
									<th>Lot No</th>
									<th>Q Plan</th>
									<th>Q Act</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($brd as $dt) :?>
									<tr>
										<td><a href="<?php echo site_url('barcode/printbar/'.$dt->idbarcode) ?>"
											class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a></td>
										<td><?php echo strtoupper($dt->idbarcode)  ?></td>
										<td><?php echo strtoupper($dt->NoSpp)  ?></td>
										<td><?php echo strtoupper($dt->NamaBarang) ?></td>
										<td><?php echo strtoupper($dt->Date)."-". strtoupper($dt->Lot)?></td>
										<td><?php echo strtoupper($dt->QtyPlan) ?></td>
										<td><?php echo strtoupper($dt->ActualQty) ?></td>
										<td>
											<a onclick="deleteConfirm('<?=site_url('barcode/delete/'.$dt->idbarcode)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>