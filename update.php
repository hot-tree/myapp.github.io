<?php
require_once 'db_config.php';
require_once 'function.php';
require_once 'recipe.php';

$recipe_name = $_POST['recipe_name'];
$howto = $_POST['howto'];
$category = (int) $_POST['category'];
$difficulty = (int) $_POST['difficulty'];
$budget = (int) $_POST['budget'];

if (empty($_GET['id'])) throw new Exception('Error');
$id = (int) $_GET['id'];

$recipeApp = new Recipe();
$recipeApp->update($recipe_name, $category, $difficulty, $budget, $howto, $id);

echo "ID:" . h($id) . "レシピの更新が完了しました。<br>";
echo "<a href='index.php'>トップページへ戻る</a>";

?>
