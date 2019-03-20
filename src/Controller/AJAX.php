<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 20/03/19
 * Time: 13:47
 */

namespace TChatFJ\Controller;

use TChatFJ\Repository\MessageRepository;
use TChatFJ\Entity\Message;

class AJAX {

    public function getMessages()
    {
        $msgRepo = new MessageRepository();
        $messages = $msgRepo->getMessages();
        header('Content-Type: application/json');
        if ($messages) {
            echo json_encode($messages);
            exit;
        }
        else {
            echo json_encode(FALSE);
            exit;
        }
    }

    public function sendMessage()
    {
        $message = $_POST['message'];
        $userID = $_POST['userID'];
        $msgObject = array('message' => $message, 'user_id' => $userID, 'created_date' => date("Y-m-d H:i:s"));
        $msg = new Message($msgObject);
        $msgRepo = new MessageRepository();
        list($added, $msgData) = $msgRepo->createMessage($msg);
        header('Content-Type: application/json');
        if ($added && $msgData) {
            echo json_encode(reset($msgData));
            exit;
        }
        else {
            echo json_encode(FALSE);
            exit;
        }
    }
}
