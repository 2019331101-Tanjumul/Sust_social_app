<?php
error_reporting(0);

session_start();
require "config.php";

$to_id = $_GET["target"];
$from_id = $_SESSION["reg"];

$sql1 = "SELECT * FROM users where reg = $to_id;";
$q1 = mysqli_query($con, $sql1);
$r1 = mysqli_fetch_assoc($q1);

$status_sql = "SELECT status FROM status where reg = $to_id;";
$status_query = mysqli_query($con, $status_sql);
$status_check = mysqli_fetch_assoc($status_query);
$status_info = $status_check["status"];

#echo "Sender:$from_id and Receiver:$to_id";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title>Chats</title>
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <div id="status">

                </div>
                <div class='bg-info' style="height:350px;overflow-x:hidden;overflow-y:scroll;" id="chatbox">

                </div>
                <div class='bg-success'>
                    <textarea name="msg" id="msg" cols="55" rows="3"></textarea>
                    <input type="text" value="<?php echo $from_id ?>" id="from" hidden>
                    <input type="text" value="<?php echo $to_id ?>" id="to" hidden>
                    <button class='btn btn-dark' id="send">SEND</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        var chatbox = document.getElementById('chatbox');
        chatbox.scrollTop = chatbox.scrollHeight;
    </script>
    <script type="text/javascript">
        var chatbox = document.getElementById('chatbox');
        function scrollToBottom() {

            chatbox.scrollTop = chatbox.scrollHeight;

        }
        $(document).ready(function () {

            $("#send").click(function () {
                $.ajax({
                    method: "POST",
                    url: "insertmsg.php",
                    data: {
                        from_id: $("#from").val(),
                        to_id: $("#to").val(),
                        msg: $("#msg").val(),
                    },
                    success: function (data) {
                        $("#msg").val("");
                    }
                });
            });
            setInterval(function () {
                $.ajax({
                    url: "allmsg.php",
                    method: "POST",
                    data: {
                        from_id: $("#from").val(),
                        to_id: $("#to").val(),
                    },
                    success: function (data) {
                        $("#chatbox").html(data);
                        scrollToBottom();
                    }
                });
            }, 700);
            setInterval(function () {
                $.ajax({
                    url: "status_check.php",
                    method: "POST",
                    data: {
                        to_id: $("#to").val(),
                    },
                    success: function (data) {
                        $("#status").html(data);
                    }
                });

            }, 700);

        });
    </script>
</body>

</html>