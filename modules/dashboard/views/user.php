<div class="content">
  <?php foreach($freelancer as $row){ ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url();?>dashboard/upload_profile" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code Freelancer</label>
                          <input type="text" class="form-control" name="freelancer_id" placeholder="<?php echo $row['freelancer_id'] ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">User ID</label>
                          <input type="text" class="form-control" name="user_id" placeholder="<?php echo $row['user_id'] ?>"disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <input type="text" class="form-control" name="freelancer_name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" name="freelancer_location">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" name="long_desc"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Photos</label>
                        </div>
                      </div>
                    </div>
                    <input type="file" name="gambar">
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?php echo base_url() . 'images/profile_freelancer/'.$row['freelancer_photo']; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php echo ucfirst($this->session->userdata('level')) ?></h6>
                  <h4 class="card-title"><?php echo $row['freelancer_name'] ?></h4>
                  <p class="card-description">
                    <?php echo $row['long_desc'] ?>
                  </p>
                  <?php 
                   if ($active==1)
                    echo "Akun anda telah aktif";
                   else
                    echo "Akun belum aktif, silahkan cek email : <b>$email</b>";
                  ?>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>