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

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PenggunaModal"><i class="fas fa-plus"></i> Tambah</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td width="" align="center"><b>NO</b></td>
                      <td align="center" width=""><b>Nama Pengguna</b></td>
                      <td align="center" width=""><b>Jabatan</b></td>
                      <td align="center" width=""><b>Action</b></td>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $i = 1; ?>
				  	<?php foreach($data_pengguna as $p) : ?>
                    <tr>
                      <td align="center"><?php echo $i; ?></td>
                      <td align="center"><?php echo $p['nama_pengguna']; ?></td>
                      <td align="center"><?php echo $p['jabatan']; ?></td>
                      <td align="center">
                      	<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#PenggunaModal<?php echo $p['id'] ?>" ><i class="fas fa-pencil-alt"></i></a>
				      	<a href="<?php echo base_url('ketuarw/delete_data_pengguna/') . $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus <?php echo $p['nama_pengguna'] ?> ?')"><i class="fas fa-trash-alt"></i></a>
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
		<div class="modal fade" id="PenggunaModal" tabindex="-1" role="dialog" aria-labelledby="PenggunaModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="PenggunaModalLabel"><i class="fas fa-plus"></i> Pengguna</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="<?php echo base_url('ketuarw') ?>" method="post">
		      <div class="modal-body">
		    
				 <div class="form-group">
				    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo set_value('nama_pengguna'); ?>">
				 </div>

				 <div class="form-group">
				    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
				 </div>

				 <div class="form-group">
				 	<select name="jabatan" id="jabatan" class="form-control">
				 		<option value="">Pilih Jabatan</option>
				 			<option value="RT">RT</option>
				 			<option value="RW">RW</option>
				 	</select>
				 </div>

				 

				 
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary">Simpan</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal -->
		<?php $no=0; foreach($data_pengguna as $p): $no++; ?>
		<div class="modal fade" id="PenggunaModal<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="PenggunaModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="PenggunaModalLabel"><i class="fas fa-pencil-alt"></i> Data Pengguna</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="<?php echo base_url('ketuarw/edit_data_pengguna') ?>" method="post">
		      <div class="modal-body">

		        <div class="form-group">
					<input type="text" hidden value="<?php echo $p['id'];?>" name="id" id="id" class="form-control" >
		        </div>

		        <div class="form-group">
					<input type="text" value="<?php echo $p['nama_pengguna'];?>" name="nama_pengguna" id="nama_pengguna" class="form-control" >
		        </div>

				<div class="form-group">
				    <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" value="">
				</div>

				<div class="form-group">
				 	<select name="jabatan" id="jabatan" class="form-control">
				 			<option value="RT"<?php echo ($p['jabatan'] == 'RT' ? ' selected' : ''); ?>> RT</option>
				 			<option value="RW"<?php echo ($p['jabatan'] == 'RW' ? ' selected' : ''); ?>> RW</option>
				 	</select>
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