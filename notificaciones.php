<?php
    require __DIR__ .  '/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("TEST-1900672380498140-050219-a070982966cb84bb9bfbc1e7d1490d39-752901559");
    $token = "TEST-1900672380498140-050219-a070982966cb84bb9bfbc1e7d1490d39-752901559";

    function pg_connection_string_from_database_url() {
        extract(parse_url("postgres://kuxlvvcjoasdqm:6dc3b45c21fd058f8265b3a8778807843153f86f3fb3fde303c09c3664a022b7@ec2-52-87-107-83.compute-1.amazonaws.com:5432/dehqifhcm8r8hk"));
        return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
    }
    
    # Here we establish the connection. Yes, that's all.
    $pg_conn = pg_connect(pg_connection_string_from_database_url());
    //$datos = json_encode($_POST["type"]);
    //$datos = json_encode($_POST["data"]);
    /*$datos = $_REQUEST["type"];
    $sqlquery = "INSERT INTO registros VALUES ('$datos')";
    $result = pg_query($pg_conn, "INSERT  INTO registros (registro) VALUES ('$datos');");
    if ( $result ) {
        print  "Record Successfully Added!";
    }
    else{
        print  "No se pudo ejecutar el query";
    }
    return header("HTTP/1.1 200 OK");*/

    //Log::info($request);
    //Log::debug($request);

    //print "Entro en el notificaciones";
    //return;

    try {
        return header("HTTP/1.1 200 OK");
        //return \Response::json(['HTTP/1.1 200 OK'], 200);
    } finally {
        switch($_REQUEST["type"]) {
            case "payment":
                $datos = json_encode($_REQUEST);
                $client = new \GuzzleHttp\Client();
                $headers = [
                    'Authorization' => 'Bearer '.$token
                ];
                
                //$ruta = "https://api.mercadopago.com/v1/payments/1234587832";
                $ruta = "https://api.mercadopago.com/v1/payments/".$_REQUEST["data_id"];
                //$request = $client->get($ruta);
                //$response = $request->getBody();

                $res = $client->request('GET',$ruta, [
                    'headers' => $headers
                ]);
                //$response = Http::get('https://api.mercadopago.com/v1/payments/'+$request->id);
                $obj = $res->getBody();
                $sqlquery = "INSERT INTO registros (registro) VALUES ('$obj');";
                $result = pg_query($pg_conn, $sqlquery);
                break;  
            case "plan":

                break;
            case "subscription":
                
                break;
            case "invoice":
                
                break;
            case "test":
                $datos = json_encode($_REQUEST);
                $sqlquery = "INSERT INTO registros (registro) VALUES ('$datos');";
                $result = pg_query($pg_conn, $sqlquery);
                break;
            default:
                $datos = json_encode($_REQUEST);
                $sqlquery = "INSERT INTO registros (registro) VALUES ('$datos');";
                $result = pg_query($pg_conn, $sqlquery);
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