<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и фильтруем данные из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Валидация данных
    if (empty($name) || empty($email) || empty($message)) {
        echo "Բոլոր դաշտերը պետք է լրացված լինեն.";
        http_response_code(400);
        exit;
    }

    // Формируем тему и тело письма
    $subject = "Новое сообщение с сайта";
    $body = "Имя: $name\n";
    $body .= "Email: $email\n";
    $body .= "Сообщение:\n$message\n";

    // Задаем адрес электронной почты, на который будет отправлено письмо
    $to = "marmine2017@gmail.com; // замените на ваш реальный адрес электронной почты

    // Отправка письма
    if (mail($to, $subject, $body, "From: $email")) {
        echo "Спасибо, ваше сообщение было отправлено.";
    } else {
        echo "Произошла ошибка при отправке сообщения.";
        http_response_code(500);
    }
} else {
    echo "Сбой запроса.";
    http_response_code(405);
}
