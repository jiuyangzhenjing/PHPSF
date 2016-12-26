<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/29 0029
 * Time: 下午 4:28
 */
define("MAXSIZE",1000);
class datas{
    public $data;
    public $zhiz;
    public function __construct(){
        $this->data=null;
        $this->zhiz=null;
    }
}
class staticLinkList{
    public $staticLinkList;
    public static $Length;
    public function __construct($staticLinkList){
        $this->staticLinkList=$staticLinkList;
        self::$Length=MAXSIZE;

        for($i=0;$i<self::$Length-1;$i++){
            $this->staticLinkList[$i]=new datas();
            $this->staticLinkList[$i]->zhiz=$i+1;
        }
        $this->staticLinkList[MAXSIZE-1]=new datas();
        $this->staticLinkList[MAXSIZE-1]->zhiz=0;
    }
    function Malloc_Sll(){
        $i=$this->staticLinkList[0]->zhiz;
        if($this->staticLinkList[0]->zhiz){
            $this->staticLinkList[0]->zhiz=$this->staticLinkList[$i]->zhiz;
        }
        return $i;
    }
    function ListInsert($i,$e){
        $k=MAXSIZE-1;
        if($i<1||$i>MAXSIZE){
            return "ERROR";
        }
        else{
            $j=$this->Malloc_Sll();
            if($j){
                $this->staticLinkList[$j]->data=$e;
                for($l=1;$l<$i-1;$l++) {
                    $k = $this->staticLinkList[$k]->zhiz;
                }
                $this->staticLinkList[$j]->zhiz=$this->staticLinkList[$k]->zhiz;
                $this->staticLinkList[$k]->zhiz=$j;
            }
            return "OK";
        }
    }
}
$staticLinkList=Array();