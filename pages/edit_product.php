<?php
    $product_id = $_GET['product_id'] ?? 0;
    if ($product_id <= 0) {
        header('Location: ./index.php?page=products');
        exit;
    } else {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $product_id]);

        $product = $stmt->fetch();
    }
?>

<form class="border rounded p-4 w-50 mx-auto border bg-light border-3 border-light shadow-lg" method="POST" action="./handlers/handle_edit_product.php" enctype="multipart/form-data">
    <h3 class="text-center fw-bold">Редактирай продукт</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Заглавие:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['title'] ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price'] ?>">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Изображение:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="mb-3">
        <img class="img-fluid" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>">
    </div>
    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mx-auto col-lg-4 rounded-4">Редактирай</button>
    </div>
</form>