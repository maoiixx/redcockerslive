
<?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 3 or $_settings->userdata('type') == 4): ?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<?php
$currentsession = $_settings->userdata('id');
$currentgame_id = '1';
?>

<?php
require_once('../config.php');
//display url
$url = $conn->query("SELECT name FROM `template` where game_id = '{$currentgame_id}'");
$link = '';
if ($url->num_rows > 0) {
  $row = $url->fetch_assoc();
  $link = $row['name'];
} else {
  $link = '';
}



$event = $conn->query("SELECT id,name FROM `events` where active='Y' and game_id = '{$currentgame_id}'");
$arena = '';
$eventid = '';
if ($event->num_rows > 0) {
  $row = $event->fetch_assoc();
  $arena = $row['name'];
  $eventid = $row['id'];
} else {
  $arena = '';
  $eventid = '';
}

?>


<style style="text/css">
  .marquee {
    height: 30px;
    overflow: hidden;
    position: relative;
    background: #fefefe;
    color: #333;
    border: 0px solid #4a4a4a;
  }

  .marquee h5 {
    position: absolute;
    width: 100%;
    height: 100%;
    margin: 0;
    line-height: 30px;
    text-align: center;
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
    -moz-animation: scroll-left 2s linear infinite;
    -webkit-animation: scroll-left 2s linear infinite;
    animation: scroll-left 8s linear infinite;
  }
  .btn-success {
    color: #000;
    background-color: #c0c0c0;
    border-color: #c0c0c0;
    box-shadow: none;
}
.btn-success:hover {
    color: #3e3e3e;
    background-color: #b5b4b4;
    border-color: #000000;
}

  @-moz-keyframes scroll-left {
    0% {
      -moz-transform: translateX(100%);
    }

    100% {
      -moz-transform: translateX(-100%);
    }
  }

  @-webkit-keyframes scroll-left {
    0% {
      -webkit-transform: translateX(100%);
    }

    100% {
      -webkit-transform: translateX(-100%);
    }
  }

  @keyframes scroll-left {
    0% {
      -moz-transform: translateX(100%);
      -webkit-transform: translateX(100%);
      transform: translateX(100%);
    }

    100% {
      -moz-transform: translateX(-100%);
      -webkit-transform: translateX(-100%);
      transform: translateX(-100%);
    }
  }


</style>


<style>
         
         .btn-grad-red {
            background-image: linear-gradient(to right, #910f13 0%, #f73d36  51%, #910f13  100%);
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 10px #eee;
            border-radius: 5px;
            display: block;
	    width: 90%;
	    height: 95%
          }

          .btn-grad-red:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
         .btn-grad-blue {
            background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%);
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 10px #eee;
            border-radius: 5px;
            display: block;
	    width: 90%;
	    height: 95%
          }

          .btn-grad-blue:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
         .btn-grad-green {
            background-image: linear-gradient(to right, #25b04b 0%, #25b04b  51%, #25b04b 100%);
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            border-radius: 5px;
            display: block;
	    width: 90%;
	    height: 95%
          }

          .btn-grad-green:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }

         .btn-grad-silver {
            background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB  51%, #403B4A  100%);
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 10px #eee;
            border-radius: 5px;
            display: block;
	    width: 90%;
	    height: 95%
          }

          .btn-grad-silver:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
         

         
</style>

<?php if ($_settings->userdata('type') == 1 or $_settings->userdata('type') == 4) : ?>
  <div class="card-header">
    <div class="card-tools">

      <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
        ACTION
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu" role="menu">

        <a class="dropdown-item new" href="javascript:void(0)"> <span class="fas fa-plus-circle text-primary"></span> NEW</a>
        <div class="dropdown-divider"></div>

        <a class="dropdown-item status" href="javascript:void(0)"> <span class="fa fa-check-circle text-primary"></span> STATUS</a>
        <div class="dropdown-divider"></div>

        <a class="dropdown-item finish" href="javascript:void(0)"> <span class="fa fa-exclamation-circle text-primary"></span> FINISH/CANCEL</a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item redeclare" href="javascript:void(0)"> <span class="fa fa-exclamation-circle text-primary"></span> REDECLARE</a>

      </div>

    </div>
  </div>
