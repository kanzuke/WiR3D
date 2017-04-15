<?php 

namespace Core\String;



class String {


    
    /**
     * Remove accents from the string given in input
     * @param  String $str string to remove accents
     * @param  String [$charset='utf-8'] Target charset. UTF-8 if not given
     * @return String Clear string
     */
    public static function removeAccents($str, $charset='utf-8') {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        $str = preg_replace('#\&([A-za-z])(?:acute|cedil|circ|grave|ring|tilde|uml)\;#', '\1', $str);
        $str = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#\&[^;]+\;#', '', $str); // supprime les autres caractères

        return $str;
    }
    
    
    
    
    


}