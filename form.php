<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "Բոլոր դաշտերը պետք է լրացված լինեն.";
        http_response_code(400);
        exit;
    }

    $subject = "Новое сообщение с сайта";
    $body = "Имя: $name\n";
    $body .= "Email: $email\n";
    $body .= "Сообщение:\n$message\n";

    $to = "marmine2017@gmail.com"; // замените на ваш реальный адрес электронной почты

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
