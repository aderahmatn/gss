<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data No SPP</h6>
				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('nospp/create') ?>"><i class="fas fa-plus"></i>
						Buat No SPP
					</a>
				</div>
			</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>No SPP</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Qty Planning</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
								foreach ($nospp as $dt) :?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo strtoupper($dt->NoSpp)  ?></td>
										<td><?php echo strtoupper($dt->KodeBarang)  ?></td>
										<td><?php echo strtoupper($dt->NamaBarang) ?></td>
										<td><?php echo strtoupper($dt->QtyPlan) ?></td>
										<td><a href="<?php echo site_url('nospp/update/'.$dt->IdSpp) ?>"
											class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

											<a onclick="deleteConfirm('<?=site_url('nospp/delete/'.$dt->IdSpp)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>