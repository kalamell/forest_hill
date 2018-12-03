<?php
$result=array();

$result['total']= 2;

$items=array();
if(count($rs)>0)
{
      $i=1;
      foreach($rs as $r)
      {
             array_push($items, $r);
            $i++;
      }
}

$result['rows']=$items;

echo json_encode($result);
