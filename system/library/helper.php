<?php

// Author : ChenXiongwei

class Helper {


    // 后台进行 Post

    public function http_post($url,$param=array('default'=>0)){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_string($param)) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach($param as $key=>$val){
                $aPOST[] = $key."=".urlencode($val);
            }
            $strPOST =  join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($oCurl, CURLOPT_POST,true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
            return $sContent;
        }else{
            return false;
        }
    }


    // 设置 COOKIE

    public function setcookie($key, $value, $time = 0, $path = '', $domain = '', $httponly = FALSE) {
        $_COOKIE[$key] = $value;
        if($value != NULL) {
            if(version_compare(PHP_VERSION, '5.2.0') >= 0) {
                setcookie($key, $value, $time, $path, $domain, FALSE, $httponly);
            } else {
                setcookie($key, $value, $time, $path, $domain, FALSE);
            }
        } else {
            if(version_compare(PHP_VERSION, '5.2.0') >= 0) {
                setcookie($key, '', $time, $path, $domain, FALSE, $httponly);
            } else {
                setcookie($key, '', $time, $path, $domain, FALSE);
            }
        }
    }

    // 获取随机字符串

    public function generate_rand($l){

        if($l<1) {
            return false;
        }

        //$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        $c= "0123456789";

        srand((double)microtime()*1000000);

        $rand = '';

        for( $i=0 ; $i<$l ; $i++ ) {
            $rand .= $c[rand()%strlen($c)];
        }

        return $rand;
    }

    // 注册激活链接制造

    public function active_encode( $cid ) {
        for( $i=0 ; $i<8 ; $i++ ) {
            $cid = base64_encode($cid);
        }
        return $cid;
    }

    public function active_decode( $cid ) {
        for( $i=0 ; $i<8 ; $i++ ) {
            $cid = base64_decode($cid);
        }
        return $cid;
    }


    // 字符串 - 数组 回转
    function string_to_array( $string , $split , $one , $two ) {
        if( $string ) {
            $string = (string)($string);
            $string = explode($split,$string);
            $result = array();
            $count = count($string)/2;
            foreach( $string as $key => $val ) {
                if( $key < $count ) {
                    $result[] = array( $one => $string[(2*$key)] ,
                                       $two => $string[(2*$key+1)] );
                }
            }
            return $result;
        }
    }


    // 获取客户端IP

    public function getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR'];
        else $ip = "127.0.0.1";
        return ($ip);
    }

}