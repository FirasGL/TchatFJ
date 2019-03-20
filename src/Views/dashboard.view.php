<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Chat Template with jQuery / Bootstrap 3</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

    <link rel="stylesheet" href="/css/main.css">


</head>

<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                </div>
                <div class="panel-body">
                    <ul class="chat" id="msg-list">
                        <?php foreach($messages as $id => $msg): ?>
                            <div class="chat-body chat-msg clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $msg['username']; ?></strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo $msg['created_date']; ?>
                                    </small>
                                </div>
                                <p>
                                    <?php echo $msg['message']; ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <form id="send-message" method="post" action="/">
                            <input id="user-id" type="text" style="display: none;" value="<?php echo $_SESSION['loggedIn']; ?>"/>
                            <input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                            <br>
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm btn-send" id="btn-chat" type="submit">Send</button>
                            </span>
                            <div><a class="row-space" href="/index.php?page=logout">Sign Out</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript" src="/js/chat.js"></script>
</body>

</html>
