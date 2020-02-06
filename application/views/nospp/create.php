<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah No SPP</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('nospp') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="nospp" class="col-sm-2 col-form-label-sm">No SPP</label>
							<div class="col-sm-6">
								<input type="hidden" name="id" id="id" value="<?=uniqid('SPP')?>" >
								<input type="text" class="form-control form-control-sm <?php echo form_error('nospp')?'is-invalid':''?>" name="nospp" id="nospp" autocomplete="off" aria-describedby="nospphelp" value="AHM<?= sprintf("%04s", $No_SPP) ?>" readonly>
								<div class="invalid-feedback">
									<?php echo form_error('nospp'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="nospphelp" class="form-text text-muted"></small>`
							</div>
						</div>
						<div class="form-group row">
							<label for="kodebrg" class="col-sm-2 col-form-label-sm">Kode Part</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('kodebrg')?'is-invalid':''?>" name="kodebrg" id="kodebrg" aria-describedby="kodebrghelp">
									<option selected hidden value="">Pilih Part..</option>
									<?php foreach ($barang as $dt) :?>
										<option value="<?=$dt->IdBarang?>" <?=set_value('kodebrg') == "$dt->IdBarang" ? "selected" : ''?>><?=ucfirst($dt->NamaBarang);?> - <small><?=ucfirst($dt->IdBarang);?></small> </option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kodebrg'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="positionhelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row">
							<label for="qtyplan" class="col-sm-2 col-form-label-sm">Quantity Plannning</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('qtyplan')?'is-invalid':''?>" name="qtyplan" id="qtyplan" autocomplete="off" aria-describedby="qtyplanhelp" value="<?=set_value('qtyplan')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('qtyplan'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="qtyplanhelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		