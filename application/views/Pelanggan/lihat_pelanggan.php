<div class="right_col" role="main">
<div class="page-header">
	<h3 class="text-center">Data Pelanggan</h3>
</div>

<br/>
<div class="table-responsive">	
	<table class="table table-bordered table-hover table-striped" id="table-datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Id Pendaftaran</th>
				<th>No. KTP</th>
				<th>Nama Pelanggan</th>
				<th>Alamat</th>			
				<th>No. Hp</th>
				<th>Tanggal Pendaftaran</th>
				<th>Tanggal Booking</th>
				<!-- <th>Tempat</th>
				<th>Paket</th> -->
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($pelanggan as $p){ 
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $p->Id_Pendaftaran ?></td>
					<td><?php echo $p->No_KTP ?></td>
					<td><?php echo $p->Nama_Pelanggan ?></td>
					<td><?php echo $p->Alamat ?></td>
					<td><?php echo $p->No_HP ?></td>
					<td><?php echo date('d/m/Y',strtotime($p->Tgl_Pendaftaran)) ?></td>
					<td><?php echo date('d/m/Y',strtotime($p->Tgl_Booking)) ?></td>
					<!-- <td><?php echo $p->Nama_Tempat ?></td>
					<td><?php echo $p->nama_paket ?></td>	 -->
					<td> 
						<a class="btn btn-sm btn-warning" href="<?php echo base_url().'Pelanggan/tampil_ubah/'.$p->Id_Pendaftaran; ?>"><span class="glyphicon glyphicon-pencil"></span> </a>
						
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