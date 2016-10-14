<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 13.10.2016
 * Time: 13:10
 * @author Volkan Ulukut <arthan@gmail.com>
 */
session_start();

include "vendor/autoload.php";

use Simplechat\Controllers\ChatController;
use Simplechat\Models\SQLiteDataSource;

//by default api status is "failed"
$response['status'] = 0;

//getting json body from the http request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if(isset($input))
{
    //instantiating main controller
    $controller = new ChatController(new SQLiteDataSource());
    //call appropriate method with its parameters
    switch ($input['method']) {
        case "createUser":
            $_SESSION['userId'] = $controller->createUser($input['name']);
            if($_SESSION['userId'] > 0)
                $response['status'] = 1;
            break;
        case "sendMessage":
            $result = $controller->sendMessage($input['content'],$_SESSION['userId'],$input['receiverId']);
            if($result > 0)
                $response['status'] = 1;
            break;
        case "getNewMessages":
            $data = $controller->getNewMessages($_SESSION['userId']);
            if(is_array($data))
            {
                $response['status'] = 1;
                $response['messages'] = $data;
            }
            break;
    }
}

//output response in json
echo json_encode($response);