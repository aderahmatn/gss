<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah No SPP</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('barang') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="kodebrg" class="col-sm-2 col-form-label-sm">Kode Barang</label>
							<div class="col-sm-6">
								<input type="hidden" name="id" id="id" value="<?=uniqid('BRG')?>" >

								<input type="text" class="form-control form-control-sm <?php echo form_error('kodebrg')?'is-invalid':''?>" name="kodebrg" id="kodebrg" autocomplete="off" aria-describedby="kodebrghelp" value="<?=set_value('kodebrg')?>">
								<div class="invalid-feedback">
									<?php echo form_error('kodebrg'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="kodebrghelp" class="form-text text-muted">Masukan Kode Barang Baru</small>`
							</div>
						</div>

						<div class="form-group row">
							<label for="namabrg" class="col-sm-2 col-form-label-sm">Nama Barang</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('namabrg')?'is-invalid':''?>" name="namabrg" id="namabrg" autocomplete="off" aria-describedby="namabrghelp" value="<?=set_value('namabrg')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('namabrg'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="namabrghelp" class="form-text text-muted">Masukan Nama Barang Baru</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="qty" class="col-sm-2 col-form-label-sm">Quantity/Box</label>
							<div class="col-sm-6">
								<input type="number" class="form-control form-control-sm <?php echo form_error('qty')?'is-invalid':''?>" name="qty" id="qty" autocomplete="off" aria-describedby="qtyhelp" value="<?=set_value('qty')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('qty'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="qtyhelp" class="form-text text-muted">Masukan Quantity per-box</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="box" class="col-sm-2 col-form-label-sm">Box</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('box')?'is-invalid':''?>" name="box" id="box" autocomplete="off" aria-describedby="boxhelp" value="<?=set_value('box')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('box'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="boxhelp" class="form-text text-muted"></small>
							</div>
						</div>

						<div class="form-group row">
							<label for="label" class="col-sm-2 col-form-label-sm">Label</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('label')?'is-invalid':''?>" name="label" id="label" autocomplete="off" aria-describedby="labelhelp" value="<?=set_value('label')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('label'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="labelhelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
							<button type="reset" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-window-close fa-sm"></i> reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		