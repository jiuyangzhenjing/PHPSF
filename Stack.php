<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/30 0030
 * Time: 上午 10:51
 */
define("MAXSIZE",1000);
class datas{
    public $data;
    public $next;
    public function __construct(){
        $this->data=null;
        $this->next=null;
    }
}
class stack{
    public $data;
    public $next;
    public static $Length;
    public function __construct(){
        $this->data=null;
        $this->next=null;
    }
    public function clearStack(){
        if(self::$Length>0){
            while($this->next!=null){
                $n=$this->next;
                $this->next=null;
                unset($this->next);
                $nN=$n->next;
                $this->next=$nN;
            }
        }
        self::$Length=0;
    }
    public function DestroyStack(){
        if(self::$Length>0){
            while($this->next!=null){
                $n=$this->next;
                $this->next=null;
                unset($this->next);
                $nN=$n->next;
                $this->next=$nN;
            }
            unset($this);
        }
        unset($this);
        self::$Length=null;
        return true;
    }
    public function IsEmptyStack(){
        if(self::$Length==0||$this->next==null){
            return true;
        }
        else{
            return false;
        }
    }
    function GetTop(){
        if($this->next!=null){
            $j=0;
            $n=$this->next;
            while($n->next!=null){
                $nN=$n->next;
                $n=$nN;
            }
            return $n;
        }
        return $this;
    }
    function Push($e){
        if(self::$Length>=MAXSIZE){
            return false;
        }
        $Ne=new datas();
        $Ne->data=$e;
        $Ne->next=null;
        $n=$this->GetTop();
        $n->next=$Ne;
        self::$Length++;
        return true;
    }
    function Pop(){
        $i=1;
        $n=$this;
        while($i<self::$Length){
            $n=$n->next;
            $i++;
        }
        $nN=$n->next;
        $n->next=null;
        unset($n->next);
        return $nN;
    }
    function StackLength(){
        return self::$Length;
    }
}