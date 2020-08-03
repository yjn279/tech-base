<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Timeline</title>
  </head>
  <body class="bg-light">

    <?php include 'libraries/main.php' ?>
    <?php $plans_inst = new Plans() ?>

      <!-- header -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand h1 m-0" href="timeline.php">Share Trip</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="timeline.php">タイムライン<span class="sr-only">(current)</span></a>
            </li>
            <?php if(empty($_SESSION['user'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Signup</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="mypage.php">マイページ</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="make_plan.php">プラン作成</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">ログアウト</a>
              </li>
              <!-- Calendar -->
              <!-- Lists -->
            <?php endif ?>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="どこに旅行したい？" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0 disabled" type="submit">検索</button>
          </form>
        </div>
      </nav>


    <main class="container-fluid py-3">

      <!-- from backend/delete.php -->
      <?php if(!empty($_GET['from'])): ?>
      <?php if($_GET['from'] == 'delete'): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          プランを削除しました。
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
      <?php endif ?>
    
      <!-- Cards -->
      <div class="card-columns">
        <?php $plans = $plans_inst -> get_all() ?>
        <?php foreach ($plans as $plan): ?>
          <a class="card border-0 text-reset shadow-sm" href="plan.php?id=<?= $plan['plans_id'] ?>">
            <?php if(!empty($plan['image'])): ?>
              <img class="card-img-top" src="backend/image.php?id=<?= $plan['plans_id'] ?>" alt="image">
            <?php endif ?>
            <div class="card-body">
              <h2 class="card-title text-body"><?= $plan['title'] ?>への旅行</h2>
              <p class="card-text text-secondary"><?= $plan['schedule'] ?></p>
            </div>
          </a>
        <?php endforeach ?>
      </div>

      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>