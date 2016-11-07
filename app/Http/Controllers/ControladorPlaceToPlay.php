<?php

namespace App\Http\Controllers;

use App\model\PlaceToPlay;
use Illuminate\Http\Request;
use App\Http\Requests;

class ControladorPlaceToPlay extends Controller
{
    
    public function ListaBancos()
    {
    	$objPlace = new PlaceToPlay();

        $cliente = new \SoapClient($objPlace->wsdl);

        $auth = $objPlace->Auth();

        dd($cliente->getBankList(array("auth"=>$auth))->getBankListResult);

    }

    public function index()
    {
        $mensaje = "";
        return view("place.index",compact("mensaje"));
    }


    public function create()
    {
        $objPlace = new PlaceToPlay();

        $cliente = new \SoapClient($objPlace->wsdl);

        $auth = $objPlace->Auth();

        $bancos = collect($cliente->getBankList(array("auth"=>$auth))->getBankListResult);

        return view("place.create",compact("bancos"));
    }


    public function store(Request $request)
    {
        $person = array(
            "document" =>$request->num_doc,
            "documentType"=>$request->tipo_doc,
            "firstName"=>$request->nombre,
            "lastName"=>$request->apellido,
            "company"=>$request->empresa,
            "emailAddress"=>$request->correo,
            "address"=>$request->direccion,
            "city"=>$request->ciudad,
            "province"=>$request->departamento,
            "country"=>$request->cod_pais,
            "phone"=>$request->telefono,
            "mobile"=>$request->celular,
        );

        $transaction= array(
            "bankCode"=>$request->banco,
            "bankInterface"=>$request->interfaz,
            "returnURL"=>$request->url,
            "reference"=>$request->referencia,
            "description"=>$request->descripcion,
            "language"=>$request->lenguaje,
            "currency"=>$request->moneda,
            "totalAmount"=>$request->valor,
            "taxAmount"=>$request->impuesto,
            "devolutionBase"=>$request->devolucion,
            "tipAmount"=>$request->propina,
            "payer"=>$person,
            "buyer"=>$person,
            "shipping"=>$person,
            "ipAddress"=>$request->getClientIp(),
            "userAgent"=>$_SERVER['HTTP_USER_AGENT'],
            "additionalData"=>"",
        );

        $objPlace = new PlaceToPlay();

        $cliente = new \SoapClient($objPlace->wsdl);

        $auth = $objPlace->Auth();

        $resulTransaction = collect($cliente->createTransaction(array("auth"=>$auth,"transaction"=>$transaction))->createTransactionResult);
        /*
         * dd($resulTransaction);
         *
            "returnCode" => "SUCCESS"
            "bankURL" => "https://200.1.124.236/rEgIsTrO/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbuyyPZZpWAAkasb4FPLC5GU%2fOW7k5IAps%2bDxEIay%2b%2b1iu"
            "trazabilityCode" => "1198709"
            "transactionCycle" => -1
            "transactionID" => 1443053707
            "sessionID" => "2a1ddbeaae8eb6f0a9fbf5ceefdbfdf6"
            "bankCurrency" => "COP"
            "bankFactor" => 1.0
            "responseCode" => 3
            "responseReasonCode" => "?-"
            "responseReasonText" => "Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco."
         *
         * */

            $mensaje ="credito creado satisfactoriamente";
        
                 
        return view("place.index",compact("mensaje"));
        


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
    
    }

    public function consultar(Request $request){

        $objPlace = new PlaceToPlay();

        $cliente = new \SoapClient($objPlace->wsdl);

        $auth = $objPlace->Auth();

        $datos = collect($cliente->getTransactionInformation( array( "auth"=>$auth, "transactionID"=>$request->id))->getTransactionInformationResult);

        return response()->json($datos,200);
    }
}
