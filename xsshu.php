<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4 0004
 * Time: 下午 9:05
 */
class node{
    public $data=null;
    public $left=null;
    public $right=null;
    public $rtag=null;
    public $ltag=null;
    public function Node($data=false){
        $this->data=$data;
    }
    public function GetData(){
        return $this->data;
    }
    public function SetData($data){
        $this->data=$data;
    }
}
class Tree{
    private $data=null;
    private $root=null;
    private $leftCount=0;
    private $headNode=null;
    private $preNode=null;
    public function xsshu(){
        $this->headNode=new node();
        $this->preNode=&$this->headNode;
        $this->headNode->ltag=0;
        $this->headNode->left=$this->root;
        $this->headNode->rtag=1;
        $this->xsshuchusngjisn($this->root);
        $this->preNode->right=$this->headNode;
        $this->preNode->rtag=1;
        $this->headNode->right=$this->preNode;
    }
    private function xsshuchusngjisn($node){
        if($node!=null){
            if($node->left==null){
                $node->ltag=1;
                $node->left=$this->preNode;
            }else{
                $this->xsshuchusngjisn($node->left);
            }
            if($this->preNode!=$this->headNode&&$this->preNode->right==null){
                $this->preNode->rtag=1;
                $this->preNode->right=$node;
            }
            $this->preNode=&$node;
            $this->xsshuchusngjisn($node->right);
        }
    }
}