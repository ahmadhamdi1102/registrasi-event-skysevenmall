<div class="right_col" role="main">
	
	<section class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="margin-top: 100px;">
	 				<img src="<?php echo base_url('assets/') ?>/t.png" alt="..." class="img-circle profile_img" style="height: 120px; width: auto;  position: absolute; top: -3%; left: 25%;">

					<div class="panel-body">
						<h3 class="text-center">FORM TAMBAH TEMPAT</h3>
	
		<?php echo validation_errors(); ?>
		<form action="<?php echo base_url().'Tempat/tambah_tempat' ?>" method="post"> 
			<!-- <div class="form-group">
				<label>Id Tempat</label>
				<input type="text" name="Id_Tempat" class="form-control">		
				
			</div> -->

			<div class="form-group">
				<label>Nama Tempat</label>
				<input type="text" name="Nama_Tempat" class="form-control">		
				
			</div>
			
			<div class="form-group" type >
				<label >Jenis Tempat</label>
				<select name="Jenis_Tempat" class="form-control" >
					<option value="indoor">Indoor</option>
					<option value="outdoor">Outdoor</option>
				</select>
				
			</div>	
			
			<div class="form-group">
				<label>Ukuran Tempat</label>
				<input type="text" name="Ukuran_Tempat" class="form-control">		
				
			</div>

			<div class="form-group">		
				<label>Harga Tempat</label>
				<input type="number" name="Harga_Tempat" class="form-control">
				<p>*diisi dengan format angka</p>			
			</div>

			<div class="form-group">				
				<label>Kapasitas Tempat</label>
				<input type="text" name="Kapasitas_Tempat" class="form-control">		
			</div>

									
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
