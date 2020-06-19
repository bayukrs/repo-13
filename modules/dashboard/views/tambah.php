<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url();?>dashboard/add_produk" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Produk</label>
                          <input type="text" class="form-control" name="nama_produk" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kategori</label>
                          <select class="custom-select" name="kategori">
                              <option>--Select Kategori--</option>
                              <?php 
                                foreach($kategori as $u){
                              ?>
                              <option  value="<?php echo $u->id_kategori ?>"><?php echo $u->nama_kategori ?></option>
                            <?php   }; ?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga</label>
                          <input type="text" class="form-control" name="harga">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Waktu Pengerjaan</label>
                          <input type="text" class="form-control" name="waktu_pengerjaan">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Benefit</label>
                          <textarea rows="3" class="form-control" name="benefit"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" name="deskripsi"></textarea>
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
                    <button type="submit" class="btn btn-primary pull-right">Add Product</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>