<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Laporan Periodik</h6>
		<div class="button">
			<form method="post" action="<?=base_url('report/exportPeriodik') ?>">
				<input type="hidden" name="tgl1" value="<?=$tgl1 ?>">
				<input type="hidden" name="tgl2" value="<?=$tgl2 ?>">
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
					<th>Tgl</th>
					<th>Grp</th>
					<th>No SPP</th>
					<th>Kode Part</th>
					<th>Nama Part</th>
					<th>Qty Plan</th>
					<th>Qty Actual</th>
				</tr>
				<tbody>
					<?php $no=1;
					foreach ($barcode as $dt) :?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $dt->Date ?></td>
							<td><?php echo strtoupper($dt->Lot)  ?></td>
							<td><?php echo strtoupper($dt->NoSpp)  ?></td>
							<td><?php echo strtoupper($dt->KodeBarang) ?></td>
							<td><?php echo strtoupper($dt->NamaBarang) ?></td>
							<td><?php echo $dt->QtyPlan ?></td>
							<td><?php echo $dt->ActualQty ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>