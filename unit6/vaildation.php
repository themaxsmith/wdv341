<?php

  class vaildations {

    function __construct(){

    }
    public function isEmpty($inString){
      return empty($inString);
    }

    public function notVaildEmail($inString){
      return !filter_var($inString, FILTER_VALIDATE_EMAIL);
    }
    public function hasSpecial($inString){
      return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $inString);
    }
    public function validateSpecial($inString){
      return filter_var($inString, FILTER_SANITIZE_STRING);
    }

    function notVaildPhone($phone)
{
     if (is_numeric ($phone)){

     if (strlen($phone) > 9 && strlen($phone) < 14){
       return false;
     }
   }

return true;
}
  }
?>
