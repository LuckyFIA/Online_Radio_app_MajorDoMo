<?php

	if ($cmd=='play') {
		$path=preg_replace('/\\\\$/is', '', $out['PLAY']);

		$result=xbmc_request($ch, $terminal, 'Player.Open', array('item'=>array('file'=>$path)));
	}
	if ($cmd=='stop') {
		$players=xbmc_request($ch, $terminal, 'Player.GetActivePlayers');
		$player_type=$players->result[0]->type;
		$player_id=$players->result[0]->playerid;
		$result=xbmc_request($ch, $terminal, 'Player.Stop', array('playerid'=>(int)$player_id));
	}
	if ($cmd=='vol') {
		$result=xbmc_request($ch, $terminal, 'Application.SetVolume', array('volume'=>(int)$volume));
	}
	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';

	function xbmc_request($ch, $terminal, $method, $params=0) {

		if (!$params) {
		 $params=array();
		}
		$uid = rand(1, 9999999);
		$json = array(
		 'jsonrpc' => '2.0',
		 'method' => $method,
		 'params' => $params,
		 'id' => (int)$uid
		);
		$url='http://'.$terminal['HOST'].":".$terminal['PLAYER_PORT'];
		$request = json_encode($json);

		  curl_setopt($ch, CURLOPT_URL, $url."/jsonrpc");
		  curl_setopt($ch, CURLOPT_POST, 1);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		  curl_setopt($ch, CURLOPT_TIMEOUT, 2);
		  $responseRaw = curl_exec($ch);
		  
		  return json_decode($responseRaw);
	}
?>