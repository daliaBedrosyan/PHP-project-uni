<?php
require_once('../db.php');

$product_id = intval($_POST['product_id'] ?? 0);

if ($product_id <= 0) {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = 'Възникна грешка при изтриването на продукта.';
} else {
    $query = "DELETE FROM products WHERE id = :product_id"; 
    $stmt = $pdo->prepare($query);
    $params = [
        ':product_id' => $product_id,
    ];

    if (!$stmt->execute($params)) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = 'Възникна грешка при изтриването на продукта.';
    } else {
        $_SESSION['flash']['message']['type'] = 'success';
        $_SESSION['flash']['message']['text'] = 'Продуктът е премахнат успешно.';
    }
}

header('Location: ../index.php?page=products');
exit;
