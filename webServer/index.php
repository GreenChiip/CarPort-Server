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

    if(!isset($_SESSION["UUID"]) || $_SESSION["UUID"] !== $json_data["UUID"]){
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
<head>

<body>
    <div class="main">
        <form action="signal.php" method="GET">
            <input type="hidden" name="UUID" value="<?php echo $_SESSION["UUID"];?>">
            <button id="signal" type="submit" class="btn">
                <div class="btn_text">Open/<br>Close</div>
            </button>
        </form>
</body>
</html>
