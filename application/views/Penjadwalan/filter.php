<div class="right_col" role="main">
<div class="page-header">
	<h3 class="text-center">Penjadwalan Event</h3>
</div>

<br/>

<section class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form  method="post" action="<?php echo base_url().'Penjadwalan/filter' ;?>">
 
				<div class="form-group col-md-4">
					<label>Dari Tanggal</label>	
					<input type="date" name="dari" class="form-control" value="<?php echo set_value('dari'); ?>">

				</div>
				<div class="form-group col-md-4">
					<label>Sampai Tanggal</label>	
					<input type="date" name="sampai" class="form-control" value="<?php echo set_value('sampai'); ?>">
					
				</div>	
				<div class="form-group col-md-4">
					<input style="position: absolute; top: 25px; left: 20px" type="submit" value="Filter data" name="filter" class="btn btn-sm btn-primary ">
				</div>

			</form>
		</div>
	</div>
	
</section>

<br>

<div class="table-responsive">	
	<table class="table table-bordered table-hover table-striped" id="table-datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Pelanggan</th>
				<th>Nama Tempat</th>
				<th>Tanggal Booking</th>
				<th>Penanggung Jawab</th>
				<th>Status</th>			
			
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($filter as $data){ 
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data->Nama_Pelanggan ?></td>
					<td><?php echo $data->Nama_Tempat ?></td>
					<td><?php echo date('d/m/Y',strtotime($data->Tgl_Booking)) ?></td>
					<td><?php echo  $data->nama ?></td>
					<td>
						<?php echo  $data->Status ?>
						<a style="margin-left: 20px" class="btn btn-sm btn-warning" href="<?php echo base_url().'Penjadwalan/tampil_ubah/'.$data->Id_Pendaftaran; ?>"><span class="glyphicon glyphicon-pencil"></span> </a>
						
					</td>				
					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>