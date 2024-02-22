<?php
// Подключение к базе данных
$host = 'localhost'; // или IP-адрес сервера MySQL
$dbname = 'admission_db';
$username = 'root'; // или имя пользователя базы данных
$password = ''; // пароль пользователя базы данных

// Создание соединения
$conn = new mysqli($host, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

// Запрос на добавление пользователя
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>