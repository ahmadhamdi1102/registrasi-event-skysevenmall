<div class="right_col" role="main">
	
	<section class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" style="margin-top: 100px;">
					<img src="<?php echo base_url('assets/') ?>/t.png" alt="..." class="img-circle profile_img" style="height: 120px; width: auto;  position: absolute; top: -1%; left: 25%;">

					<div class="panel-body">
						<h3 class="text-center">FORM UBAH TEMPAT</h3>
	
<?php foreach($tempat as $t){ ?>
		<form action="<?php echo base_url('Tempat/ubah_tempat') ?>" method="post"> 
			
				<input type="hidden" name="Id_Tempat" class="form-control" value="<?php echo $t->Id_Tempat; ?>">		
			
			
			<div class="form-group">
				<label>Nama Tempat</label>
				<input type="text" name="Nama_Tempat" class="form-control" value="<?php echo $t->Nama_Tempat; ?>">		
			
			</div>
			
			<div class="form-group" type >
				<label >Jenis Tempat</label>
				<select name="Jenis_Tempat" class="form-control" >
					<option value="<?php echo $t->Id_Tempat; ?>"><?php echo $t->Jenis_Tempat; ?></option>
					<option value="indoor">Indoor</option>
					<option value="outdoor">Outdoor</option>
				</select>
				
			</div>	

			
			<div class="form-group">
				<label>Ukuran Tempat</label>
				<input type="text" name="Ukuran_Tempat" class="form-control" value="<?php echo $t->Ukuran_Tempat; ?>">		
				
			</div>

			<div class="form-group">		
				<label>Harga Tempat</label>
				<input type="text" name="Harga_Tempat" class="form-control" value="<?php echo $t->Harga_Tempat; ?>">			
			</div>

			<div class="form-group">				
				<label>Kapasitas Tempat</label>
				<input type="text" name="Kapasitas_Tempat" class="form-control" value="<?php echo $t->Kapasitas_Tempat; ?>" >		
			</div>

			
	
			<div class="form-group text-right">
				<a href="<?php echo base_url().'Tempat/lihat_tempat'; ?>" class="btn btn-sm btn-warning">Batal</a>							
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
