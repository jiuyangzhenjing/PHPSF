<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2 0002
 * Time: 上午 11:31
 */
define("MAXSIZE",1000);
class treeNode{
    public $data;
    public $parent;
    public $first;
    public function __construct(){
        $this->data=null;
        $this->parent=null;
        $this->first=null;
    }
}
class chileList{
    public $data;
    public $next;
    public function __construct($data){
        $this->data=$data;
        $this->next=null;
    }
}
class childNode{
    public $data;
    public $next;
    public function __construct(){
        $this->next=null;
        $this->data=null;
    }
}
class tree{
    public $arr=Array();
    public $r,$n;
    public $treename;
    public function __construct($treename){
        $this->arr=null;
        $this->n=null;
        $this->r=null;
        $this->treename=$treename;

        $node=new treeNode();
        $node->data=$this->treename;
        $node->parent=-1;
        $this->arr[]=$node;
    }
    public function ADDNode($data,$parent,$c){
        $node=new treeNode();
        if($parent!=-1){
            $node->parent=$parent;
            $node->data=$data;
            $node->first=$c;
            $this->arr[]=$node;
            return $this->arr;}
        else
            echo "您定义的树是".$this->treename."\n不可更改";
        return false;
    }
}
$tree=new tree("root");
$tree->ADDNode("A",-1,-1);
$tree->ADDNode("B",0,3);
$tree->ADDNode("C",0,-1);
$tree->ADDNode("D",1,-1);
$tree->ADDNode("E",1,-1);
$tree->ADDNode("活着的意义就在于，成为世界不可或缺的一个人",1,-1);
echo "<pre>";
var_dump($tree->arr);
echo "</pre>";