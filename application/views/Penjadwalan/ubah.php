<div class="right_col" role="main">
	
	<section class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="margin-top: 100px;">
					`<img src="<?php echo base_url('assets/') ?>/user.png" alt="..." class="img-circle profile_img" style="height: 120px; width: auto;  position: absolute; top: -1%; left: 25%;">

					<div class="panel-body">
						<h3 class="text-center">FORM UBAH STATUS</h3>
	
	<?php foreach($pelanggan as $p){ ?>
		<form action="<?php echo base_url().'Penjadwalan/ubah_status' ?>" method="post"> 
			<div class="form-group" type >
				<label >Status</label>
				<select name="Status" class="form-control" readonly>
					<option value="Belum terlaksana">Belum terlaksana</option>
					<option value="Terlaksana">Terlaksana</option>
				</select>
				
			</div>	

			<div class="form-group">				
				<label>Tanggal Booking</label>
				<input type="date" name="Tgl_Booking" class="form-control" value="<?php echo $p->Tgl_Booking; ?>">			
			</div>
			
			<input type="hidden" name="Id_Pendaftaran" class="form-control" value="<?php echo $p->Id_Pendaftaran; ?>">		
			
			<input type="hidden" name="No_KTP" class="form-control" value="<?php echo $p->No_KTP; ?>">
			<input type="hidden" name="Nama_Pelanggan" class="form-control" value="<?php echo $p->Nama_Pelanggan; ?>">
			<input type="hidden" name="Alamat" class="form-control" value="<?php echo $p->Alamat; ?>">
			<input type="hidden" name="No_HP" class="form-control" value="<?php echo $p->No_HP; ?>">
			<input type="hidden" name="Tgl_Pendaftaran" class="form-control" value="<?php echo $p->Tgl_Pendaftaran; ?>">			
				
			<?php foreach($paket as $pk){ ?>		
			<input type="hidden" name="Paket" class="form-control" value="<?php echo $pk->id_paket; ?>">
			<?php } ?>

			<?php foreach($tempat as $t){ ?>
			<input type="hidden" name="Tempat" class="form-control" value="<?php echo $t->Id_Tempat; ?>">
			<?php } ?>

			<?php foreach($pegawai as $data){ ?>
				<input type="hidden" name="Pegawai" class="form-control" value="<?php echo $data->id_pegawai; ?>">
			<?php } ?>

			

					

			<div class="form-group text-right">
				<a href="<?php echo base_url().'Penjadwalan/lihat_penjadwalan'; ?>" class="btn btn-sm btn-warning">Batal</a>					
				<input type="submit" value="Simpan" class="btn btn-primary" id="simpan" >	
			</div>
		</form>
<?php } ?>
						
					</div>
				</div>
			</div>
			
		</div>
		
	</section>



	
		

</div>
