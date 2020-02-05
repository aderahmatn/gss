
<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Buat SPB</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('spb') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<input type="hidden" name="id" value="<?= uniqid('SPB') ?>">
						<div class="form-group row">
							<label for="nomc" class="col-sm-2 col-form-label-sm">Mesin</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('nomc')?'is-invalid':''?>" name="nomc" id="nomc" aria-describedby="nomchelp">
									<option selected hidden value="">Pilih No MC..</option>
									<?php foreach ($mesin as $dt) :?>
										<option value="<?=$dt->IdMesin?>" <?=set_value('nomc') == "$dt->IdMesin" ? "selected" : ''?>><?=ucfirst($dt->NoMc);?> - <small><?=ucfirst($dt->Merk);?></small> </option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('nomc'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="idspphelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-qrcode"></i>  scan barcode</button>
						</div>
					</form>
				</div>
			</div>
		</div>