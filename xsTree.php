<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4 0004
 * Time: 上午 10:02
 */
class TreeNode{
    private $data;
    private $leftchild_leftPre;
    private $lefttag;
    private $rightchild_rightPre;
    private $righttag;
    public function __construct(){
        $this->data=null;
        $this->leftchild_leftPre=null;
        $this->lefttag=null;
        $this->righttag=null;
        $this->rightchild_rightPre=null;
    }
}
class xsTree{
    public $data;
    public $leftchild_leftPre;
    public $lefttag;
    public $rightPre;
    public $rightchild_rightPre;
    public function __construct(){
        $this->lefttag=null;
        $this->rightchild_rightPre=null;
        $this->leftchild_leftPre=null;
        $this->rightPre=null;
        $this->data=null;
    }
}
function CreateTree($arr){
    if($arr!=[]){
        $arrFirst=array_shift($arr);
        if($arrFirst=="null"){
            $treeArray=[null,$arr];
        }else{
            $TREe=new xsTree();
            $TREe->data=$arrFirst;
            echo $arrFirst;
            $TREe->leftchild_leftPre=CreateTree($arr);
            $arr=$TREe->leftchild_leftPre[1];
            $TREe->rightchild_rightPre=CreateTree($arr);
            $arr=$TREe->rightchild_rightPre[1];
            $treeArray=[$TREe,$arr];
        }
        return $treeArray;
    }else{
        return null;
    }
}
function bianliqianxu($tree){
    if($tree[0]->data==null){
        return null;
    }else{
        bianliqianxu($tree[0]->leftchild_leftPre);
        bianliqianxu($tree[0]->rightchild_rightPre);
    }
}
$arr=["A","B","D","null","null","E","null","null","C","F","null","null","G"];
$tree1=CreateTree($arr);