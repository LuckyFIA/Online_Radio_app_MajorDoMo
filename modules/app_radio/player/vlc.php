<?php
	 if ($cmd=='play') {
       $out['PLAY']=preg_replace('/\\\\$/is', '', $out['PLAY']);
       $out['PLAY']=preg_replace('/\/$/is', '', $out['PLAY']);
       $path=urlencode(''.str_replace('/', "\\", ($out['PLAY'])));
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/rc/?command=vlc_play&param=".$path);
       $res=curl_exec($ch);
      }
      if ($cmd=='stop') {
       curl_setopt($ch, CURLOPT_URL, "http://".$terminal['HOST'].":".$terminal['PLAYER_PORT']."/rc/?command=vlc_close");
       $res=curl_exec($ch);
      }
?>