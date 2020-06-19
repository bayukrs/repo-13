	<div class="col-lg-9">
		<h2>Konfirmasi Check Out</h2>
		<?php $grand_total = 0;
			if ($cart = $this->cart->contents()){
 				foreach ($cart as $item){
 					$grand_total = $grand_total + $item['subtotal'];
 				}
 				echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";
		?>
	<form class="form-horizontal" action="<?php echo base_url()?>shopping/proses_order" method="post" name="frmCO" id="frmCO">
 		<div class="form-group has-success has-feedback">
 			<label class="control-label col-xs-3" for="inputEmail">
 			Email:
 			</label>
 			<div class="col-xs-9">
 				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
 			</div>
 		</div>
 		<div class="form-group has-success has-feedback">
 			<label class="control-label col-xs-3" for="firstName">
 			Nama :
 			</label>
 			<div class="col-xs-9">
 				<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
 			</div>
 		</div>
 		<div class="form-group has-success has-feedback">
 			<label class="control-label col-xs-3" for="lastName">Alamat:</label>
 			<div class="col-xs-9">
 				<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
 			</div>
 		</div>
 		<div class="form-group has-success has-feedback">
 			<label class="control-label col-xs-3" for="phoneNumber">Telp:</label>
 			<div class="col-xs-9">
 				<input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
 			</div>
 		</div>
 		<div class="form-group has-success has-feedback">
 			<div class="col-xs-offset-3 col-xs-9">
 				<button type="submit" class="btn btnprimary" data-toggle="modal" data-target="#modal-overlay">
 					Proses Order
 				</button>
 			</div>
 		</div>
 	</form>
 		<?php } else {
 			echo "<h5>Shopping Cart masih kosong</h5>";
 			}
 		?>
</div>
</div>
      <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>