<?php
 /**
 * Title: VLC over HTTP
 *
 * Description
 *
 * @access public
 */

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $uid = rand(1, 9999999);

    if ($cmd=='play') {
      $out['PLAY']=preg_replace('/\\\\$/is', '', $out['PLAY']);
     // $path=str_replace('/', "\\", ($out['PLAY']));
      $path=$out['PLAY'];
     //echo $path;
	 
	  curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=pl_empty");
      curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=in_play&input=".urlencode($path));
      $res=curl_exec($ch);
    }
    if ($cmd=='stop') {
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/requests/status.xml?command=pl_stop");
       $res=curl_exec($ch);
    }

   //$res=''; // ->NULL

   //print_r();
?>