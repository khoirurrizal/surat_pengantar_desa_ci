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

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#WargaModal"><i class="fas fa-plus"></i> Tambah</a>
                <table class="table table-bordered" id="dataTable" width="150%" cellspacing="0">
                  <thead>
                    <tr>
                      <td width="" align="center"><b>NO</b></td>
                      <td align="center" width=""><b>KK</b></td>
                      <td align="center" width=""><b>KTP</b></td>
                      <td align="center" width=""><b>Nama</b></td>
                      <td align="center" width=""><b>Jenkel</b></td>
                      <td align="center" width=""><b>TTL</b></td>
                      <td align="center" width=""><b>Agama</b></td>
                      <td align="center" width=""><b>Pekerjaan</b></td>
                      <td align="center" width=""><b>Alamat</b></td>
                      <td align="center" width=""><b>Action</b></td>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $i = 1; ?>
				  	<?php foreach($warga as $w) : ?>
                    <tr>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $w['no_kk']; ?></td>
                      <td align="center"><?php echo $w['no_ktp']; ?></td>
                      <td align="center"><?php echo $w['nama_lengkap']; ?></td>
                      <td align="center"><?php echo $w['jk']; ?></td>
                      <td align="center"><?php echo $w['tempat'].','.$w['tanggal_lahir']; ?></td>
                      <td align="center"><?php echo $w['agama']; ?></td>
                      <td align="center"><?php echo $w['pekerjaan']; ?></td>
                      <td align="center"><?php echo $w['alamat']; ?></td>
                      <td align="center">
                      	<a href="" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#WargaModal<?php echo $w['id_data_warga'] ?>" ><i class="fas fa-pencil-alt"></i></a>
				      	<a href="<?php echo base_url('ketuart/delete_data_warga/') . $w['id_data_warga'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('yakin ingin menghapus <?php echo $w['nama_lengkap'] ?> ?')"><i class="fas fa-trash-alt"></i></a>
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
		<div class="modal fade" id="WargaModal" tabindex="-1" role="dialog" aria-labelledby="WargaModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="WargaModalLabel"><i class="fas fa-plus"></i> Data Warga</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="<?php echo base_url('ketuart') ?>" method="post">
		      <div class="modal-body">
		    
				 <div class="form-group">
				    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No KK" value="<?php echo set_value('no_kk'); ?>">
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" value="<?php echo set_value('no_ktp'); ?>">
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo set_value('nama_lengkap'); ?>">
				 </div>

				 <div class="form-group">
				 	<select name="jk" id="jk" class="form-control">
				 		<option value="">Pilih Jenis Kelamin</option>
				 			<option value="L">Laki - laki</option>
				 			<option value="P">Perempuan</option>
				 	</select>
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat" value="<?php echo set_value('tempat'); ?>">
				 </div>

				 <div class="form-group">
				    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
				 </div>

				 <div class="form-group">
				 	<select name="agama" id="agama" class="form-control">
				 		<option value="">Pilih Agama</option>
				 			<option value="Islam">Islam</option>
				 			<option value="Protestan">Protestan</option>
				 			<option value="Katolik">Katolik</option>
				 			<option value="Hindu">Hindu</option>
				 			<option value="Budha">Budha</option>
				 			<option value="Konghucu">Konghucu</option>
				 	</select>
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo set_value('pekerjaan'); ?>">
				 </div>
				 
				 <div class="form-group">
				    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?php echo set_value('alamat'); ?>">
				 </div>

				 
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary">Simpen</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal -->
		<?php $no=0; foreach($warga as $w): $no++; ?>
		<div class="modal fade" id="WargaModal<?php echo $w['id_data_warga'] ?>" tabindex="-1" role="dialog" aria-labelledby="WargaModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="WargaModalLabel"><i class="fas fa-pencil-alt"></i> Data Warga</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="<?php echo base_url('ketuart/edit_data_warga') ?>" method="post">
		      <div class="modal-body">

		        <div class="form-group">
					<input type="text" hidden value="<?php echo $w['id_data_warga'];?>" name="id_data_warga" id="id_data_warga" class="form-control" >
		        </div>

		        <div class="form-group">
					<input type="text" value="<?php echo $w['no_kk'];?>" name="no_kk" id="no_kk" class="form-control" >
		        </div>

				<div class="form-group">
				    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" value="<?php echo $w['no_ktp'];?>">
				</div>

				<div class="form-group">
				    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $w['nama_lengkap'];?>">
				</div>

				<div class="form-group">
				 	<select name="jk" id="jk" class="form-control">
				 			<option value="L"<?php echo ($w['jk'] == 'L' ? ' selected' : ''); ?>> Laki-laki</option>
				 			<option value="P"<?php echo ($w['jk'] == 'P' ? ' selected' : ''); ?>> Perempuan</option>
				 	</select>
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat" value="<?php echo $w['tempat'];?>">
				</div>

				<div class="form-group">
				    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $w['tanggal_lahir'];?>">
				</div>

				<div class="form-group">
				 	<select name="agama" id="agama" class="form-control">
				 			<option value="Islam"<?php echo ($w['agama'] == 'Islam' ? ' selected' : ''); ?>>Islam</option>
				 			<option value="Protestan" <?php echo ($w['agama'] == 'Protestan' ? ' selected' : ''); ?>>Protestan</option>
				 			<option value="Katolik" <?php echo ($w['agama'] == 'Katolik' ? ' selected' : ''); ?>>Katolik</option>
				 			<option value="Hindu" <?php echo ($w['agama'] == 'Hindu' ? ' selected' : ''); ?>>Hindu</option>
				 			<option value="Budha" <?php echo ($w['agama'] == 'Budha' ? ' selected' : ''); ?>>Budha</option>
				 			<option value="Konghucu" <?php echo ($w['agama'] == 'Konghucu' ? ' selected' : ''); ?>>Konghucu</option>
				 	</select>
				 </div>

				<div class="form-group">
				    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $w['pekerjaan'];?>">
				</div>

				<div class="form-group">
				    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $w['alamat'];?>">
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