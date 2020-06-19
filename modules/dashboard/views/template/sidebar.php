<div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
	          Hi, <?php echo ucfirst($this->session->userdata('username')) ?>
	        </a></div>
	      <div class="sidebar-wrapper">
	        <ul class="nav">
	          <li class="nav-item active ">
	            <a class="nav-link" href="<?php echo base_url()?>dashboard/user">
	              <i class="material-icons">person</i>
	              <p>User Profile</p>
	            </a>
	          </li>
	          <li class="nav-item  ">
	            <a class="nav-link" href="<?php echo base_url()?>dashboard/show_job">
	              <i class="material-icons">content_paste</i>
	              <p>Jobs</p>
	            </a>
	          </li>
	        </ul>
	      </div>