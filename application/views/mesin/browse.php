<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Mesin</h6>
				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('mesin/create') ?>"><i class="fas fa-plus"></i>
						Tambah Mesin
					</a>
				</div>
			</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>No-MC</th>
									<th>Merk</th>
									<th>Tonase</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
								foreach ($mesin as $dt) :?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $dt->NoMc ?></td>
										<td><?php echo $dt->Merk ?></td>
										<td><?php echo $dt->Tonase ?></td>
										<td><a href="<?php echo site_url('mesin/update/'.$dt->IdMesin) ?>"
											class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

											<a onclick="deleteConfirm('<?=site_url('mesin/delete/'.$dt->IdMesin)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>