<?php
    session_start();
    $json = file_get_contents('config.json');
    $json_data = json_decode($json, true);

    if (isset($_POST["username"]) && isset($_POST["password"])){
        if($_POST["username"] !== $json_data["username"]){
            echo "<meta http-equiv='refresh' content='0'>";
            return;
        }
        if($_POST["password"] !== $json_data["password"]){
            echo "<meta http-equiv='refresh' content='0'>";
            return;
        }
        $_SESSION["UUID"] = $json_data["UUID"];
    }

    if($_SESSION["UUID"] !== $json_data["UUID"]){
        ?>
        <!DOCTYPE html>
            <html>
            <head>
                <title>CarPort - Login</title>
                <link rel="stylesheet" href="styles.css">
            <head>
            <body>
                <div class="main">
                <form method="POST">
                    <div class="box">
                        <h1>CarPort - Login</h1>
                        <input class="email" name="username" placeholder="Username..."/>
                        <input class="email" type="password" name="password" placeholder="Password..."/>
                        <input class="btn_login" type="submit" value="Login" />
                    </div> 
                </form>
                </div>
            </body>
            </html>

        <?php
        return;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>CarPort</title>
    <link rel="stylesheet" href="styles.css">
    <script src="jquery-3.7.0.min.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#signal").click(function(){
                var a = new XMLHttpRequest();
                a.open("GET", `signal.php?${<?php echo $json_data["UUID"] ?>}`);
                a.onreadystatechange=function(){
                    if(a.readyState !=4){
                        alert(`HTTP ERROR ${a.status}`, )
                        return;
                    }
                    if (a.status != 200){
                        alert(`HTTP ERROR ${a.status}`, )
                        return;
                    }
                }
                a.send()
            })
        })
    </script>
<head>

<body>
    <div class="main">
        <button id="signal" type="submit" class="btn">
            <div class="btn_text">Open/<br>Close</div>
        </button>
    </div>
</body>
</html>
