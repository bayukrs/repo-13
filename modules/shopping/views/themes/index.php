<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KeyJob</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>assets/css/shop-homepage.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/toastr/toastr.min.css">
  <style type="text/css">
    .notifications{
      cursor: pointer;
      position: fixed;
      right: 0px;
      z-index: 9999;
      bottom: 0px;
      margin-bottom: 22px;  
      margin-right: 15px;
      min-width: 300px;
      max-width: 800px;
    }
  </style>

</head>

<body>

        <div class="notifications">
          <?php echo $this->session->flashdata('msg'); ?>
        </div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url() ?>">KeyJob</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">How to buy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>shopping/tampil_cart">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">KeyJob</h1>
          <div class="list-group">
            <a href="<?php echo base_url()?>shopping" class="list-group-item">All Category</a>
              <?php
                foreach ($kategori as $row) {
              ?>
            <a href="<?php echo base_url()?>shopping/produk_kategori/<?php echo $row['id_kategori'];?>" class="list-group-item"><?php echo $row['nama_kategori'];?></a>
              <?php } ?>
          </div>

          <div class="list-group">
            <a href="<?php echo base_url()?>shopping/tampil_cart" class="list-group-item"><strong><i class="glyphicon glyphiconshopping-cart"></i> Cart</strong></a>
            <?php 
              $cart= $this->cart->contents(); 
                // If cart is empty, this will show below message.
                if(empty($cart)) {
            ?>
            <a class="list-group-item">Empty</a>
              <?php
                }else {
                  $grand_total = 0;
                  foreach ($cart as $item){
                  $grand_total+=$item['subtotal'];
              ?>
            <a class="list-group-item">
              <?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],0,",","."); ?>)=Rp.<?php echo number_format($item['subtotal'],0,",","."); ?></a>
              <?php }?>
              <?php }?>
          </div>
      </div>
        <div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url()?>images/tamplate/gambar1.jpeg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url()?>images/tamplate/gambar2.jpeg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url()?>images/tamplate/gambar3.jpeg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="input-group no-border">
            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search...">
              <button type="button" id="btn-search" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
              </button>
              <button class="btn btn-white btn-round btn-just-icon">
                <a href="<?php echo base_url()?>shopping">Reset</a>
              </button>
          </div>
        </div>
        <div class="row" id="view">
          <?php $this->load->view('list_produk', array('produk'=> $produk['tbl_produk'],'pagination'=>$produk['pagination']));?>
        </div>
    
  </div>

  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; KeyJob</small>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script>var baseurl = "<?php echo base_url();?>";</script>
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/config.js"></script>
  <script src="<?php echo base_url()?>assets/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
  </script>
</body>

</html>
