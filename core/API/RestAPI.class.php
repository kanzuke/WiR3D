<?php


//namespace Core\API;



class RestAPI {
    
    
    
    
    
    
    
    
    
    /**
     * [[Description]]
     * @param  [[Type]] $url  [[Description]]
     * @param  [[Type]] $data [[Description]]
     * @return json [[Description]]
     */
    protected function post($url, $data) {
        $curl = curl_init();
       var_dump($data);
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        
        
        echo "<hr>";
        $curl_response = curl_exec($curl);
         $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
        
        
        print($httpCode);
        
//        
//        if ($curl_response === false) {
//            $info = curl_getinfo($curl);
//            curl_close($curl);
//            die('error occured during curl exec. Additional info: ' . var_export($info));
//        }
//        curl_close($curl);
//        $decoded = json_decode($curl_response);
//        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
//            die('error occured: ' . $decoded->response->errormessage);
//        }
//        echo 'response ok!';
//        var_export($decoded->response);
    }

}