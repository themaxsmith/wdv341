<?php
include("vaildation.php");
$formVaildation = new vaildations();

echo "isEmpty: 'fdf' - ";
echo $formVaildation->isEmpty("fdf")."<br />";
echo "isEmpty: '' - ";
echo $formVaildation->isEmpty("")."<br />";
echo "hasSpecial: '>?' - ";
echo $formVaildation->hasSpecial(">?")."<br />";
echo "notVaildPhone: '515-661-7806' - ";
echo $formVaildation->notVaildPhone("515-661-7806")."<br />";
echo "notVaildEmail: 'max@.com' - ";
echo $formVaildation->notVaildEmail("max@.com")."<br />";
echo "notVaildEmail: 'max@gmail.com' - ";
echo $formVaildation->notVaildEmail("max@gmail.com")."<br />";



?>
