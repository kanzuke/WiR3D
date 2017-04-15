<?php

namespace Core\HTML;



class Form {
    
    
    protected $data = array();
    protected $surround = "p";
    
    
    public function __construct($data=array()) {
        $this->data = $data;
        //var_dump($this->data);
    }
    
    
    
    protected function surround($html) {
        return "<{$this->surround}>$html</{$this->surround}/>";
    }
    
    protected function getValue($index, $type = "text") {
        if($type === "password") return null;
        else return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    
    
    /**
     * Get the Input type from the $options array. 
     * @param  array [$options = []] options array
     * @return string input type.Default: text
     * @createDate 2017-01-28 20:44                     
     */
    protected function getInputType($options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return 'type="'.$type.'"';
    }
    
    
    protected function getInputClass($options = []) {
        return isset($options['class']) ? ' class="'.$options['class'].'"' : "";
    }
    
    

    
    /**
     * Check if this input is required, regard to given options. Look if the required index is present, and if equals to true.
     * @param  array [$options = []] options array
     * @return string "required" if is required, else ""
     * @createDate 2017-01-28 20:47                                          
     */
    protected function isRequired($options = []) {
        return (isset($options['required']) && $options['required']==true) ? "required" : "";
    }
    
    
    protected function hasFocus($options = []) {
        return (isset($options['autofocus']) && $options['autofocus']==true) ? "autofocus" : "";
    }
    
    
    protected function setAutocomplete($options = []) {
        return (isset($options['autocomplete']) && $options['autocomplete']==false) ? 'autocomplete="off"' : '';
    }
    
    
    protected function isReadOnly($options = []) {
        return (isset($options['readonly']) && $options['readonly']==true) ? 'readonly="yes"' : '';
    }
    
    
    
    protected function getInputHtmlCode($name, $label, $options = []) {
        $type =$this->getInputType($options);
        $value = $this->getValue($name, $type);
        $isRequired = $this->isRequired($options);
        $class = $this->getInputClass($options);
        $hasFocus = $this->hasFocus($options);
        $autocomplete = $this->setAutocomplete($options);
        
        $htmloptions = array(
            "type" => $this->getInputType($options),
            "required" => $this->isRequired($options),
            "class" => $this->getInputClass($options),
            "focus" => $this->hasFocus($options),
            "autofocus" => $this->setAutocomplete($options),
            "readonly" => $this->isReadOnly($options)
        );
        

        
//        $html = '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" placeholder="'.$label.'" '  . $class . $isRequired . $hasFocus . $autocomplete . '>';
    
            $html = '<input name="'.$name.'" value="'.$value.'" placeholder="'.$label.'"';
            foreach($htmloptions as $ho) {
                $html .= $ho." ";
            }
            $html .= ">";
            
        
        return $html;
    }
    
    
    public function input($name, $label, $options = []) {
        return $this->surround(
            $this->getInputHtmlCode($name, $label, $options = [])
        );
        
    }
    

    
    public function submit() {
        return $this->surround(
            '<button type="submit">Envoyer</button>'
            );
    }
    
    
    
    public function legend($label, $options = []) {
        return "<legend>$label</legend>\r\n";
        
    }
    
    
    public function image($name, $ôptions = []) {
        
    }
    
}

//$form = new Form();
//echo $form->input("name", "Nom");
//echo $form->input("password", "Password");
//echo $form->submit();


?>


