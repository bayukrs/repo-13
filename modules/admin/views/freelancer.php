<div class="content">

		<div class="content-wrapper">
			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">List Freelancer</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="admin">Home</a></li>
		              <li class="breadcrumb-item active">List Freelancer</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Freelancer</h3>
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
                          Freelancer Name
                      </th>
                      <th >
                          Alamat
                      </th>
                      <th >
                          Point
                      </th>
                      <th >
                      </th>
                  </tr>
              </thead>

              <tbody>
              	<?php 
              		$no = 1;
              		foreach($freelancer as $u){
              	 ?>
              	 <tr>
              	 	<td><?php echo $no++ ?></td>
              	 	<td><?php echo $u['freelancer_id'] ?></td>
                  <td><?php echo $u['freelancer_name'];?></td>
                  <td><?php echo $u['freelancer_location'];?></td>
                  <td><?php echo $u['freelancer_point'];?></td>
              	 	
              	 	<td class="project-actions text-right">
                        <div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-minus">
			      		<a href="<?php echo base_url();?>admin/freelancer/hapus/<?php echo $u['freelancer_id'];?>">Hapus</a>
                        </i>
                        </div>
					</td>
              	 </tr>
              </tbody>
          <?php } ?>
              </table>
		</div>

		
	</div>
</div>