<?php

  function xbmc_request($ch, $terminal, $method, $params=0) {

    if (!$params) {
     $params=array();
    }

    $json = array(
     'jsonrpc' => '2.0',
     'method' => $method,
     'params' => $params,
     'id' => $uid
    );
    $url='http://'.$terminal['HOST'].":".$terminal['PLAYER_PORT'];
    $request = json_encode($json);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_URL, $url."/jsonrpc");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
      $responseRaw = curl_exec($ch);
      return json_decode($responseRaw);
  }

    $uid = rand(1, 9999999);

    $players=xbmc_request($ch, $terminal, 'Player.GetActivePlayers');
    $player_type=$players->result[0]->type;
    $player_id=$players->result[0]->playerid;

      if ($cmd=='play') {
       $out['PLAY']=preg_replace('/\\\\$/is', '', $out['PLAY']);
       $path=str_replace('/', "\\", utf2win($out['PLAY']));
       if (is_file($path)) {
        //play file
        $result=xbmc_request($ch, $terminal, 'Player.Open', array('item'=>array('file'=>$path)));
       } else {
        //play folder
        ///!!!!!! how to get it working???
        $result=xbmc_request($ch, $terminal, 'Player.Open', array('item'=>array('path'=>$path)));
       }
       print_r($result);
       
      }

      if ($cmd=='stop') {
       $result=xbmc_request($ch, $terminal, 'Player.Stop', array('playerid'=>(int)$player_id));
      }



?>