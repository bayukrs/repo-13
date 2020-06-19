<div class="content">
        <div class="container-fluid">
          <div class="row">
            <a href="<?php echo base_url();?>dashboard/tambah_produk/"><button class="btn btn-primary pull-right">Add Jobs</button></a>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
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
                  foreach($produk['tbl_produk'] as $u){
                 ?>
                 <tr>
                  <td><?php echo $no++ ?></td>
                  <td><img src="<?php echo base_url() . 'images/'.$u->gambar; ?>"height="50px" width="50px"></td>
                  <td><?php echo $u->nama_produk;?></td>
                  <td><?php echo $u->id_kategori ?></td>
                  <td><?php echo $u->harga ?></td>
                  <td><?php echo $u->deskripsi ?></td>
                  <td><?php echo $u->benefit ?></td>
                  <td><?php echo $u->waktu_pengerjaan ?></td>
                  <td class="project-actions text-right">
                    <div class="btn btn-outline-primary btn-sm">
                    <i class="material-icons">edit</i>
                <a href="<?php echo base_url();?>dashboard/edit/<?php echo $u->id_produk;?>">Edit</a>
                        </i>
                        </div>
                        <div class="btn btn-outline-primary btn-sm">
                    <i class="material-icons">delete</i>
                <a href="<?php echo base_url();?>dashboard/hapus/<?php echo $u->id_produk;?>">Hapus</a>
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
            </div>
          </div>
        </div>
      </div>