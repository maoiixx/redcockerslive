<?php 

require_once('../config.php');
$eventid = $_GET['eventid'];
//if ( ! is_null  ($_settings->userdata('id'))  ){

      $qry = $conn->query("SELECT red_amount,red_payout,blue_amount,blue_payout,yellow_amount FROM `bets`,`draws` WHERE draws.id=bets.drawid and bets.drawid = (select id FROM draws WHERE eventid = '{$eventid}' and active = 'Y' ) and bets.user_id = {$_settings->userdata('id')}");  
      if($qry->num_rows > 0){
        $row = $qry->fetch_assoc();
		$response = array('red' => number_format($row['red_amount'],2) .' = '. number_format($row['red_amount']* $row['red_payout'],2), 'blue' => number_format($row['blue_amount'],2) .' = '. number_format($row['blue_amount']* $row['blue_payout'],2), 'yellow' => number_format($row['yellow_amount'],2) .' = '. number_format($row['yellow_amount']* 8,2)  );
		echo json_encode($response);
      }
      else{
		$response = array('red' => 0, 'blue' => 0, 'yellow' => 0);
		echo json_encode($response);

      }

?>



