
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Laporan Per-Part</h6>
		<div class="button">
			<form method="post" action="<?=base_url('report/exportStok') ?>">
				<button type="submit" class="btn btn-primary text-white btn-sm"><i class="fas fa-download"></i>
				 Export
			</button>
			</form>
		</div>
	</div>
	<div class="card-body">
		
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Qty Planning</th>
					<th>Quantity</th>
					<th>Selisih</th>
				</tr>
				<tbody>
					<?php $no=1;
					foreach ($stok as $dt) :?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo strtoupper($dt->KodeBarang)?></td>
							<td><?php echo $dt->NamaBarang ?></td>
							<td><?php echo $dt->QtyPlan ?></td>
							<td><?php echo $dt->stok ?></td>
							<td><?php echo $dt->QtyPlan-$dt->stok ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>