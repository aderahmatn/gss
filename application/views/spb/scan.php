
<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Scan Barcode</h6>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="<?=base_url('spb/scanbar') ?>" method="post">
						<input type="hidden" name="id" value="<?= $val['id'] ?>">
						<input type="hidden" name="nomc" value="<?= $val['nomc'] ?>">
						<div class="form-group row">
							<div class="col-sm-9">
								<input type="text" class="form-control form-control-sm" name="barcode" id="barcode" autocomplete="off" aria-describedby="barcode" autofocus="true" autocomplete="false" placeholder="Scan barcode disini.." required="true">
								<div class="invalid-feedback">
									<?php echo form_error('barcode'); ?>
								</div>
							</div>
							<div class="col-sm-3">
								<button type="submit" class="btn btn-primary btn-sm shadow-sm"> Submit</button>
							</div>
						</div>
					</form>
					<table class="table ">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Barcode</th>
								<th scope="col">No SPP</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;
								foreach ($scan as $dt) :?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo strtoupper($dt->IdBarcode)  ?></td>
										<td><?php echo strtoupper($dt->NoSpp)  ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
						</tbody>
					</table>
					<div class="card-footer text-right">
						<a href=" <?=base_url('spb') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-check"></i>  Selesai</a>
					</div>
					
				</div>
			</div>
		</div>