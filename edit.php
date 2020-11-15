<?php
require_once 'db_config.php';
require_once 'function.php';
require_once 'recipe.php';

if (empty($_GET['id'])) throw new Exception('Error');
$id = (int) $_GET['id'];

$recipeApp = new Recipe();
$recipe = $recipeApp->edit($id);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>入力フォーム</title>
  </head>
  <body>
    レシピの投稿<br>
    <form action="<?php echo "update.php?id=" . $id ?>" method="post">
      料理名:<input type="text" name="recipe_name" value="<?php echo h($recipe->recipe_name); ?>"><br>
      カテゴリ:
      <select name="category">
        <option value="">選択してください</option>
        <option value="1" <?php if($recipe->category == "1") {echo "selected";} ?>>和食</option>
        <option value="2" <?php if($recipe->category == "2") {echo "selected";} ?>>中華</option>
        <option value="3" <?php if($recipe->category == "3") {echo "selected";} ?>>洋食</option>
      </select>
      <br>
      難易度:
      <input type="radio" name="difficulty" value="1" <?php if($recipe->difficulty == "1") {echo "checked";} ?>>簡単
      <input type="radio" name="difficulty" value="2"; <?php if($recipe->difficulty == "2") {echo "checked";} ?>>普通
      <input type="radio" name="difficulty" value="3" <?php if($recipe->difficulty == "3") {echo "checked";} ?>>難しい
      <br>
      予算:<input type="number" name="budget" value="<?php echo h($recipe->budget); ?>">円
      <br>
      作り方:
      <textarea name="howto" rows="4" cols="40"><?php echo h($recipe->howto); ?></textarea>
      <br>
      <input type="hidden" name="id" value="<?php echo h($recipe->id); ?>">
      <input type="submit" value="送信">
    </form>
    <a href='index.php'>トップページへ戻る</a>
  </body>
</html>
