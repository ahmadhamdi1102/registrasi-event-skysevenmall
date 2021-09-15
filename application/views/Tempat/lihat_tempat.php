<div class="right_col" role="main">
<div class="page-header">
	<h3 class="text-center">Data Tempat</h3>
</div>

<a href="<?php echo base_url().'Tempat/tambah_tempat'; ?>" class="btn btn-sm btn-primary"><span class='glyphicon glyphicon-plus'></span>Tambah Tempat</a>
<br>
<div class="table-responsive">	
	<table class="table table-bordered table-hover table-striped" id="table-datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Id Tempat</th>
				<th>Nama Tempat</th>
				<th>Jenis Tempat</th>
				<th>Ukuran Tempat</th>			
				<th>Harga Tempat</th>
				<th>Kapasitas Tempat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($tempat as $t){ 
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $t->Id_Tempat ?></td>
					<td><?php echo $t->Nama_Tempat ?></td>
					<td><?php echo $t->Jenis_Tempat ?></td>
					<td><?php echo $t->Ukuran_Tempat ?></td>
					<td><?php echo "Rp. ".number_format($t->Harga_Tempat); ?></td>
					<td><?php echo $t->Kapasitas_Tempat ?></td>
					
					<td> 
						<a class="btn btn-sm btn-warning" href="<?php echo base_url().'Tempat/tampil_ubah/'.$t->Id_Tempat; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
						<a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini')" href="<?php echo base_url().'Tempat/hapus_tempat/'.$t->Id_Tempat; ?>"><span class="glyphicon glyphicon-trash"></span> </a>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$("#table-datatable").dataTable();
	});
</script>