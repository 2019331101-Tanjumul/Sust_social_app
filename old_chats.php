<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/old_chats.css">

    <script src="js/jquery.min.js"></script>
    <title>Old Chats</title>
</head>

<body>
    <div class="wrapper">
        
                <div class='chat-field' style="height:500px;overflow-x:hidden;overflow-y:scroll;" id="chatbox">

                    <?php
                    session_start();
                    require "config.php";

                    $to = $_GET["target"];
                    $from = $_SESSION["reg"];

                    $sql = "SELECT * FROM chats where from_id='$from' and to_id='$to' or from_id='$to' and to_id='$from';";
                    $q = mysqli_query($con, $sql);
                    /*
                    $r = mysqli_fetch_assoc($q);

                    echo "<pre>";
                    print_r($q);
                    echo "</pre>";
                    */


                    while ($r = mysqli_fetch_assoc($q)) {
                        if ($r["from_id"] == $_SESSION["reg"]) {
                            echo <<<_END
        <div style='text-align:right;'title='$r[sent_time]'>
        <br>
        <p style='background-color: #d53369;color:white;max width:70%;display:inline-block;word-wrap:break-word;padding:5px 10px;border-radius:10px;'>
        $r[msg]
        </p>
        <br>
        </div>

        _END;

                        } else {
                            echo <<<_END
        <div style='text-align:left;'title='$r[sent_time]'>
        <br>
        <p style='background-color:lightblue;max width:70%;display:inline-block;word-wrap:break-word;padding:5px 10px;border-radius:10px'>
        $r[msg]
        </p>
        <br>
        </div>

        _END;

                        }
                    }

                    ?>
                </div>
                <div id="operation" class="block-div">

                </div>
            
        
    </div>
    <div>
        <input type="text" id="from" value="<?php echo $from ?>" hidden>
        <input type="text" id="to" value="<?php echo $to ?>" hidden>
    </div>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                $.ajax({
                    url: "who_blocks_whom.php",
                    method: "POST",
                    data: {
                        from: $("#from").val(),
                        to: $("#to").val(),
                    },
                    success: function (data) {
                        $("#operation").html(data);
                    }
                });
            }, 700);

        });
    </script>
</body>

</html>