<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary"><?php echo $title ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              	<div class="row">
          	<div class="col-lg">
          		<?php if(validation_errors()) : ?>
          			<div class="alert alert-danger" role="alert">
          				<?php echo validation_errors(); ?>
          			</div>
          		<?php endif; ?>
          		<?php echo $this->session->flashdata('message'); ?>

          		<a href="<?php echo base_url('ketuart/surat_pengantar') ?>" class="btn btn-primary mb-3" ><i class="fas fa-angle-left"></i> Kembali</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td width="" align="center"><b>NO</b></td>
                      <td align="center" width=""><b>KTP</b></td>
                      <td align="center" width=""><b>Nama</b></td>
                      <td align="center" width=""><b>Action</b></td>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $i = 1; ?>
				  	<?php foreach($warga as $w) : ?>
                    <tr>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $w['no_ktp']; ?></td>
                      <td align="center"><?php echo $w['nama_lengkap']; ?></td>
                      <td align="center">
                      	<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#WargaModal<?php echo $w['id_data_warga'] ?>" ><i class="fas fa-check"></i> Pilih</a>
                      </td>
                      
                    </tr>
                    <?php $i++; ?>
					<?php endforeach; ?>
                  </tbody>
                </table>
                </div>
          </div>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->
    </div>


		<!-- Modal -->
		<?php $no=0; foreach($warga as $w): $no++; ?>
		<div class="modal fade" id="WargaModal<?php echo $w['id_data_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="WargaModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="WargaModalLabel"><i class="fas fa-check"></i> Data Warga</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="<?php echo base_url('ketuart/kirim_data_warga') ?>" method="post">
		      <div class="modal-body">

		        <div class="form-group">
		        	<?php $kodeSuratSekarang = $kodesurat['kode'] + 1 ?>
					<input type="text" hidden value="<?php echo $w['id_data_warga'];?>" name="id_data_warga" id="id_data_warga" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<label>Kode Surat</label>
					<input type="text" readonly value="<?php echo $kodeSuratSekarang;?>" name="no_surat" id="no_surat" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<label>Tanggal Cetak</label>
					<input type="date" value="<?php echo date("Y-m-d")?>" readonly name="tanggal_buat" id="tanggal_buat" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<div class="form-row">
		        		<div class="col">
				        	<label>No KK</label>
							<input type="text" value="<?php echo $w['no_kk'];?>" name="" readonly id="" class="form-control" >
		        		</div>
		        		<div class="col">
		        			<label>No KTP</label>		        			
						    <input type="text" class="form-control" id="" name="" readonly value="<?php echo $w['no_ktp'];?>">
		        		</div>
		        	</div>
		        </div>

				<div class="form-group">
					<div class="form-row">
						<div class="col">
							<label>Nama Lengkap</label>
						    <input type="text" class="form-control" id="" name="" readonly value="<?php echo $w['nama_lengkap'];?>">
						</div>
						<div class="col">
							<label>TTL</label>
							<input type="text" class="form-control" id="" name="" readonly value="<?php echo $w['tempat'].', '.$w['tanggal_lahir'];?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Keperluan</label>
					<textarea class="form-control" name="keperluan" id="keperluan"></textarea>
				</div>
				 
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Simpan</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<?php endforeach; ?>