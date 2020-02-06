
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data SPB</h6>
		<div class="button">
			<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('spb/create') ?>"><i class="fas fa-plus"></i>
				Buat SPB
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="58"><i class="fas fa-print"></i></th>
						<th>No SPB</th>
						<th>No Mesin</th>
						<th>Jumlah SPP</th>
						<th width="10"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($spb as $dt) :?>
						<tr>
							<td><a href="<?php echo site_url('spb/printSpb/'.$dt->IdSpb) ?>"
								class="btn btn-sm btn-secondary" target="_blank" ><i class="fas fa-print"></i> Cetak</a></td>
								<td><?php echo strtoupper($dt->IdSpb)  ?></td>
								<td><?php echo strtoupper($dt->NoMc)  ?></td>
								<td><?php echo strtoupper($dt->jml) ?></td>
								<td>
									<a onclick="deleteConfirm('<?=site_url('spb/delete/'.$dt->IdSpb)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>