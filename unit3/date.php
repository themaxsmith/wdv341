
<?php

function dateFMT($inDate){
  return date("d/m/Y",$inDate);
}
function dateInternational($inDate){
  return date("m/d/Y",$inDate);
}
function cntDMC($inString){
echo "Character(s): ".strlen($inString);
$inString = trim($inString);
$inString =  strtolower($inString);
if (strpos(strtolower($inString), 'dmacc') !== false){
return $inString;
}
}

function formatNum($inString){
return number_format($inString);
}

function formatCur($inNum){
return  money_format('$%i', $inNum);
}
?>

<h1>Test PHP Functions</h1>
<?php
echo dateFMT(time())." <br />";
echo dateInternational(time())." <br />";
echo cntDMC('test string')." <br />";
echo formatNum(123456789)." <br />";
echo formatCur(123456)." <br />";
?>
