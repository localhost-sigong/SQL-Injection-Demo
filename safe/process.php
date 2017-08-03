<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "devonnuri");
    mysqli_select_db($conn, "sql_injection_demo");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql="SELECT password FROM `users` WHERE username='".$username."'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(mysqli_num_rows($result) == 1 && password_verify($password, $row["password"])) {
            $_SESSION["login_username"] = $username;
            header('Location: /safe/index.php');
        } else {
            header('Location: /safe/index.php?msg=error');
        }

    }
?>
