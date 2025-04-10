<?php

$list = 'tarefas.json';

header("Content-Type: application/json");

$metodo=$_SERVER['REQUEST_METHOD'];

function readTask($list){
    if (!file_exists($list)){
        file_put_contents($list,'[]');
    }
    $dados=file_get_contents($list);
    return json_decode($dados,true);
}
function saveTask($list,$task){
    file_put_contents($list,json_encode($task, JSON_PRETTY_PRINT));
}


if($metodo==='GET'){
    $task=readTask($list);
    echo json_encode($task);
    exit;
}

if ($metodo==='POST'){
    $input=file_get_contents('php://input');
    $newTask= json_decode($input,true);

    if(!isset($newTask['titulo']) || empty(trim($newTask['titulo']))){
        http_response_code(400);
        echo json_encode(['erro'=>'O campo "titulo" é obrigatório.']);
        exit;
    }
    $task=readTask($list);
    $task[]=$newTask;
    saveTask($list,$task);
    
    echo json_encode(['mensagem'=> 'Tarefa adicionada com sucesso.']);
    exit;
}


?>