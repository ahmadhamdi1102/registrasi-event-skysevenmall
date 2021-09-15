 <div class="right_col" role="main">

              <!-- form disimpan disini  -->
<!-- <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">  -->

<center><h3>Transaksi Pembayaran</h3></center>
<hr/>
<form>
 <table class="table table-striped table-bordered" id="datatable" eid="mydata" >
        <thead>
            <tr>
                <td>ID Pendaftaran</td>
                <td>Nama Pelanggan</td>
                <td>Alamat</td>
                <td>No Hp</td>
                 <td>Total Bayar</td>
                <td>Status</td> 
                <td>Aksi</td>
               

            </tr>
        </thead>
        <tbody>
           <?php $i=1; foreach ($data3 as $value) { ?>
            <tr>
                <td><?php echo $value['Id_Pendaftaran'] ?></td>
                <td><?php echo $value['Nama_Pelanggan']?></td>
               <td><?php echo $value['Alamat']?></td>
                <td><?php echo $value['No_HP']?></td>
                <td><?php echo $value['harga']+$value['Harga_Tempat']?></td>
                 <td><?php echo "Belum Lunas";?></td>
                
<td>
   
<button class="btn btn-sm btn-info" data-toggle="modal" 
data-target="#modal_edit<?php echo $value['Id_Pendaftaran'];?>" id="btn" type="button" >Bayar</button>

</td>
<!--  <input type="hidden" name="id_pembayaran" value="<?php echo $value['id_pembayaran'] ?>"> -->
   
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
    </form>
       
            </div>
          </div>

  <!-- Modal Pembayaran -->
</div>


  <script type="text/javascript">
     function startCalculate(){
      interval=setInterval("Calculate()",10);
     }

     function Calculate() {
       var a=document.barang.total_bayar.value;
       var b=document.barang.bayar.value;

       //var c=document.barang.kembalian.value;

       document.barang.kembalian.value =(b-a);

       function stopCalc() {
          clearInterval(interval);
       }
     }
  </script>


  <?php $i=1; foreach ($data3 as $value) { ?>
 <div class="modal fade" id="modal_edit<?php echo $value['Id_Pendaftaran'];?>"  tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Pembayaran</h3>
            </div>
            <form class="form-horizontal" method="post" name="barang" id="barang" action="<?php echo base_url('cash/edit_cash2')?>">
                <div class="modal-body">



             <input type="text" name="pendaftaran" value="<?php echo $value['Id_Pendaftaran'] ?>">
             <input type="hidden" name="id_pembayaran" value="<?php echo $value['id_pembayaran'] ?>"> 

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Paket</label>
                        <div class="col-xs-8">
                            <input name="id_paket" class="form-control" type="text" placeholder="Kode Paket..." required>
                        </div>
                    </div>!-->
   <?php  $a= $value['harga']+$value['Harga_Tempat']?>
                         <div class="form-group">
                        <label class="control-label col-xs-3" >Total harga</label>
                        <div class="col-xs-8">
       <input name="total_bayar" id="total_bayar" class="form-control" type="text" readonly value="<?php echo $a ?>" required
       onfocus="startCalculate()" onblur="stopCalc()">
                        </div>
                    </div>

                

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bayar</label>
                        <div class="col-xs-8">
                            <input name="bayar" id="bayar" class="form-control" type="number" min="<?php echo $value['harga'] ?>" placeholder="Bayar" required  onfocus="startCalculate()" onblur="stopCalc()">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kembalian</label>
                        <div class="col-xs-8">
                            <input name="kembalian" value="0"  min="1" readonly id="kembalian" class="form-control" type="text" placeholder="Kembalian" required  onfocus="startCalculate()" onblur="stopCalc()">
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" type="submit">Simpan</button>
                </div>
            </form>
            </div>

            </div>
        </div>
<?php } ?>

</div>


<script type="text/javascript">
   function dis(btn){
     var z = document.getElementById('btn');
     z.disabled = true;
   }
</script>





   

<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


    <!-- jQuery -->
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>


