<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Timeline</title>
  </head>
  <body class="bg-light">

    <?php include 'assets/header.php' ?>
    <?php $plans_inst = new Plans() ?>

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
          <a class="card border-0 text-reset shadow-sm" href="plan.php?id=<?= $plan['plan_id'] ?>">
            <?php if(!empty($plan['image'])): ?>
              <img class="card-img-top" src="backend/image.php?id=<?= $plan['plan_id'] ?>" alt="image">
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