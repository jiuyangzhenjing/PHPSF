<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/30 0030
 * Time: 下午 8:14
 */
function Fbi($i){
    if($i<2){
        return $i==0? 0:1;
    }
    return Fbi($i-1)+Fbi($i-2);
}