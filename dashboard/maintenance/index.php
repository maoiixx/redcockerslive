<?php if ($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2) : ?>
  <h6 style="color:white">
    <?php if ($_settings->userdata('role') == 1) : ?>
      <?php echo 'Home / Dashboard INCO' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 2) : ?>
      <?php echo 'Home / Dashboard Sub-Operator' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 3) : ?>
      <?php echo 'Home / Dashboard Master Agent' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 4) : ?>
      <?php echo 'Home / Dashboard Gold Agent' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 5) : ?>
      <?php echo 'Home / Dashboard Player' ?>
    <?php endif; ?>
  </h6>
  <hr class="bg-light">
  <div class="container">
    <style>
      .bg-success {
        background-color: #C0C0C0 !important;
        color: black !important;
      }
      .bg-refer {
        background-color: white !important;
        color: black !important;
      }


    </style>

    <div class="row">
      <div class="col-sm-12 mt-3">
        <div class="card bg-white text-dark">
          <div class="card-body">
            <div class="card-body rounded" style="background-color:white">

              <div class="col text-center">
                <button id="copy" onclick="myFunction()" class="btn btn-sm btn-success">Copy My Refferal Link</button>
              </div>
		</br>
	        <div class="text-dark text-center">Please take note of your referral link below. All Master Agents that will register under this link will automatically be under your account.</div>	
             	</br><div id="refer_link" class="text-danger text-center"><?php echo base_url . 'register.php?refcode=' . $_settings->userdata('refcode')?></div>
            </div>
            


          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:white  !important;  height:120px">
    		<table>
 
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              				<h5>Wallet Points</h5>
					</td>
				</tr>
				<tr>
					<td>
              					<br><h5><b><?php
                  				$qry = $conn->query("SELECT * from users where id ='{$_settings->userdata('id')}' "); //$_settings->userdata('id')
                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['amount'], 2);
						?></b></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:white !important; height:120px">
   
    		<table>
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              				<h5>Current Commission (<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</h5>
					</td>
				</tr>
				<tr>
					<td>
              				<br><h5><b><?php
                  			$qry = $conn->query("SELECT com_amount_bal from users where id ='{$_settings->userdata('id')}' "); //$_settings->userdata('id')
                  			$row = $qry->fetch_assoc();
                  			echo number_format($row['com_amount_bal'], 2);
                  			?></b></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
  
          </div>
        </div>
      </div>




<?php if($_settings->userdata('type') == 1): ?> 

      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:white !important; height:120px">
    		<table style="color:black">
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              				<h5>Downlines Commission</h5>
					</td>
				</tr>
				<tr>
					<td>
              					<h5><b><?php
						if ($_settings->userdata('type') == 1){ //use admin priv

                  					$qry = $conn->query("SELECT sum(com_amount_bal) com_amount_bal from users where Type in (2,3) and id > {$_settings->userdata('id')}");

						}else{


                  					$qry = $conn->query("SELECT sum(com_amount_bal) com_amount_bal from users where parentid ='{$_settings->userdata('id')}' and id <> {$_settings->userdata('id')}");
						}

                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['com_amount_bal'], 2);
                  				?></b></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
              <!-- <p>(<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</p> -->

          </div>
        </div>
      </div>


      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:white  !important; height:120px">
    		<table style="color:black">
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              				<h5>Downlines Wallet</h5>
					</td>
				</tr>
				<tr>
					<td>
              					<br><h5><b><?php
						if ($_settings->userdata('type') == 1){ //use admin priv

                  					$qry = $conn->query("SELECT SUM(amount) as total from users where Type in (2,3) and id <> {$_settings->userdata('id')} "); //$_settings->userdata('id')

						}else{

                  					$qry = $conn->query("SELECT SUM(amount) as total from users where parentid={$_settings->userdata('id')} and id <> {$_settings->userdata('id')} "); //$_settings->userdata('id')

						}

                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['total'], 2);
                  				?></b></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
              				<!-- <p>(<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</p> -->
					</td>
				</tr>
				</table>
			</td>
    		</table>
          </div>
        </div>
      </div>
      <!-- /.col -->

<?php endif; ?>

    </div>

  </div>
  <script>
    // Tooltip

    $('#copy').tooltip({
      trigger: 'click',
      placement: 'bottom'
    });

    function setTooltip(message) {
      $('#copy').tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
    }

    function hideTooltip() {
      setTimeout(function() {
        $('#copy').tooltip('hide');
      }, 1000);
    }




    function copyToClipboard(text) {
      var sampleTextarea = document.createElement("textarea");
      document.body.appendChild(sampleTextarea);
      sampleTextarea.value = text; //save main text in it
      sampleTextarea.select(); //select textarea contenrs
      document.execCommand("copy");
      document.body.removeChild(sampleTextarea);
    }

    function myFunction() {
      var copyText = document.getElementById("refer_link");
      copyToClipboard(copyText.innerText);
      setTooltip('Link copied!');
      hideTooltip();
    }
  </script>
<?php endif; ?>
