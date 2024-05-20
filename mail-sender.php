<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = strip_tags(trim($_POST["fname"]));
	$pizza = $_POST["pizza"];
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $address = strip_tags(trim($_POST["address"]));
    
	

    $to = "mikhailovich_44@mail.ru"; // Заменить
    $subject = "Новый заказ";
    $email_content = "Имя: $fname\n";
    $email_content .= "Электронная почта: $email\n\n";
    $email_content .= "Адрес доставки: $address\n\n";
	$email_content .= "Пицца: $pizza\n\n";
   
    $headers = "From: mikhailovich_44@mail.ru\r\nX-Mailer: PHP/" . phpversion();

	if (mail($to, $subject, $email_content, $headers)) {
        error_log("Заказ успешно отправлен: " . $email_content);
		header("Location: index.html"); // Перенаправление на index.html
		exit();
    } else {
        error_log("Ошибка отправки заказа: " . $email_content);
		header("Location: index.html"); 
        exit();
    }
	
	
}
?>