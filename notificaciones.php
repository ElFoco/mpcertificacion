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
    $datos = "ASDASDASDASDASDASDASD";
    $sqlquery = "INSERT INTO registros VALUES ('asdasdasdasdasdasd')";
    $result = pg_query($pg_conn, "INSERT  INTO registros VALUES ('3','asdasdasdasd');");
    if ( $result ) {
        print  "Record Successfully Added!";
    }
    else{
        print  "No se pudo ejecutar el query";
    }
    return header("HTTP/1.1 200 OK");

    //Log::info($request);
    //Log::debug($request);

    //print "Entro en el notificaciones";
    //return;

    try {
        return header("HTTP/1.1 200 OK");
        //return \Response::json(['HTTP/1.1 200 OK'], 200);
    } finally {
        switch($_POST["type"]) {
            case "payment":

                break;  
            case "plan":

                break;
            case "subscription":
                
                break;
            case "invoice":
                
                break;
            case "test":
                $datos = json_encode($_POST["data"]);
                $sqlquery = "INSERT INTO registros VALUES ('$datos');";
                $result = pg_query($pg_conn, $sqlquery);
                break;
            default:
                $datos = json_encode($_POST["data"]);
                $sqlquery = "INSERT INTO registros VALUES ('$datos');";
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