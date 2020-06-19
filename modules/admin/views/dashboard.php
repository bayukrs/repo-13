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
          <h3 class="card-title">List Product</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th  class="text-center">
                          Gambar
                      </th>
                      <th >
                          Product Name
                      </th>
                      <th>
                      	Kategori
                      </th>
                      <th>
                          Price
                      </th>
                      <th  >
                          Desc
                      </th>
                      <th  >
                          Benefit
                      </th>
                      <th  >
                          Deadline
                      </th>
                      <th >
                      </th>
                  </tr>
              </thead>

              <tbody>
              	<?php 
              		$no = 1;
              		foreach($produk as $u){
              	 ?>
              	 <tr>
              	 	<td><?php echo $no++ ?></td>
              	 	<td><img src="<?php echo base_url() . 'images/'.$u['gambar']; ?>"height="50px" width="50px"></td>
              	 	<td><?php echo $u['nama_produk'];?></td>
              	 	<td><?php echo $u['id_kategori'] ?></td>
              	 	<td><?php echo $u['harga'] ?></td>
              	 	<td><?php echo $u['deskripsi'] ?></td>
              	 	<td><?php echo $u['benefit'] ?></td>
              	 	<td><?php echo $u['waktu_pengerjaan'] ?></td>
              	 	<td class="project-actions text-right">
                        <div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-folder">
			      		<a href="<?php echo base_url();?>admin/hapus/<?php echo $u['id_produk'];?>">Hapus</a>
                        </i>
                        </div>
					</td>
              	 </tr>
              </tbody>
          <?php } ?>
              </table>
		</div>

		
	</div>
