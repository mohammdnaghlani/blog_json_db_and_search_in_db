<?php

    function url_link(string $path) : string
    {
        return BASE_URI . $path ;
    }
    function createPath(string $path , string $extention) 
    {
        $new_path = str_replace('.' , DIRECTORY_SEPARATOR , $path) ;
        //db.post => db/post

        $create_path = BASE_PATH . $new_path . '.' . $extention ;
        // c:/xampp/htdocs/naghlani.mn/db.post.json

        return $create_path ;
    }
    function getDb(string $path , string $extention) 
    {
        
        $create_path = createPath($path, $extention) ;

        $get_date = file_get_contents($create_path) ;

        return $get_date ;
    }
    function insertDb(string $path  , string $extention , string $data)
    {
        $create_path = createPath($path, $extention) ;

        $insert = file_put_contents($create_path , $data) ;
        if($insert){
            return true ;
        }

        return false ;
    }

    function getJson(string $path , bool  $convert_to_array = false) 
    {
        $get_date = getDb($path , 'json') ;

        return json_decode($get_date , $convert_to_array) ;
    }

    function getPostSituation(int $status) : array
    {
        $situation =  array(
            1 => ['منتشر شده' , 'success'], 
            2 => ['در انتظار تایید' , 'warning'],
            3 => ['پیشنویس' , 'info'],
            4 => ['غیر قابل انتشار' , 'danger'],
        );
        return $situation[$status] ;
    }

    function insertJson(array $array) : bool
    {
        $get_all_data = getJson('db.post' , true) ;
        $get_all_data[] = $array ;
        $get_all_data = json_encode($get_all_data) ;
        $insert = insertDb('db.post' , 'json' , $get_all_data) ;
        if($insert){
            return true ;
        } 
        return false ;

    }

    function searchPostByKey(array $array , $search_key)
    {
        $temp = null ;
        foreach($array as $key => $post){
            if(strpos($post['body'] , $search_key)){
                $temp[$key] = $post ;
            }
            continue ;
        }

        return $temp ;
    }