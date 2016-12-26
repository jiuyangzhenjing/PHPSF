<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/8 0008
 * Time: 下午 4:03
 */
class EdgeNode{
    public $adjVex;                  //该顶点位置;
    public $weight;                  //权值;
    public $NextNode;                //下一个顶点;
}
class VertexNode{
    public $data;                    //存储顶点信息;
    public $firstEdge;               //存储第一个Edge;
}
class Graph{
    private $adjList;
    private $VertexNum;
    private $edgeNum;

    public function CreateGraph($VertexNum,$EdgeNum,$adjList){
        $this->edgeNum=$EdgeNum;
        $this->VertexNum=$VertexNum;
        for($i=0;$i<$this->VertexNum;$i++){
            $this->adjList[$i]->data=$adjList[$i]->data;
            $this->adjList[$i]->firstEdge=null;
        }
        for($n=0;$n<$this->edgeNum;$n++){
            $e=new EdgeNode();
            $Ver=$this->HelpNumArr();

            $e->adjVex=$Ver[1];
            $e->NextNode=$this->adjList[$Ver[0]]->firstEdge;
            $this->adjList[$Ver[0]]->firstEdge=$e;

            $e->adjVex=$Ver[0];
            $e->NextNode=$this->adjList[$Ver[1]]->firstEdge;
            $this->adjList[$Ver[1]]->firstEdge=$e;
        }
    }
    private function HelpNumArr($i=10,$j=9){
        return [$i,$j];
    }
}