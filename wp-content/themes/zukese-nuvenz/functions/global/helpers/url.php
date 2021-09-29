<?php

function is_current_url($url){
  global $wp;
  $current_url = home_url($wp->request)."/";

  if($current_url == $url){
    return true;
  }else{
    return false;
  }
}
?>
