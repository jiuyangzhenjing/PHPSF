<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28 0028
 * Time: 下午 6:09
 */
class datas{
    public $ele;
    public $next;
    public function __construct(){
        $this->data=null;
        $this->next=null;
    }
}
//$data1=new datas("1",0);
//$data2=new datas("2",1);
//$data3=new datas("3",2);
//$data4=new datas("4",null);
class datalist{
    public $ele;
    public $next;
    public static $Length;

    public function __construct(){
        $this->ele=null;
        $this->next=null;
    }
    public function clearL(){
        if(self::$Length>0){
            while($this->next!=null){
                $n1=$this->next;
                $n=$n1->next;
                $this->next=null;
                unset($this->next);
                $this->next=$n;
            }
        }
        self::$Length=0;
    }
    public function GetLength(){
        return self::$Length;
    }
    public function IsListEmpty(){
        if(self::$Length=0||$this->next=null){
            return true;
        }else{
            return false;
        }
    }
    public function InsertInHeader($arr){
        $this->clearL();
        if(is_array($arr)){
            foreach($arr as $value){
                $newdata=new datas();
                $newdata->ele=$value;
                $newdata->next=$this->next;
                $this->next=$newdata;
                self::$Length+=1;
            }
        }else{
            return false;
        }
    }
    public function InsertInFooter($arr){
        $this->clearL();
        if(is_array($arr)){
            foreach($arr as $value){
                $newdata=new datas();
                $newdata->ele=$value;
                $newdata->next=$this->next;
                $this->next=$newdata;
                self::$Length+=1;
            }
        }else{
            return false;
        }
    }
    public function GetEleInI($i){
        $i=(int)$i;
        if($i>self::$Length||$i<1){
            return null;
        }
        $j=1;
        $n=$this->next;
        while($j<$i){
            $nNext=$n->next;
            $n=$nNext;
            $j+=1;
        }
        return $n;
}
    public function IsEleExits($value){
        $n=$this;
        while($n->next!=null&&strcmp($n->ele,$value)!==0){
            $n=$n->next;
        }
        if(strcmp($n->ele,$value)===0){
            return $n;
        }else{
            return null;
        }
    }
    public function EleExitsReturnIndex($value){
        $n=$this;
        $j=0;
        while($n->next!=null&&strcmp($n->ele,$value)!==0){
            $j++;
            $n=$n->next;
        }
        if(strcmp($n->ele,$value)===0){
            return $j;
        }else{
            return -1;
        }
    }
    public function InsertInIndex($i,$e){
        if($i>self::$Length||$i<1){
            return false;
        }
        $n=$this;
        $j=1;
        while($j<$i&&$n->next!==null){
            $n=$n->next;
            $j++;
        }
        $nV=new datas();
        $nV->ele=$e;
        $nV->next=$n->next;
        $n->next=$nV;
        self::$Length++;
        return true;
    }
    public function AllEle(){
        $arr=array();
        if($this->IsListEmpty()){
        }else{
            $n=$this->next;
            while($n->next!=null){
                $arr[]=$n->ele;
                $n=$n->next;
            }
            $arr[]=$n->ele;
        }
        return $arr;
    }
    public function DeleteEle($i){
        $i=(int)$i;
        if($i>self::$Length||$i<1){
            return false;
        }
        $n=$this;
        $j=1;
        while($j<$i){
            $n=$n->next;
            $j++;
        }
        $nN=$n->next;
        $n->next=$nN->next;
        $nN=null;
        unset($nN);
        self::$Length--;
    }
    public function DeleteAllSelectedEleFormHeader($value,$i){
        if($i>1){
            $this->DeleteAllSelectedEleFormHeader($value,$i-1);
        }
        $n=$this->EleExitsReturnIndex($value);
        $this->DeleteEle($n);
    }
    public function DeleteAllEleExit(){
        if(!$this->IsListEmpty()){
            $n=$this;
            while($n->next!=null){
                $nN=$n->next;
                $pre=$n;
                while($nN->next!=null){
                    if(strcmp($n->ele,$nN->ele)===0){
                        $pre->next=$nN->next;
                        $nN->next=null;
                        unset($nN);
                        $nN=$pre->next;
                        self::$Length--;
                    }else{
                        $pre=$nN;
                        $nN=$nN->next;
                    }
                }
                if(strcmp($n->ele,$nN->ele)===0){
                    $pre->ele=null;
                    self::$Length--;
                }
                $n=$n->next;
            }
        }
    }
}