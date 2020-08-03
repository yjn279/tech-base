<!-- include -->
<?php include 'libraries/main.php' ?>

<!-- header -->
<?php $url = $_SERVER['REQUEST_URI'] ?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-info py-1">
  <a class="navbar-brand" href="timeline.php">
    <img src="assets/navbar-brand-info.jpg" width="120" height="40" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= $url == '/timeline.php' ? 'active' : NULL ?>">
        <a class="nav-link" href="timeline.php">タイムライン</a>
      </li>
      <?php if(empty($_SESSION['user'])): ?>
        <li class="nav-item <?= $url == '/login.php' ? 'active' : NULL ?>">
          <a class="nav-link" href="login.php">ログイン</a>
        </li>
        <li class="nav-item <?= $url == '/signup.php' ? 'active' : NULL ?>">
          <a class="nav-link" href="signup.php">新規登録</a>
        </li>
      <?php else: ?>
        <li class="nav-item <?= $url == '/mypage.php' ? 'active' : NULL ?>">
          <a class="nav-link" href="mypage.php">マイページ</a>
        </li>

        <li class="nav-item <?= $url == '/make_plan.php' ? 'active' : NULL ?>">
          <a class="nav-link" href="make_plan.php">プラン作成</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="backend/logout.php">ログアウト</a>
        </li>
        <!-- Calendar -->
        <!-- Lists -->
      <?php endif ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="現在は検索できません" placeholder="どこに旅行したい？" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 disabled" type="submit">検索</button>
    </form>
  </div>
</nav>