<?php
  require('../config.php');

  $method = strtolower( $_SERVER['REQUEST_METHOD']);

  if($method === 'get'){
     $sql = $pdo->query('SELECT * FROM notes');

     if($sql->rowCount() > 0){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $key => $item) {
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'body' => $item['body'],

            ];
        }
     }

  }else{
     $array['error'] = 'Metodo não permitido (apenas get)';
  }

require('../return.php');
