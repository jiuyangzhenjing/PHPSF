<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1 0001
 * Time: 上午 9:31
 */
function Get_Next($T,$next){
    $i=1;
    $n=0;
    $next[1]=0;
    while($i<strlen($T)){
        if($n==0||$T[$i]==$T[$n]){
            ++$i;
            ++$n;
            if($T[$i]!=$T[$n])
            $next[$i]=$n;
            else
                $next[$i]=$next[$n];
        }else{
            $n=$next[$n];
        }
    }
    return $next;
}
$S="S"."tmpttmptc";
$S[0]=null;
//echo $S;
$next=[];
//var_dump(Get_Next($S,$next));
function fn($S,$T,$i=1){
    $S="S".$S;
    $S[0]=null;
    $T="T".$T;
    $T[0]=null;

    $n=$i;//1
    $v=1;

    $next=[];
    $next=Get_Next($T,$next);

    while($n<strlen($S)&&$v<strlen($T)){
        if($v==0||$S[$n]==$T[$v]){
            ++$n;//23456789    10 11 12
            ++$v;//11111111    2  3  4
        }else{
            $v=$next[$v];
        }
    }
    if($v>=strlen($T)){
        return $n+1-strlen($T);
    }else{
        return 0;
    }
}
echo fn("小明小绿小牛","牛");
//T tmptmpc
//S vbvbvbtmptmpccevbvb