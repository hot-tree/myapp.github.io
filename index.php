<?php

require_once 'db_config.php';
require_once 'function.php';
require_once 'recipe.php';

$recipeApp = new Recipe();
$recipes = $recipeApp->getAll();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>レシピの一覧</title>
  </head>
  <body>
    <h1>レシピの一覧</h1>
    <a href="form.html">レシピの新規登録</a>
    <table id="table">
      <tr>
        <th>料理名</th><th>予算</th><th>難易度</th>
      </tr>
      <?php foreach ($recipes as $recipe) : ?>
        <tr>
          <td align="center"><?= h($recipe->recipe_name); ?></td>
          <td align="center"><?= h($recipe->budget); ?></td>
          <td align="center"><?= h($recipe->difficulty); ?></td>
          <td><a href="detail.php?id=<?= h($recipe->id) ?>">詳細</a></td>
          <td><a href="edit.php?id=<?= h($recipe->id) ?>">変更</a></td>
          <td><a href="delete.php?id=<?= h($recipe->id); ?>" class="delete_recipe">削除</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="yasasii.js"></script>
  </body>
</html>
