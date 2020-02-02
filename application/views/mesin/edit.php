<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Mesin</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('mesin') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="nomc" class="col-sm-2 col-form-label-sm">No MC</label>
							<div class="col-sm-6">
								<input type="hidden" name="id" id="id" value="<?=$mesin->IdMesin?>" >

								<input type="text" class="form-control form-control-sm <?php echo form_error('nomc')?'is-invalid':''?>" name="nomc" id="nomc" autocomplete="off" aria-describedby="nomchelp" value="<?=$this->input->post('nomc')?$this->input->post('nomc'):$mesin->NoMc ?>">
								<div class="invalid-feedback">
									<?php echo form_error('nomc'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="nomchelp" class="form-text text-muted">Nomor mesin</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="merk" class="col-sm-2 col-form-label-sm">Merk</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('merk')?'is-invalid':''?>" name="merk" id="merk" autocomplete="off" aria-describedby="merkhelp" value="<?=$this->input->post('merk')?$this->input->post('merk'):$mesin->Merk ?>" >
								<div class="invalid-feedback">
									<?php echo form_error('merk'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="merk" class="form-text text-muted">Merk mesin</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="tonase" class="col-sm-2 col-form-label-sm">Tonasi</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('tonase')?'is-invalid':''?>" name="tonase" id="tonase" autocomplete="off" aria-describedby="tonasehelp" value="<?=$this->input->post('tonase')?$this->input->post('tonase'):$mesin->Tonase ?>" >
								<div class="invalid-feedback">
									<?php echo form_error('tonase'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="tonase" class="form-text text-muted">Isian harus berupa angka</small>
							</div>
						</div>

						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
							
						</div>
					</form>
				</div>
			</div>
		</div>
		