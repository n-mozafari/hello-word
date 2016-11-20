<?php
      
$esb = new businessEstelambank();
$param['estelam_girande']['generalInfo']['data'] = array();

$esResult = $esb->select("id = $tableId");
if(mysql_num_rows($esResult))
{
    $param['estelam_girande']['generalInfo']['data'] = mysql_fetch_assoc($esResult);
}

$param['trade']['estelam_girande']['type'] = $returnType;
?>
