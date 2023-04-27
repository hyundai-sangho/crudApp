<?php

require_once 'Database.php';


if (isset($_POST['submit'])) {
  $db = new Database();

  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  $db->insertData($name, $email, $gender);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      PHP Complete CRUD Application
    </nav>

    <div class="container">
      <div class="text-center mb-4">
        <h3>새 사용자 추가</h3>
        <p class="text-muted">새 사용자를 추가하려면 아래 양식을 작성하십시오.</p>
      </div>

      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width: 50vw; min-width: 300px;">
          <div class="mb-3">
            <div class="col">
              <label class="form-label">이름:</label>
              <input type="text" class="form-control" name="name" placeholder="홍길동">
            </div>
          </div>

          <div class="mb-3">
            <div class="col">
              <label class="form-label">이메일:</label>
              <input type="email" class="form-control" name="email" placeholder="example@naver.com">
            </div>
          </div>

          <div class="form-group mb-3">
            <label>성별:</label> &nbsp;
            <input type="radio" class="form-check-input" name="gender" id="male" value="남자">
            <label for="male" class="form-input-label">남자</label>

            <input type="radio" class="form-check-input" name="gender" id="female" value="여자">
            <label for="female" class="form-input-label">여자</label>
          </div>

          <div>
            <button type="submit" class="btn btn-success" name="submit">저장</button>
            <a href="index.php" class="btn btn-danger">취소</a>
          </div>
        </form>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
