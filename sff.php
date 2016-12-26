<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25 0025
 * Time: 下午 2:46
 */
class printn{
    private $n;
    private $arr;
    private $arr1;
    private $arr3=[];
    public function __construct($n,$arr,$arr1){
        $this->n=$n;
        $this->arr=$arr;
        $this->arr1=$arr1;
    }
    public function PN($n1){
        $arr2=array_merge($this->arr,$this->arr1);
//        echo max($arr2);
        for($nn=0;$nn<$n1;$nn++){
        for($k1=0;$k1<count($this->arr);$k1++){
            if($this->arr[$k1]==max($arr2)){
                array_push($this->arr3,max($arr2));
            }
        }
        for($k1=0;$k1<count($this->arr1);$k1++){
            if($this->arr1[$k1]==max($arr2)){
                array_push($this->arr3,max($arr2));
            }
        }
            for($k=0;$k<count($arr2);$k++){
                if($arr2[$k]==max($arr2)){
//                    $n=$arr2[count($arr2)-1];
//                    $arr2[count($arr2)-1]=$arr2[$k];
//                    $arr2[$k]=$n;
                    $arr2[$k]=null;
                }
            }
            //array_pop($arr2);
        }
        var_dump($this->arr3);
    }
    public function printN(){
        for($i=0;$i<$this->n;$i++){
            if($i%3==0&&$i%5==0){
                echo "<pre>";
                echo $i."fizz/fuzz";
                echo "</pre>";
            }else if($i%3==0){
                echo $i."fizz";
                echo "<br>";
            }else if($i%5==0){
                echo $i."buzz";
                echo "<br>";
            }
        }
    }
    public function mun($arr,$n,$mun){
        array_merge([0],$arr);
        $nm=0;
        $k=0;
        $N=0;
        $nn=0;
        $this->nnn($nm,$k,$arr,$mun,$N,$n,$nn);
    }
    function nnn($nm,$k,$arr,$mun,$N,$n,$nn){
        if($nm+$arr[$k+$nn+$N]<$mun){
            if($N<=$n){
                $nm=$arr[$k+$nn+$N]+$nm;
                $N+=1;
                $this->nnn($nm,$k,$arr,$mun,$N,$n,$nn);
            }else if($N>$n) {
                $nm=0;
                $nn+=1;
                $this->nnn($nm,$k,$arr,$mun,$N,$n,$nn);
            }else{
                    echo "无符合条件";
                }
        }else if($nm+$arr[$k+$nn+$N]==$mun){
            if($N=$n)
            echo 'success';
        }else{
            $k=$k+1;
            $N=1;
            $nn=0;
            $nm=$arr[$k];
            if($k>count($arr)){
                echo "无符合条件";
            }else{$this->nnn($nm,$k,$arr,$mun,$N,$n,$nn);}
        }
    }
}
$pr=new printn(100,[1],[2,3,3,4,3,5,6,7,8,9,8,7,6,5,4,3,2,5,3,4]);
$pr->PN(9);
$pr->mun([1,2,3,4,5,6,7,8,9],10,10);