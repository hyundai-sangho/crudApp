<?php

require_once 'Database.php';

$db = new Database();
$data = $db->getData();

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];

  $alert =
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
    . $msg .
    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
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

      <?= $alert ?? '' ?>

      <a href="add_new.php" class="btn btn-dark mb-3">신규 사용자 추가</a>

      <table class="table table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">순번</th>
            <th scope="col">이름</th>
            <th scope="col">이메일</th>
            <th scope="col">성별</th>
            <th scope="col">작업</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row): ?>
            <tr>
              <td scope="row">
                <?= $row['id'] ?>
              </td>
              <td scope="row">
                <?= $row['name'] ?>
              </td>
              <td scope="row">
                <?= $row['email'] ?>
              </td>
              <td scope="row">
                <?= $row['gender'] ?>
              </td>
              <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
