<?php
require_once 'db_config.php';
require_once 'function.php';
require_once 'recipe.php';

if (empty($_GET['id'])) throw new Exception('Error');
$id = (int) $_GET['id'];

$recipeApp = new Recipe();
$recipeApp->delete($id);

echo "ID: " . h($id) . "の削除が完了しました。<br>";
echo "<a href='index.php'>トップページへ戻る</a>";

?>
