<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31 0031
 * Time: 上午 11:24
 */
function Index($S,$T,$pos){
    if($pos>0) {
        $n = strlen($S);
        $m = strlen($T);
        $i = $pos;
        while ($i < $n - $m + 1) {
            $sub = substr($S, $i, $m);
            if (0 != strcmp($sub, $T)) {
                $i++;
            } else {
                return $i;
            }
        }
    }
    return 0;
}