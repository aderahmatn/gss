<div class="row">
	<div class="col-12">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Laporan SPB Periodik</h6>
				<div class="button">
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<div class="alert alert-primary" role="alert"><i class="fas fa-info-circle"></i>
						Silahkan masukan tanggal awal dan tanggal akhir untuk menampilkan laporan.
					</div>
					<form action="<?=base_url('report/tampilPeriodik') ?>" method="post">
						<div class="row">
							<div class="col-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="date" class="form-control" id="tglmulai" name="tglmulai">
								</div>
							</div>
							s/d
							<div class="col-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
									</div>
									<input type="date" class="form-control" id="tglakhir" name="tglakhir">
								</div>
							</div>
							<div class="col-2">
								<button type="submit" class="btn btn-primary ">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

