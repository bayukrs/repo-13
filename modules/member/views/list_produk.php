          <?php
            foreach ($produk['tbl_produk'] as $row) {
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <form method="post" action="<?php echo base_url();?>member/tambah" method="post" accept-charset="utf8">
              <a href="#"><img class="card-img-top" src="<?php echo base_url() . 'images/'.$row->gambar; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $row->nama_produk;?></a>
                </h4>
                <h5>Rp. <?php $harga = $row->harga - ($row->harga * 0.05);
                          echo number_format($harga,0,",",".");?></h5>
                <p class="card-text"><?php echo $row->deskripsi;?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <a href="<?php echo base_url();?>member/detail_produk/<?php echo $row->id_produk;?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Buy
                </a>
                <input type="hidden" name="id" value="<?php echo $row->id_produk; ?>" />
                <input type="hidden" name="nama" value="<?php echo $row->nama_produk; ?>" />
                <input type="hidden" name="harga" value="<?php 
                                                            $harga = $row->harga - ($row->harga * 0.05);
                                                            echo $harga; ?>" />
                <input type="hidden" name="gambar" value="<?php echo $row->gambar; ?>" />
                <input type="hidden" name="qty" value="1" />
                <button type="submit" class="btn btn-sm btnsuccess"><i class="glyphicon glyphicon-member-cart"></i>add to cart</button>
              </div>
            </form>
            </div>
          </div>
            <?php 
          }
         ?>
        </div>
        <?php
                // Tampilkan link-link paginationnya
                echo $produk['pagination'];
              ?>
        
        <!-- /.row -->