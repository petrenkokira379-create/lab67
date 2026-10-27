<?php
  $errors = [];
  $title = "";
  $description = "";
  $priority = "Low";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = htmlspecialchars(trim($_POST['title'] ?? ''));
      $description = htmlspecialchars(trim($_POST['description'] ?? ''));
      $priority = htmlspecialchars(trim($_POST['priority'] ?? 'Low'));

      if (empty($title)) {
          $errors[] = "Поле Назва є обов'язковим для заповнення!";
      }

      if (empty($description)) {
          $errors[] = "Поле Опис є обов'язковим для заповнення!";
      }
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створити завдання</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea, select { width: 100%; max-width: 500px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 100px; }
        button { background-color: #2e7d32; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #1b5e20; }
        .back-link { display: inline-block; margin-bottom: 15px; color: #1976d2; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .alert-danger { max-width: 500px; background-color: #ffebee; border: 1px solid #f44336; color: #c62828; padding: 12px; border-radius: 4px; margin-bottom: 20px; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <a href="index.php" class="back-link">← Повернутись до списку</a>
    <h1>Створення нового завдання</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="create.php" method="POST">
        <div class="form-group">
            <label for="title">Назва завдання:</label>
            <input type="text" id="title" name="title" value="<?= $title ?>">
        </div>

        <div class="form-group">
            <label for="description">Опис завдання:</label>
            <textarea id="description" name="description"><?= $description ?></textarea>
        </div>

        <div class="form-group">
            <label for="priority">Пріоритет:</label>
            <select id="priority" name="priority">
                <option value="Low" <?= $priority === 'Low' ? 'selected' : '' ?>>Low</option>
                <option value="Medium" <?= $priority === 'Medium' ? 'selected' : '' ?>>Medium</option>
                <option value="High" <?= $priority === 'High' ? 'selected' : '' ?>>High</option>
            </select>
        </div>

        <button type="submit">Зберегти</button>
    </form>
</body>
</html>