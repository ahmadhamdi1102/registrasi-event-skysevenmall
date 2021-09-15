<div class="right_col" role="main">
	
	<section class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="margin-top: 100px;">
					`<img src="<?php echo base_url('assets/') ?>/user.png" alt="..." class="img-circle profile_img" style="height: 120px; width: auto;  position: absolute; top: -1%; left: 25%;">

					<div class="panel-body">
						<h3 class="text-center">FORM PENDAFTARAN EVENT</h3>
	
	
		<?php echo validation_errors(); ?>
		<form action="<?php echo base_url().'Pendaftaran/simpan_pendaftaran' ?>" method="post"> 
			<!-- <div class="form-group">
				<label>Id Pendaftaran</label>
				<input type="text" name="Id_Pendaftaran" class="form-control">		
			
			</div> -->
			
			<div class="form-group">
				<label>No. KTP</label>
				<input type="text" name="No_KTP" class="form-control">		
			
			</div>
			
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" name="Nama_Pelanggan" class="form-control">		
				
			</div>

			<div class="form-group">		
				<label>Alamat</label>
				<textarea name="Alamat" class="form-control"></textarea>			
			</div>

			<div class="form-group">				
				<label>No. HP</label>
				<input type="number" name="No_HP" class="form-control" id="hp" onkeyup="batas()"  >
				<div id="salah"></div>		
			</div>

			<div class="form-group">				
				<label>Tanggal Pendaftaran</label>
				<input type="date" name="Tgl_Pendaftaran" class="form-control">			
			</div>

			<div class="form-group">				
				<label>Tanggal Booking</label>
				<input type="date" name="Tgl_Booking" class="form-control">			
			</div>

			<div class="form-group">
				<label>Paket</label>
					<select name="Paket" class="form-control">
						<option value="">-Pilih Paket-</option>
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
				<label>Tempat</label>
					<select name="Tempat" class="form-control">
						<option value="">-Pilih Tempat-</option>
						<?php foreach($tempat as $t){ ?>
						<option value="<?php echo $t->Id_Tempat; ?>"><?php echo $t->Nama_Tempat; ?></option>
						<?php } ?>
					</select>	
		
			</div>

<!-- batas lookup -->
			<div class="panel panel-primary">
				<div class="panel-heading">Detail Tempat</div>
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
						<option value="">-Pilih Pegawai-</option>
						<?php foreach($pegawai as $data){ ?>
						<option value="<?php echo $data->id_pegawai; ?>"><?php echo $data->nama; ?></option>
						<?php } ?>
					</select>	
		
			</div>

			<input type="hidden" name="Status" value="Belum terlaksana">	

			<!-- <div class="form-group" type >
				<label >Status</label>
				<select name="Status" class="form-control" readonly>
					<option value="Belum terlaksana">Belum terlaksana</option>
					<option value="Terlaksana">Terlaksana</option>
				</select>
				
			</div>	 -->

			<div class="form-group text-right">						
				<input type="submit" value="Simpan" class="btn btn-primary" id="simpan" >	
			</div>
		</form>

						
					</div>
				</div>
			</div>
			
		</div>
		
	</section>



	
		

</div>

<script type="text/javascript">
	var a = document.getElementById('hp');
	var b = document.getElementById('salah');

	

	function batas(){
		if(a.value.length > 12){
			b.style.backgroundColor = "red";
			b.style.width = "100%";
			b.innerHTML = "Nomor melebihi batas maksimal 12 angka";
		}else if(a.value.length < 11 ) {
			b.style.backgroundColor = "yellow";
			b.style.width = "30%";
			b.innerHTML = "Nomor min " + (12 - a.value.length) +" angka lagi";
		}else if(a.value.length = 11 ){
			b.style.backgroundColor = "blue";
			b.style.width = "50%";
			b.innerHTML = "sesuai format";
		}
	}
	
</script>