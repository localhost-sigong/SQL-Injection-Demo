<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>로컬호스트</title>
    </head>
    <body style="background-color: #EF5350; color: white;">
        <?php
        if (isset($_GET["msg"])) {
            if ($_GET["msg"] == "error") {
                echo "<script>alert(\"아이디 또는 비밀번호가 올바르지 않습니다.\")</script>";
            }
        }
        ?>
       <div class="container">
            <h1>로컬호스트의 SQL Injection 시연 서버 (안전하지 않은 페이지)</h1>
            <?php
            session_start();

            $username = $_SESSION['login_username'] ?? '';

            $conn = mysqli_connect("localhost", "root", "devonnuri");
            mysqli_select_db($conn, "sql_injection_demo");

            if ($username != '') {
                $result = mysqli_query($conn, "SELECT * FROM `users`");
                echo '<h2 style="text-align:center; padding-top: 30px;">Welcome to 관리자 페이지!</h2>';
                echo '<table class="table">';
                echo '<tr><th>Username</th><th>Password</th></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr><td>' . $row["username"] . '</td><td>' . $row["password"] . '</td></tr>';
                }
                echo '</table>';
                echo '<a href="logout.php" class="btn btn-default">로그아웃</a>';
            } else {
                echo file_get_contents("login.html");
            }
            ?>
        </div>
        <script>
          function onClick(cb) {
            $('#exampleInputPassword1').get(0).type = cb.checked ? "text" : "password";
          }
        </script>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
