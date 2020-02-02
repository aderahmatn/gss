<div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card shadow mb-">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit User </h6>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="nik" class="col-form-label col-form-label-sm ">NIK *</label>
							<input type="hidden" name="id" value="<?=$row->IdUser?>">
							<input type="text" class="form-control form-control-sm <?php echo form_error('nik')?'is-invalid':''?>" id="nik" name="nik"   autofocus autocomplete="off" value="<?=$this->input->post('nik')?$this->input->post('nik'):$row->Nik ?>" aria-describedby="nikhelp" >
							<small id="nikhelp" class="form-text text-muted">Nomor induk karyawan harus berupa angka minimal 5 karakter.</small>
							<div class="invalid-feedback">
								<?php echo form_error('nik'); ?>
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="fullname" class="col-form-label col-form-label-sm">Nama Lengkap *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('fullname')?'is-invalid':''?>" id="fullname" name="fullname"  autocomplete="off" value="<?=$this->input->post('fullname')?$this->input->post('fullname'):$row->Nama ?>" aria-describedby="fullnamehelp" >
							<small id="fullnamehelp" class="form-text text-muted">Nama lengkap tidak boleh kosong, harus berupa huruf.</small>
							<div class="invalid-feedback">
								<?php echo form_error('fullname'); ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="gender" class="col-form-label col-form-label-sm">Jenis Kelamin *</label>
							<select class="form-control form-control-sm <?php echo form_error('gender')?'is-invalid':''?>" id="inlineFormCustomSelect" name="gender">
								<option value = "" selected hidden>Pilih...</option>
								<?php $gender = $this->input->post('gender')?$this->input->post('gender'):$row->Gender  ?>
								<option value="L" <?=$gender == "L" ? "selected" : ''?> >Laki-laki</option>
								<option value="P" <?=$gender == "P" ? "selected" : ''?> >Perempuan</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('gender'); ?>
							</div>
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-4">
							<label for="username" class="col-form-label col-form-label-sm ">Username *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('username')?'is-invalid':''?>" name="username"  value="<?=$this->input->post('username')?$this->input->post('username'):$row->Username ?>"  autocomplete="off" aria-describedby="usernamehelp">
							<small id="usernamehelp" class="form-text text-muted">Username berupa huruf atau angka minimal 5 karakter.</small>
							<div class="invalid-feedback">
								<?php echo form_error('username'); ?>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="password" class="col-form-label col-form-label-sm">Password Baru</label>
							<input type="password" class="form-control form-control-sm <?php echo form_error('password')?'is-invalid':''?>" name="password" autocomplete="off" aria-describedby="passwordhelp">
							<small id="passwordhelp" class="form-text text-muted">Kosongkan jika tidak ingin merubah password.</small>

							<div class="invalid-feedback">
								<?php echo form_error('password'); ?>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="confpassword" class="col-form-label col-form-label-sm">Konfirmasi Password </label>
							<input type="password" class="form-control form-control-sm <?php echo form_error('confpassword')?'is-invalid':''?>" name="confpassword" autocomplete="off" aria-describedby="confpasswordhelp">
							<small id="confpasswordhelp" class="form-text text-muted">Ulangi password.</small>
							<div class="invalid-feedback">
								<?php echo form_error('confpassword'); ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="level" class="col-form-label col-form-label-sm">Level *</label>
							<select class="form-control form-control-sm <?php echo form_error('level')?'is-invalid':''?>" id="level" name="level" >
								<?php $level = $this->input->post('level')?$this->input->post('level'):$row->Level  ?>
								<option value = "" selected hidden>Pilih...</option>
								<option value="1" <?=$level == "1" ? "selected" : ''?> >Admin</option>
								<option value="2" <?=$level == "2" ? "selected" : ''?> >Operator Handling</option>
							</select>
							<small id="level" class="form-text text-muted">Pilih level untuk menentukan hak akses halaman.</small>

							<div class="invalid-feedback">
								<?php echo form_error('level'); ?>

							</div>
						</div>
					</div>

					<div class="card-footer text-right">
						<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>