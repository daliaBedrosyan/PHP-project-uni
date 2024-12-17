<?php
?>

<form class="border bg-light border-3 border-light shadow-lg rounded p-4 w-50 mx-auto" method="POST" action="./handlers/handle_add_product.php" enctype="multipart/form-data">
    <h3 class="text-center">Добави продукт</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Заглавие:</label>
        <input type="text" class="form-control" placeholder="Заглавие на продукта" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена:</label>
        <input type="number" step="0.01" class="form-control" placeholder="Цена на продукта" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Изображение:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary col-lg-4 rounded-4 mx-auto">Добави</button>
    </div>
</form>