		<div class="content-wrapper">
			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product</h3>

          <div class="card-tools">
            <div class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus">
                <a href="<?php echo base_url();?>admin/add_kategori">Tambah</a>
                        </i>
                        </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th  class="text-center">
                          id
                      </th>
                      <th >
                          Category Name
                      </th>
                      <th >
                      </th>
                  </tr>
              </thead>

              <tbody>
              	<?php 
              		$no = 1;
              		foreach($kategori as $u){
              	 ?>
              	 <tr>
              	 	<td><?php echo $no++ ?></td>
              	 	<td><?php echo $u['id_kategori'] ?></td>
                  <td><?php echo $u['nama_kategori'];?></td>
              	 	
              	 	<td class="project-actions text-right">
                    <div class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-folder">
                <a href="<?php echo base_url();?>admin/kategori/edit/<?php echo $u['id_kategori'];?>">Edit</a>
                        </i>
                        </div>
                        <div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-minus">
			      		<a href="<?php echo base_url();?>admin/kategori/hapus/<?php echo $u['id_kategori'];?>">Hapus</a>
                        </i>
                        </div>
					</td>
              	 </tr>
              </tbody>
          <?php } ?>
              </table>
		</div>

		
	</div>