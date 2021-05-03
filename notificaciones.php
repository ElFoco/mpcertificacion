<?php
    MercadoPago\SDK::setAccessToken("TEST-1900672380498140-050219-a070982966cb84bb9bfbc1e7d1490d39-752901559");
    $token = "TEST-1900672380498140-050219-a070982966cb84bb9bfbc1e7d1490d39-752901559";
    //Log::info($request);
    //Log::debug($request);

    switch($_POST["type"]) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            break;
    }

    try {
        return header("HTTP/1.1 200 OK");
        //return \Response::json(['HTTP/1.1 200 OK'], 200);
    } finally {
        switch($_POST["type"]) {
            case "payment":
                $_POST["id"];
                break;  
            case "plan":
                Log::debug("Entro al plan");
                Log::debug($request);
                $plan = MercadoPago\Plan.find_by_id($request->id);
                break;
            case "subscription":
                Log::debug("Entro al subscription");
                Log::debug($request);
                $plan = MercadoPago\Subscription.find_by_id($request->id);
                
                break;
            case "invoice":
                Log::debug("Entro al invoice");
                Log::debug($request);
                $plan = MercadoPago\Invoice.find_by_id($request->id);
                
                break;
            case "test":
                Log::debug("Entro al Test");
                Log::debug($request);
                return;
                $payment = MercadoPago\Payment.find_by_id($request->id);
                //Log::info($request);
                break;
            default:
                Log::debug("Entro al default");
                Log::debug($request);
                break;
        }
        //Log::debug($request);
        //Log::debug($request);
    }
    
    //return header("HTTP/1.1 200 OK");
    //return \Response::json(['HTTP/1.1 200 OK'], 200);
    

    //return header("HTTP/1.1 200 OK");
    //return \Response::json(['HTTP/1.1 200 OK'], 200);
 ?>