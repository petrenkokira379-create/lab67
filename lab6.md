# ЗВІТ
### з лабораторної роботи №6
**Тема:** HTML-форма “Створити завдання”. Реалізація сторінки додавання, приймання даних через метод POST та перегляд їх через var_dump()  
**Студентка:** Петренко Кіра  
**Група:** КН-25  

---

### 1. Мета роботи
Зрозуміти відмінності між HTTP-методами GET та POST, навчитися передавати дані з клієнтської сторони на сервер за допомогою HTML-форм та отримувати їх у PHP через суперглобальний масив `$_POST`.

---

### 2. Технологічний стек
* **Мова програмування / Сервер:** PHP 8.3 (XAMPP / Apache)
* **Розмітка та Стилі:** HTML5, CSS3
* **Середовище розробки:** Visual Studio Code

---

### 3. Хід виконання роботи

1. **Створення сторінки з формою `create.php`:**
   Створено HTML-форму з методом `POST` та полями `title` (text), `description` (textarea) та `priority` (select):

```html
<form action="create.php" method="POST">
    <div class="form-group">
        <label for="title">Назва завдання:</label>
        <input type="text" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="description">Опис завдання:</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="priority">Пріоритет:</label>
        <select id="priority" name="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>

    <button type="submit">Зберегти</button>
</form>
Перехоплення POST-запиту в PHP:
Угорі сторінки додано перевірку методу запиту та демонстраційний вивід за допомогою var_dump($_POST):

PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}