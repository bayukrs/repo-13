<div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Hi, <?php echo ucfirst($this->session->userdata('username')) ?>
          </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active ">
              <a class="nav-link" href="<?php echo base_url()?>admin">
                <i class="material-icons">person</i>
                <p>Produk</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url()?>admin/Portofolio">
                <i class="material-icons">content_paste</i>
                <p>Portofolio</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url()?>admin/kategori">
                <i class="material-icons">content_paste</i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url()?>admin/user">
                <i class="material-icons">content_paste</i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url()?>admin/freelancer">
                <i class="material-icons">content_paste</i>
                <p>Freelancer</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url()?>admin/order">
                <i class="material-icons">content_paste</i>
                <p>Order</p>
              </a>
            </li>
          </ul>
        </div>