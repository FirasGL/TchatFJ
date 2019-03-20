<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 19/03/19
 * Time: 23:03
 */

namespace TChatFJ\Repository;

use TChatFJ\Entity\Message;

class MessageRepository extends DBRepository {

    public function __construct() {
    }

    public function getMessages($msgID = NULL) {
        $DBInstance = $this->getDBInstance();
        $messages = array();
        $whereClause = "";
        if ($msgID) {
            $whereClause = "WHERE msg.id = {$msgID}";
        }
        $query = "
              SELECT msg.id, msg.message, msg.created_date, sender.username FROM message msg
              LEFT JOIN user sender ON sender.id = msg.user_id
              {$whereClause}
              ORDER BY msg.created_date ASC
              ";
        $result = mysqli_query($DBInstance, $query);
        if (mysqli_num_rows($result) > 0) {
            while($msg = mysqli_fetch_assoc($result)) {
                $messages[$msg['id']]['message'] = $msg['message'];
                $messages[$msg['id']]['created_date'] = $msg['created_date'];
                $messages[$msg['id']]['username'] = $msg['username'];
            }
        }
        $this->disconnectDB($DBInstance);
        return $messages;
    }

    public function createMessage(Message $msg) {
        $DBInstance = $this->getDBInstance();
        $added = FALSE;
        $msgID = NULL;
        $msgData = array();
        if ($msg) {
            $query = "
              INSERT INTO `message` (`id`, `message`, `created_date`, `user_id`) VALUES
                    (NULL, '" . $msg->getMessage() . "', '" . $msg->getCreated_date() . "', '" . $msg->getUser_id() . "');
              ";
            $added = mysqli_query($DBInstance, $query, MYSQLI_USE_RESULT);
            if ($added) {
                $msgID = mysqli_insert_id($DBInstance);
            }

        }
        if ($added && $msgID) {
            $msgData = $this->getMessages($msgID);
        }
        $this->disconnectDB($DBInstance);
        return array($added, $msgData);
    }
}