<?php endif; ?>
<style>
  .iframe-container {
    height: 500px;
  }

  #betting-dashboard .iframe-container {
    padding-top: 56.25%;
    height: 0;
    position: relative;
  }

  #betting-dashboard .iframe-container .stream-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0px #ffffff none;
  }
  .bg-success {
    background-color: #C0C0C0 !important;
    color: black !important;
  }
  .fight_trend .bg-success{
    background-color:#28a745 !important;
  }
  .bg-danger{
    background-color: #c21426 !important;
  }
  .bg-red_dash{
    background-image: linear-gradient(to right, #910f13 0%, #f73d36  51%, #910f13  100%);
  }
  .bg-blue_dash{
    background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%);
  }
  .bg-bet_dash{
    background-image: linear-gradient(to right, #9e9511 0%, #ffee05  51%, #9e9511  100%);
  }
  .bg-arena_dash{
    background-image: linear-gradient(#000405, #012a38, #000405);
  }
  .bg-announcement-dash{
    background-color: rgb(0,0,0);
  }
  .bg-status_dash{
    background-color: #1d2021 !important;
  }
  .bg-announcement-dash2{
    background-color: rgb(0,0,0);
  }
  .bg-dark_bet{
	background: rgb(2,49,62);
	background: linear-gradient(180deg, rgba(2,49,62,1) 0%, rgba(2,49,62,1) 92%, rgba(0,171,28,1) 96%, rgba(0,171,28,1) 100%); 
  }
</style>
<div class="site-wrapper">
  <div class="container-fluid">
    <div class="row mb-4 mt-2" id="betting-dashboard">

      <div class="col-sm-7">
        <div class="card mb-3">
          <div class="card-header bg-arena_dash bg-success">
            <center><h6 "text style="color: yellow" ><?php echo $arena ?></h6></center>
          </div>
          <div class="card-body p-0 w-100" style="width: 100%">
            <div style="width: 100%" class="w-100">
              <div class="iframe-container" id="samp">
                <iframe id="streamIframe" class="stream-iframe" name="stream1" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="100%" width="100%" src=<?php echo $link; ?>>
                </iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid p-0 fight_trend _desk" id="" style="position:relative;"></div>
      </div>

      <div id="app" class="col-sm-5">

        <div class="betting-console">
          <div class="row ">
            <div id="announcement-holder" class="col">
              <div class="bg-announcement-dash2 text-center">
                <h7 "text style="color: red;"><b>PAYOUT WITH 120 AND BELOW SHALL BE CANCELLED</b></h6>
              </div>
              <div class="marquee bg-announcement-dash">
                <h5 "text style="color: yellow;" id="game_call"></h5>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <table class="table bg-status_dash text-center table-striped mb-0">
                <thead>
                  <tr>
                    <th class="text-center statusLabel" style="width: 50%; color: white;">BETTING</th>
                    <th class="text-center statusLabel" style="color: white;">FIGHT #</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pb-0 bettingStatus">
                      <h5 id="lbl_game_status"> </h5>
                    </td>
                    <td class="pt-2 pb-0">
                      <h6 id="lbl_fight_number" class="hero-unit__subtitle text-default fightNoDisplay" style="color: white;"> </h6>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card mb-2">
            <div class="card-body p-2 pb-0 bg-dark">
              <div class="row">
                <div class="col p-0 text-center">
                  <h5 id="meron_winner_label" class="p-2 mb-0 bg-red_dash">MERON</h5>
                </div>
                <div class="col p-0 text-center">
                  <h5 id="wala_winner_label" class="p-2 mb-0 bg-blue_dash">WALA </h5>
                </div>
              </div>
              <div class="row">
                <div class="col p-0 text-center pt-1 ">
                  <h5 id="total_meron_bets" style="color:yellow;">0.00</h5>
                  <h6 id="payout_meron">
                    <div>0<label style="font-size:17px;"></label>
                    </div>
                  </h6>
                </div>

                <div class="col p-0 text-center pt-1">
                  <h5 id="total_wala_bets" style="color:yellow;">0.00</h5>
                  <h6 id="payout_wala">
                    <div>0<label style="font-size:17px;"></label>
                    </div>
                  </h6>
                </div>
              </div>

              <div class="row -sm-5 div-rows">
                <div class="col p-1 text-center pt-0 dark-right-border">
                  <h6><strong id="ur_meron_bets" class="text-success">0</strong>
                    <h6>
                </div>
                <div class="col p-1 text-center pt-0 dark-right-border">
                  <h6><strong id="ur_wala_bets" class="text-success">0</strong>
                    <h6>
                </div>
              </div>

              <div id="btn_game_fight">
                <div class="row">
                  <div class="col p-1 text-center pt-0 dark-bg">
                    <button type="button" id="post-meron" class="btn btn-grad-red btn-success btn-sm btn-block post-bet" href="javascript:void(0)" betid=1><i class="fas fa-plus-circle"></i> BET MERON</button>
                  </div>
                  <div class="col p-1 text-center pt-0 dark-bg">
                    <button type="button" id="post-wala" class="btn btn-grad-blue btn-success btn-sm btn-block post-bet" href="javascript:void(0)" betid=2><i class="fas fa-plus-circle"></i> BET WALA</button>
                  </div>
                </div>
              </div>
	      <div></br></div>
              <div class="row">
                <div class="col text-right currentPointsDisplay">CURRENT POINTS: <i class="text-warning far fa-money-bill-alt"></i> <strong id="ur_points" class="text-warning"></strong>
                </div>
                <div class="col-sm-12">

                  <div class="form-group mb-2">
                    <div class="input-group mb-3"><input type="number" name="bet_amount" id="bet_amount" inputmode="numeric" pattern="[0-9]*" placeholder="ENTER AMOUNT" class="form-control betAmount numbers" style="border: 1px solid silver;">
                      <div class="input-group-append"><button id="clear_bet" type="button" onclick="clearValueManual(this.value)" class="btn btn-outline-secondary p-2" style="border: 1px solid silver;">Clear</button>
                      </div>
                    </div> <input type="hidden" class="form-control">
                  </div>
                  <button type="button" value="50" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">50</strong></button>
                  <button type="button" value="100" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">100</strong></button>
                  <button type="button" value="500" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">500</strong></button>
                  <button type="button" value="1000" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">1K</strong></button>
                  <button type="button" value="2000" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">2K</strong></button>
                  <button type="button" value="5000" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">5K</strong></button>
                  <button type="button" value="10000" onclick="copyValueManual(this.value)" class="btn bg-dark_bet btn-success btn-outline btn-xs quickbet mr-1" style="width:50px; height:40px; border-radius: 10px;"><strong style="color:white; font-size: 20px;">10K</strong></button>
                </div>
              </div>
              <div id="btn_game_fight_draw" style= "display: none;">
                <div class="row">
                  <div class="col p-1 text-center pt-0 dark-bg">
                    <button type="button" id="post-draw" class="btn btn-grad-green btn-success btn-sm btn-block post-bet" href="javascript:void(0)" betid=3><i class="fas fa-plus-circle"></i> BET DRAW</button>
                  </div>
                  <div class="col p-0 text-center pt-3 dark-right-border dark-bg mt-3">
                    <h6><strong id="ur_draw_bets" class="my-bets text-success">0<span></span></strong></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col p-1 pt-0 pl-2 pb-0 dark-right-border"><strong>DRAW WINS x 8. Max. bet per player: 20000/fight</strong>
                  </div>


                </div>
              </div>

              <div class="container-fluid p-0 fight_trend _mobile" id="" style="position:relative;"></div>


            </div>
          </div>
        </div>
        
      </div>
    </div>


  </div>
</div>


<script>
  $(document).ready(function() {

    $('.post-bet').click(function() {
      uni_modal("<i class='fa fa-coins'></i> Confirmation", 'transactions/manage_transaction.php?betid=' + $(this).attr('betid') + '&bet=' + $('#bet_amount').val() + '&eventid=<?php echo $eventid ?>')
    })
    $('.finish').click(function() {
      uni_modal("<i class='fa fa-coins'></i> Select Winner/Cancel Fight", 'transactions/manage_winner.php?game_id=<?php echo $currentgame_id ?>')
    })
    $('.redeclare').click(function() {
      uni_modal("<i class='fa fa-coins'></i> Redeclare", 'transactions/manage_redeclare.php?eventid=<?php echo $eventid ?>')
    })
    $('.new').click(function() {
      uni_modal("<i class='fa fa-plus'></i> Add New Fight", 'transactions/new_transaction.php?game_id=<?php echo $currentgame_id ?>')
    })
    $('.status').click(function() {
      uni_modal("<i class='fa fa-coins'></i> Update Fight Status", 'transactions/manage_status.php?eventid=<?php echo $eventid ?>')
    })

  })
</script>

<script>
    function copyValueManual(value) {
	   $("#bet_amount").val(value);
    }

    function clearValueManual(value) {
	   $("#bet_amount").val("");
    }

    try{
      trends();
      balance();
      get_fight_status()
    }catch(e){
      console.log(e);
    }

//initial load of trends
function trends(){

  $.ajax({
    url: _base_url_+"classes/fight_trend.php?game_id=<?php echo $currentgame_id ?>",
    success: 
    function(result){
      $('.fight_trend').html(result);
    },
    error: function(result){
      console.log(result);
    }
  });
}

function balance(){
  $.ajax({
    url: _base_url_+"classes/balance.php",
    success: 
    function(result){
      $('#ur_points').html(result);
    },
    error: function(result){
      console.log(result);
    }
  });
}

function get_fight_status(){

            $.ajax({
              url: _base_url_+"classes/get_fight_status.php?eventid=<?php echo $eventid ?>",
        	dataType: 'json',
        	data: {
            		red: '',
			red_payout:'',
			blue: '',
			blue_payout: ''
        	},
              success: function(result){

                if (result.red !== redchecker){
                    $('#total_meron_bets').html(result.red);
                }

                if (result.red_payout !== redpayoutchecker){
                    $('#payout_meron').html(result.red_payout);
                }

                if (result.blue !== bluechecker){
                    $('#total_wala_bets').html(result.blue);
                }

                if (result.blue_payout !== bluepayoutchecker){
                    $('#payout_wala').html(result.blue_payout);
                }
              },
              error: function(data){
                console.log('error: fight status');
              }
            });

}


controller_fight_status();

var trendchecker=statuschecker=callchecker=balancechecker=numberchecker=winnermeronchecker=winnerwalachecker=myredchecker=mybluechecker=myyellowchecker=bluepayoutchecker=redpayoutchecker=redchecker=bluechecker=myredcheckerfin=mybluecheckerfin=myyellowcheckerfin='';
function controller_fight_status(){

  $.ajax({
    url: _base_url_+"classes/controller_fight_status.php?eventid=<?php echo $eventid ?>",
    success: 
    function(result){
        if (result == 1){

            $.ajax({
              url: _base_url_+"classes/get_fight_status.php?eventid=<?php echo $eventid ?>",
        	dataType: 'json',
        	data: {
            		red: '',
			red_payout:'',
			blue: '',
			blue_payout: ''
        	},
              success: function(result){
                if (result.red !== redchecker){
                    $('#total_meron_bets').html(result.red);
                }
                redchecker = result.red;

                if (result.red_payout !== redpayoutchecker){
                    $('#payout_meron').html(result.red_payout);
                }
                redpayoutchecker = result.red_payout; 

    
                if (result.blue !== bluechecker){
                    $('#total_wala_bets').html(result.blue);
                }
                bluechecker = result.blue; 


                if (result.blue_payout !== bluepayoutchecker){
                    $('#payout_wala').html(result.blue_payout);
                }
                bluepayoutchecker = result.blue_payout; 


              },
              error: function(result){
                console.log('error: fight status');
              }
            });

            $.ajax({
              url: _base_url_+"classes/my_bet_status.php?eventid=<?php echo $eventid ?>",
        	dataType: 'json',
        	data: {
            		red: '',
			blue: '',
			yellow: ''
        	},
              success: function(result){
        
                    if (result.yellow !== myyellowchecker){
                        $('#ur_draw_bets').html(result.yellow);
                    }
                    myyellowchecker = result.yellow;  

                    if (result.blue !== mybluechecker){
                        $('#ur_wala_bets').html(result.blue);
                    }
                    mybluechecker = result.blue;  

                    if (result.red !== myredchecker){
                        $('#ur_meron_bets').html(result.red);
                    }
                    myredchecker = result.red;  


              },
              error: function(result){
                console.log('error: fight status');
              }
            });

        }


        if (result == 2){

            $.ajax({
              url: _base_url_+"classes/get_fight_status.php?eventid=<?php echo $eventid ?>",
        	dataType: 'json',
        	data: {
            		red: '',
			red_payout:'',
			blue: '',
			blue_payout: ''
        	},
              success: function(result){
                if (result.red !== redchecker){
                    $('#total_meron_bets').html(result.red);
                }
                redchecker = result.red;

                if (result.red_payout !== redpayoutchecker){
                    $('#payout_meron').html(result.red_payout);
                }
                redpayoutchecker = result.red_payout; 

    
                if (result.blue !== bluechecker){
                    $('#total_wala_bets').html(result.blue);
                }
                bluechecker = result.blue; 


                if (result.blue_payout !== bluepayoutchecker){
                    $('#payout_wala').html(result.blue_payout);
                }
                bluepayoutchecker = result.blue_payout; 


              },
              error: function(result){
                console.log('error: fight status');
              }
            });

            $.ajax({
              url: _base_url_+"classes/my_bet_fin.php?eventid=<?php echo $eventid ?>",
        	dataType: 'json',
        	data: {
            		red: '',
			blue: '',
			yellow: ''
        	},
              success: function(result){
        
                    if (result.yellow !== myyellowchecker){
                        $('#ur_draw_bets').html(result.yellow);
                    }
                    myyellowchecker = result.yellow;  

                    if (result.blue !== mybluechecker){
                        $('#ur_wala_bets').html(result.blue);
                    }
                    mybluechecker = result.blue;  

                    if (result.red !== myredchecker){
                        $('#ur_meron_bets').html(result.red);
                    }
		    myredchecker = result.red;

              },
              error: function(result){
                console.log('error: fight finish');
              }
            });
	
        }

	

        if (result == 3 || result ==1){
            $.ajax({
                url: _base_url_+"classes/winner_wala.php?eventid=<?php echo $eventid ?>",
                success: 
                function(result){
                    if (result !== winnerwalachecker){
                        $('#wala_winner_label').html(result);
                    }
                    winnerwalachecker = result;       
                },
                error: function(result){
                  console.log(result);
                }
              });

            $.ajax({
                url: _base_url_+"classes/winner_meron.php?eventid=<?php echo $eventid ?>",
                success: 
                function(result){
                    if (result !== winnermeronchecker){
                        $('#meron_winner_label').html(result);
                    }
                    winnermeronchecker = result;
                },
                error: function(result){
                  console.log(result);
                }
              });
        }
        if (result == 3){
              $.ajax({
                url: _base_url_+"classes/fight_trend.php?game_id=<?php echo $currentgame_id ?>",
                success: 
                function(result){
                    if (result !== trendchecker){
                        $('.fight_trend').html(result);
                    }
                    trendchecker = result;
                },
                error: function(result){
                  console.log(result);
                }
              });
        }
        if (result == 1 ||result ==2){
            $.ajax({
              url: _base_url_+"classes/fight_number.php?eventid=<?php echo $eventid ?>",
              success: 
              function(result){
                if (result !== numberchecker){
                    $('#lbl_fight_number').html(result);
                }
                numberchecker = result;
              },
              error: function(result){
                console.log(result);
              }
            }); 
        }
        if (result == 1 || result ==3){
            $.ajax({
              url: _base_url_+"classes/balance.php",
              success: 
              function(result){
                var a = parseInt( $('#ur_meron_bets').text() );
                var b = parseInt( $('#ur_wala_bets').text() );
                var c = parseInt( $('#ur_draw_bets').text() );
                var d = parseInt(result.replace(/,/g, '')); //remove commas
                //check if there is balance to view video
                if ((a+b+c+d) < 10 ){
                    $('#samp').hide();
                    $('#post-draw').prop("disabled", true);
                    $('#post-meron').prop("disabled", true);
                    $('#post-wala').prop("disabled", true);

                }else{
                    $('#samp').show();
                    $('#post-draw').removeAttr('disabled');
                    $('#post-meron').removeAttr('disabled');
                    $('#post-wala').removeAttr('disabled');
                }

                if (result !== balancechecker){
                    $('#ur_points').html(result);
                }
                balancechecker = result;
              },
              error: function(result){
                console.log(result);
              }
            });
        }
            $.ajax({
              url: _base_url_+"classes/fight_status.php?eventid=<?php echo $eventid ?>",
              success: 
              function(result){
                if (result !== statuschecker){
                    $('#lbl_game_status').html(result);
                }
                statuschecker = result;
              },
              error: function(result){
                console.log(result);
              }
            });

            $.ajax({
              url: _base_url_+"classes/game_call.php?eventid=<?php echo $eventid ?>",
              success: 
              function(result){
                if (result !== callchecker){
                    $('#game_call').html(result);
                }
                callchecker = result;
              },
              error: function(result){
                console.log(result);
              }
            });


            $.ajax({
              url: _base_url_+"classes/session_checker.php",
              success: 
              function(result){
                if (result == 0){
                    location.replace(_base_url_);
                }
              },
              error: function(result){
                console.log(result);
              }
            });
              					
      setTimeout(function(){
        controller_fight_status();
      },4000);

    },

    error: function(result){
      setTimeout(function(){
        controller_fight_status();
      },4000);
    }
  });
}


</script>

    <script> 
    /** 
     * Disable right-click of mouse, F12 key, and save key combinations on page 
     */ 
     document.addEventListener("contextmenu", function(e){ 
     e.preventDefault(); 
     }, false); 
     document.addEventListener("keydown", function(e) { 
     //document.onkeydown = function(e) { 
     // "I" key 
     if (e.ctrlKey && e.shiftKey && e.keyCode == 73) { 
     disabledEvent(e); 
     } 
     // "J" key 
     if (e.ctrlKey && e.shiftKey && e.keyCode == 74) { 
     disabledEvent(e); 
     } 
     // "S" key + macOS 
     if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) { 
     disabledEvent(e); 
     } 
     // "U" key 
     if (e.ctrlKey && e.keyCode == 85) { 
     disabledEvent(e); 
     } 
     // "F12" key 
     if (event.keyCode == 123) { 
     disabledEvent(e); 
     } 
     // "C" key 
     if (e.ctrlKey && event.keyCode == 67) { 
     disabledEvent(e); 
     } 
     }, false); 
     function disabledEvent(e){ 
     if (e.stopPropagation){ 
     e.stopPropagation(); 
     } else if (window.event){ 
     window.event.cancelBubble = true; 
     } 
     e.preventDefault(); 
     return false; 
     }</script> 
<?php endif;?>
