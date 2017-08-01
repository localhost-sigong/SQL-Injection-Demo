<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>로컬호스트</title>
    </head>
    <body>
        <div class="container">
            <h1>로컬호스트의 SQL Injection 시연 서버</h1>
            <?php
                session_start();

                $username=$_SESSION['login_username'] ?? '';
            ?>
            <form action="process.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">사용자 이름</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="사용자 이름을 입력해주세요.">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">비밀번호</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="비밀번호를 입력해주세요.">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" onchange="onClick(this);"> 클릭하여 비밀번호 보기
                </label>
              </div>
              <button type="submit" class="btn btn-default">로그인</button>
              <?php
              if($username != '') {
                  echo '<a href="logout.php" class="btn btn-default">로그아웃</button>';
              }
              ?>
            </form>
        </div>
        <script>
          function onClick(cb) {
            console.log(cb.checked);
            $('#exampleInputPassword1').get(0).type = cb.checked ? "text" : "password";
          }
        </script>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
