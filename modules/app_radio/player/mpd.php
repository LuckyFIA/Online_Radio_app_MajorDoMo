<?php

include_once(DIR_MODULES.'app_radio/player/mpd.class.php');

if($terminal['PLAYER_PASSWORD']==''){
	$terminal['PLAYER_PASSWORD'] = NULL;
}

$mpd = new mpd($terminal['HOST'], $terminal['PLAYER_PORT'], $terminal['PLAYER_PASSWORD']);
  
if($mpd->connected) {
    if ($cmd=='play') {
		$mpd->PLClear();
        $mpd->PLAdd(preg_replace('/\\\\$/is', '', $out['PLAY']));
		$mpd->Play();  
	} 
	if ($cmd=='stop') {
		$mpd->Stop();
    }
	if ($cmd=='vol') {
		$mpd->SetVolume($volume);
	}
	$mpd->Disconnect();
} else {
	echo "Error: " .$mpd->errStr;
}
if($mpd->errStr !="") DebMes($mpd->errStr);
?>