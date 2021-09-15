<div class="right_col" role="main">
	
	<section class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="margin-top: 100px;">
					`<img src="<?php echo base_url('assets/') ?>/user.png" alt="..." class="img-circle profile_img" style="height: 120px; width: auto;  position: absolute; top: -1%; left: 25%;">

					<div class="panel-body">
						<h3 class="text-center">FORM UBAH DATA PELANGGAN</h3>
	
	<?php foreach($pelanggan as $p){ ?>
		<form action="<?php echo base_url().'Pelanggan/ubah_pelanggan' ?>" method="post"> 
			
			
				<input type="hidden" name="Id_Pendaftaran" class="form-control" value="<?php echo $p->Id_Pendaftaran; ?>">		
		
			
			<div class="form-group">
				<label>No. KTP</label>
				<input type="text" name="No_KTP" class="form-control" value="<?php echo $p->No_KTP; ?>">		
			
			</div>
			
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" name="Nama_Pelanggan" class="form-control" value="<?php echo $p->Nama_Pelanggan; ?>">		
				
			</div>

			<div class="form-group">		
				<label>Alamat</label>
				<textarea name="Alamat" class="form-control"><?php echo $p->Alamat; ?></textarea>			
			</div>

			<div class="form-group">				
				<label>No. HP</label>
				<input type="number" name="No_HP" class="form-control" value="<?php echo $p->No_HP; ?>">		
			</div>

			<div class="form-group">				
				<label>Tanggal Pendaftaran</label>
				<input type="date" name="Tgl_Pendaftaran" class="form-control" value="<?php echo $p->Tgl_Pendaftaran; ?>">			
			</div>

			<div class="form-group">				
				<label>Tanggal Booking</label>
				<input type="date" name="Tgl_Booking" class="form-control" value="<?php echo $p->Tgl_Booking; ?>">			
			</div>

			<div class="form-group">
				<label>Paket</label>
					<select name="Paket" class="form-control">
						<option value="<?php echo $p->Paket; ?>">-Ubah Paket-</option>
						<?php foreach($paket as $pk){ ?>
						<option value="<?php echo $pk->id_paket; ?>"><?php echo $pk->nama_paket; ?></option>
						<?php } ?>
					</select>	
		
			</div>

<!-- batas lookup -->
			<div class="panel panel-primary">
				<div class="panel-heading">Detail Paket</div>
				<div class="panel-body">
					<div class="table-responsive">	
						<table class="table table-bordered table-hover table-striped" >
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Paket</th>
									<th>Harga</th>
									
								</tr>
							</thead>
							<tbody>
							<?php 
								$no = 1;
								foreach($paket as $pk){ 
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $pk->nama_paket?></td>
								<td><?php echo "Rp. ".number_format($pk->harga); ?></td>
					
							</tr>
							<?php }	?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>


<!-- batas lookup -->
			
			<div class="form-group">
				<label>Detail Tempat</label>
					<select name="Tempat" class="form-control">
						<option value="<?php echo $p->Tempat; ?>">-Ubah Tempat-</option>
						<?php foreach($tempat as $t){ ?>
						<option value="<?php echo $t->Id_Tempat; ?>"><?php echo $t->Nama_Tempat; ?></option>
						<?php } ?>
					</select>	
		
			</div>

			

<!-- batas lookup -->
			<div class="panel panel-primary">
				<div class="panel-heading">Data Tempat</div>
				<div class="panel-body">
					<div class="table-responsive">	
						<table class="table table-bordered table-hover table-striped" >
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Tempat</th>
									<th>Jenis Tempat</th>
									<th>Ukuran Tempat</th>
									<th>Kapasitas Tempat</th>
									<th>Harga Tempat</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no = 1;
								foreach($tempat as $t){ 
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $t->Nama_Tempat; ?></td>
								<td><?php echo $t->Jenis_Tempat; ?></td>
								<td><?php echo $t->Ukuran_Tempat; ?></td>
								<td><?php echo $t->Kapasitas_Tempat; ?></td>
								<td><?php echo "Rp. ".number_format($t->Harga_Tempat); ?></td>
					
							</tr>
							<?php }	?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>


<!-- batas lookup -->


			

			<div class="form-group">
				<label>Penanggung Jawab</label>
					<select name="Pegawai" class="form-control">
						<option value="<?php echo $p->Pegawai; ?>">-Ubah Penanggung Jawab-</option>
						<?php foreach($pegawai as $data){ ?>
						
						<option value="<?php echo $data->id_pegawai; ?>"><?php echo $data->nama; ?></option>
						<?php } ?>
					</select>	
		
			</div>

			<input type="hidden" name="Status" value="Belum terlaksana">

			

			<div class="form-group text-right">
				<a href="<?php echo base_url().'Pelanggan/lihat_pelanggan'; ?>" class="btn btn-sm btn-warning">Batal</a>					
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
