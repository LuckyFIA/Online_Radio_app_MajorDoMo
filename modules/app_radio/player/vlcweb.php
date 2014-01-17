<?php
 /**
 * Title: VLC over HTTP
 *
 * Description
 *
 * @access public
 */
	 $uid = rand(1, 9999999);

    if ($cmd=='play') {
      $path=preg_replace('/\\\\$/is', '', $out['PLAY']);
     
	  curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=pl_empty");
      $res=curl_exec($ch);
	  curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=in_play&input=".urlencode($path));
      $res=curl_exec($ch);
    }
	if ($cmd=='stop') {
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=pl_stop");
       $res=curl_exec($ch);
    }
	if ($cmd=='vol') {
		$volume=$volume*3;
		curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=volume&val=$volume");
		$res=curl_exec($ch);
	}

   $res=''; // ->NULL
?>