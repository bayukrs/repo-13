<div class="content">

		<div class="content-wrapper">
			<div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0 text-dark">Info Users</h1>
		          </div><!-- /.col -->
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="admin">Home</a></li>
		              <li class="breadcrumb-item active">Info Users</li>
		            </ol>
		          </div><!-- /.col -->
		        </div><!-- /.row -->
		      </div><!-- /.container-fluid -->
		    </div>
		    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Account</h3>
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
                          Username
                      </th>
                      <th >
                          Email
                      </th>
                      <th >
                          Status
                      </th>
                      <th >
                      </th>
                  </tr>
              </thead>

              <tbody>
              	<?php 
              		$no = 1;
              		foreach($user as $u){
              	 ?>
              	 <tr>
              	 	<td><?php echo $no++ ?></td>
              	 	<td><?php echo $u['user_id'] ?></td>
                  <td><?php echo $u['username'];?></td>
                  <td><?php echo $u['email'];?></td>
                  <td><?php if ($u['active']==1) {
                    echo "Aktif";
                  } else {
                    echo "Belum Aktif";
                  }?></td>
              	 	
              	 	<td class="project-actions text-right">
                        <div class="btn btn-outline-primary btn-sm">
              	 		<i class="fas fa-minus">
			      		<a href="<?php echo base_url();?>admin/user/update/<?php echo $u['user_id'];?>">Non Aktif</a>
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