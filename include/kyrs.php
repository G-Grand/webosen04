<?php
function _is_curl_installed() {
    if  (in_array  ('curl', get_loaded_extensions())) {
        return true;
    }
    else {
        return false;
    }
}
function getKurs() {
    global $dna; $dna = true;
    if ( _is_curl_installed() ){
        $url = "https://api.privatbank.ua/p24api/pubinfo?exchange&coursid=5";
        $curl = curl_init($url);
        if ( $curl ){
            // Скачанные данные не выводить поток
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            // Скачиваем
            $page = curl_exec($curl);   //В переменную $page помещается страница
 
            curl_close($curl);
            unset($curl);
 
            $xml = new SimpleXMLElement($page);
            return $xml->row[2]->exchangerate['sale'][0];
        }
    }
}
?>