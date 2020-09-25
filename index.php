<?php

  require_once __DIR__ . DIRECTORY_SEPARATOR .'bootstrap'.DIRECTORY_SEPARATOR . 'init.php' ;
  $get_all_posts = getJson('db.post' , true) ;
  $view_posts = null ;
  if(isset($_GET['s']) && !empty($_GET['s'])){
    $view_posts = searchPostByKey($get_all_posts , $_GET['s']) ;
  }else{
    $view_posts = $get_all_posts ;
  }
  
  require_once __DIR__ . DIRECTORY_SEPARATOR .'tmp'.DIRECTORY_SEPARATOR . 'header.php' ;

  require_once __DIR__ . DIRECTORY_SEPARATOR .'tmp'.DIRECTORY_SEPARATOR . 'content.php' ;

  require_once __DIR__ . DIRECTORY_SEPARATOR .'tmp'.DIRECTORY_SEPARATOR . 'footer.php' ;
