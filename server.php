<?php

class Server
{

    public function start()
    {
        return [
            'product' => 'P2P',
            'components' => [
                [
                    'name' => 'Parcelamento_A',
                    'binds' => ['Mensagem_A'],
                    'elements' => ['input', 'select']
                ],
                [
                    'name' => 'Mensagem_A', 'binds' => [], 'elements' => ['checkbox']
                ],
                [
                    'name' => 'ParaQuem_A',
                    'binds' => ['Mensagem_A', 'Parcelamento_A'],
                    'elements' => ['textarea']
                ]
            ]
        ];
    }
}

$action = $_GET['action'];
$result = [];

$server = new Server();
if (method_exists($server, $action)) {
    $result = $server->{$action}();
}

echo json_encode($result);
