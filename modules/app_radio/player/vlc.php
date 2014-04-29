<?php
    if ($cmd=='play') {
       $path=$out['PLAY'];
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/rc/?command=vlc_close");curl_exec($ch);
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/rc/?command=vlc_play&param=--open=".$out['PLAY']);
       $res=curl_exec($ch);
      }
      if ($cmd=='stop') {
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/rc/?command=vlc_close");
       $res=curl_exec($ch);
      }
?>