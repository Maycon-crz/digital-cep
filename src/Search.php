<?php 

namespace Wead\DigitalCep;

class Search{
    private $url = "https://viacep.com.br/ws/";    
    public function getAddressFromZipcode(string $zipCode): array{
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $zipCode = preg_replace('/[^0-9]/im', '', $zipCode);

        $get = file_get_contents($this->url . $zipCode . "/json/", false, stream_context_create($arrContextOptions));        

        return (array) json_decode($get);
    }
}