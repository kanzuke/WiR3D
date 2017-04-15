<?php
    namespace Core\HTML;

    use \Core\HTMLForm;


    class BootstrapForm extends Form {
        
        
        
        
        
        
        protected function surround($html) {
            return "<div class=\"form-group\">{$html}</div/>\r\n";
            //return "{$html}\r\n";
        }
    
        
        
        
         /**
          * Return a ready-to-write input
          * @param  string $name          input name
          * @param  string $label         input label
          * @param  array  [$options= []] options array
          * @return string HTML Code    
          */
         public function input($name, $label, $options = []) {
//            $type = isset($options['type']) ? $options['type'] : 'text';
//             
//            $value = $type === "password" ? "" : $this->getValue($name);
//            
//            $isRequired = $this->isRequired($options);
//
//            return $this->surround(
//                '<label for="'.$name.'" class="sr-only">'.$label.'</label>'.
//                '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" placeholder="'.$label.'" class="form-control" ' . $isRequired . '>'
//            );
             
            $options['class'] = isset($options['class']) ? 'form-control '.$options['class'] : 'form-control';
             
            return $this->surround(
                '<label for="'.$name.'" class="sr-only">'.$label.'</label>'.
                $this->getInputHtmlCode($name, $label, $options)
            );

        }
    

    
    public function submit($options = []) {
        $class = isset($options['class']) ? $class = $options['class'] : $class = "btn btn-primary";
        
        $label = isset($options['label']) ? $label = $options['label'] : $label = "Send";
        
        
        return $this->surround(
            '<button type="submit" class="'. $class .'">'.$label.'</button>'
            );
    }
        
        
}




    
?>

