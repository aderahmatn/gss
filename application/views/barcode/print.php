
<div class="row">
	<div class="col-12">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Pertinjau Label</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('barcode') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<div id="printableArea">
						<div class="row">
							<div class="col-5">
								<!-- Collapsable Card -->
								<div class="card border-dark mb-4">
									<!-- Card Header - Accordion -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-dark text-align-center">LABEL IDENTITAS PART</h6>
									</div>
									<!-- Card Content - Collapse -->
									<div class="collapse show" id="createProduct">
										<div class="card-body">
											<table class="table table-bordered table-sm">
												<tbody>
													<tr>
														<th>NAMA PART</th>
														<td><?=$barcode->NamaBarang?></td>
													</tr>
													<tr>
														<th>KODE PART</th>
														<td><?=$barcode->KodeBarang?></td>
													</tr>
													<tr>
														<th>ACTUAL QTY</th>
														<td><?=$barcode->ActualQty?></td>
													</tr>
													<tr>
														<th>LOT NO</th>
														<td><?=$barcode->Date?> - <?= strtoupper($barcode->Lot) ?></td>
													</tr>
													<tr>
														<th>NO SPP</th>
														<td><?=$barcode->NoSpp?></td>
													</tr>
													
												</tbody>
											</table>
											<?php 
											$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
											echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barcode->idbarcode, $generator::TYPE_CODE_128,1.3,40)) . '">';
											echo strtoupper($barcode->idbarcode) ;
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<button type="submit" class="btn btn-primary btn-sm shadow-sm"  onclick="printDiv('printableArea')"><i class="fas fa-print fa-sm"></i> Print</button>
				</div>
			</div>
		</div>	
	</div>
</div>


<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>