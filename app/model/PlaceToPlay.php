<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PlaceToPlay extends Model
{
    //

    public $llave="024h1IlD";
    public $wsdl="https://test.placetopay.com/soap/pse/?wsdl";
    public $identificador="6dd490faf9cb87a9862245da41170ff2";

    public function Auth()
    {
    	
    	$seed = date('c');

    	$hashString = sha1($seed.$this->llave, false );

    	$auth =array("login" =>$this->identificador,
                    "tranKey" => $hashString,
                    "seed" =>$seed,
                    "additional" => "");

    	return $auth;

    }
}
