<?php
/**
 * Created by PhpStorm.
 * User: firas
 * Date: 18/03/19
 * Time: 18:40
 */

namespace TChatFJ\Controller;

use TChatFJ\Repository\MessageRepository;
use TChatFJ\Entity\Message;

class DashboardController extends BaseController {

    public function __construct()
    {
    }

    public function dashboardAction()
    {
        $msgRepo = new MessageRepository();
        $params['messages'] = $msgRepo->getMessages();
        $this->render('dashboard.view.php', $params);
    }
}

