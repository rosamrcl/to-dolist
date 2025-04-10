<?php
$url="http://localhost/to-dolist/api/";

function GetTest($url){
    $ambrosio=curl_init($url); 
    curl_setopt($ambrosio, CURLOPT_RETURNTRANSFER,true);
    $res=curl_exec($ambrosio);
    curl_close($ambrosio);
    echo "Resposta GET:\n";
    echo $res . "\n\n";
}
function PostTest($url, $titulo){
    $dados=json_encode(['titulo'=>$titulo]);

    $ambrosio=curl_init($url);
    curl_setopt($ambrosio, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ambrosio, CURLOPT_POST,true);
    curl_setopt($ambrosio, CURLOPT_HTTPHEADER,['Content-Type:application/json']);
    curl_setopt($ambrosio, CURLOPT_POSTFIELDS,$dados);

    $res=curl_exec($ambrosio);
    curl_close($ambrosio);
    echo "Resposta POST:\n";
    echo $res . "\n\n";
}
GetTest($url);
PostTest($url, 'Testar Curl via PHP');

?>