<?php
require_once 'db_config.php';

class Recipe {
  private $db;

  public function __construct() {
    try {
      $this->db = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "エラー発生: " . h($e->getMessage()) . "<br>";
      die();
    }
  }

  public function getAll() {
    $stmt = $this->db->query("SELECT * FROM recipes");
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function add($recipe_name, $category, $difficulty, $budget, $howto) {
    $sql = "INSERT INTO recipes (recipe_name, category, difficulty, budget, howto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $category, PDO::PARAM_INT);
    $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(4, $budget, PDO::PARAM_INT);
    $stmt->bindValue(5, $howto, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function delete($id) {
    $sql = "DELETE FROM recipes WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function detail($id) {
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function edit($id) {
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function update($recipe_name, $category, $difficulty, $budget, $howto, $id) {
    $sql = "UPDATE recipes SET recipe_name = ?, category = ?, difficulty = ?, budget = ?, howto = ? WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $category, PDO::PARAM_INT);
    $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(4, $budget, PDO::PARAM_INT);
    $stmt->bindValue(5, $howto, PDO::PARAM_STR);
    $stmt->bindValue(6, $id, PDO::PARAM_INT);
    $stmt->execute();
  }

}

?>
