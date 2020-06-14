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

          		<a href="<?php echo base_url('ketuart/tambah_surat_pengantar') ?>" class="btn btn-primary mb-3" ><i class="fas fa-plus"></i> Tambah</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td width="" align="center"><b>NO</b></td>
                      <td align="center" width=""><b>KTP</b></td>
                      <td align="center" width=""><b>Nama</b></td>
                      <td align="center" width=""><b>Keperluan</b></td>
                      <td align="center" width=""><b>Tanggal</b></td>
                      <td align="center" width=""><b>Action</b></td>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $i = 1; ?>
				  	<?php foreach($pengantar as $p) : ?>
                    <tr>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $p['no_ktp']; ?></td>
                      <td align="center"><?php echo $p['nama_lengkap']; ?></td>
                      <td align="center"><?php echo $p['keperluan']; ?></td>
                      <td align="center"><?php echo $p['tanggal_buat']; ?></td>
                      <td align="center">
                      	<a href="<?php echo base_url('ketuart/cetak_surat_pengantar/').$p['id_surat_pengantar'] ?>" class="btn btn-primary btn-sm" target="_BLANK" ><i class="fas fa-print"></i> Cetak</a>
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
