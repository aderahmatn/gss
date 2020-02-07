<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Buat Label</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('barcode') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="id" class="col-sm-2 col-form-label-sm">Barcode</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm" name="id" id="id" autocomplete="off" aria-describedby="id" value="<?= strtoupper(uniqid('BRD'))  ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="idspp" class="col-sm-2 col-form-label-sm">No SPP</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('idspp')?'is-invalid':''?>" name="idspp" id="idspp" aria-describedby="idspphelp">
									<option selected hidden value="">Pilih No SPP..</option>
									<?php foreach ($nospp as $dt) :?>
										<option value="<?=$dt->IdSpp?>" <?=set_value('nospp') == "$dt->IdSpp" ? "selected" : ''?>><?=ucfirst($dt->NoSpp);?> - <?=ucfirst($dt->NamaBarang);?> - <?=ucfirst($dt->QtyPlan);?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('idspp'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="idspphelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row">
							<label for="actualqty" class="col-sm-2 col-form-label-sm">Actual Qty</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('actualqty')?'is-invalid':''?>" name="actualqty" id="actualqty" autocomplete="off" aria-describedby="actualqtyhelp" value="<?=set_value('actualqty')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('actualqty'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="actualqtyhelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row">
							<label for="date" class="col-sm-2 col-form-label-sm">Lot No</label>
							<div class="col-sm-2">
								<input type="text" class="form-control form-control-sm" name="date" id="date" autocomplete="off" aria-describedby="date" value="<?=date('Y-m-d') ?>" readonly>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control form-control-sm <?php echo form_error('lotno')?'is-invalid':''?>" name="lotno" id="lotno" autocomplete="off" aria-describedby="lotno" value="">
							<div class="invalid-feedback">
									<?php echo form_error('lotno'); ?>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
						</div>
					</form>
				</div>
			</div>
		</div>