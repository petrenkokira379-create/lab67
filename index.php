<?php
  function formatTitle($text, $maxLength = 20) {
      if (mb_strlen($text, 'UTF-8') > $maxLength) {
          return mb_substr($text, 0, $maxLength, 'UTF-8') . '...';
      }
      return $text;
  }

  function getCurrentGreeting() {
      $hour = (int)date('H');
      
      if ($hour >= 6 && $hour < 12) {
          return "Доброго ранку";
      } elseif ($hour >= 12 && $hour < 18) {
          return "Добрий день";
      } elseif ($hour >= 18 && $hour <= 23) {
          return "Добрий вечір";
      } else {
          return "Доброї ночі";
      }
  }

  $appName = "Task Manager";

  $tasks = [
      [
          'id' => 1,
          'title' => 'Виконати лабораторну роботу №5 з PHP',
          'priority' => 'High',
          'is_completed' => false
      ],
      [
          'id' => 2,
          'title' => 'Вивчити роботу з багатовимірними масивами',
          'priority' => 'Medium',
          'is_completed' => true
      ],
      [
          'id' => 3,
          'title' => 'Оформити звіт у файлі lab5.md',
          'priority' => 'High',
          'is_completed' => false
      ],
      [
          'id' => 4,
          'title' => 'Зберегти зміни у Git та відправити на GitHub',
          'priority' => 'Low',
          'is_completed' => true
      ]
  ];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appName ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .greeting { color: #1976d2; font-size: 1.2rem; font-weight: bold; margin-bottom: 5px; }
        .btn-add { display: inline-block; background-color: #1976d2; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-bottom: 15px; }
        .btn-add:hover { background-color: #115293; }
        .task-done { color: #2e7d32; text-decoration: line-through; }
        .task-pending { color: #d32f2f; font-weight: bold; }
        .priority { font-size: 0.85em; padding: 2px 6px; border-radius: 4px; background-color: #f0f0f0; margin-left: 5px; }
        .priority-High { color: #c62828; font-weight: bold; }
        .priority-Medium { color: #ef6c00; }
        .priority-Low { color: #1565c0; }
    </style>
</head>
<body>
    <header>
        <div class="greeting"><?= getCurrentGreeting() ?>!</div>
        <h1><?= $appName ?></h1>
        <a href="create.php" class="btn-add">+ Додати нове завдання</a>
    </header>
    <main>
        <h2>Список завдань</h2>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li class="<?= $task['is_completed'] ? 'task-done' : 'task-pending' ?>">
                    <strong>Завдання:</strong> <?= formatTitle($task['title']) ?>
                    <span class="priority priority-<?= $task['priority'] ?>">[Пріоритет: <?= $task['priority'] ?>]</span> — 
                    <?php if ($task['is_completed']): ?>
                        <span>✔️ Виконано</span>
                    <?php else: ?>
                        <span>🕒 В процесі</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>