<?php
$scale = 10000;
$maxarr = 10000;
$arrinit = 2000;
$carry = 0;

for($i=0;$i<=$maxarr;$i++)
    $arr[$i] = $arrinit;


for($i=$maxarr;$i>0;$i=$i-14)
{
    $sum = 0;
    for($j=$i;$j>0;$j--)
    {
        $sum = ($sum * $j) + ($scale * $arr[$j]);
        $arr[$j] = $sum % (($j*2)-1);
        $sum = $sum / (($j*2)-1);
    }
    printf("%04d",($carry + ($sum / $scale)));
    $carry = $sum % $scale;
}
