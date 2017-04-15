<?php

namespace Core\HTML;




class BootstrapHelper {
    
    
    
  public static function getAlertDiv($text, $title='Alert')  {
      $class="alert alert-danger";
      return self::_getGeneralDiv($text, $title, $class);
  }
    
    
  public static function getWarningDiv($text, $title='Warning') {
      $class="alert alert-warning";
  }
    
    
  public static function getInformationDiv($text, $title = 'Information') {
      $class="alert alert-info";
  }
   
    
  public static function getSuccessDiv($text, $title = 'Success') {
      $class="alert alert-success";
  }
    
    
    
 protected static function _getGeneralDiv($text, $title = '', $class) {
     return "<div class=\"$class\">$text</div>\r\n";
 }
    
}
?>