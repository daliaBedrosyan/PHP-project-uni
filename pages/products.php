<?php
    $products = [];
    $search = '';
    $where_search = '';
    $params = [];

    $query = "
        SELECT *
        FROM products
        $where_search
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);

    while ($row = $stmt->fetch()) {
        $fav_query = "SELECT id FROM `favorite_products_users` WHERE user_id = :user_id AND product_id = :product_id";
        $fav_stmt = $pdo->prepare($fav_query);
        $fav_stmt->execute([
            ':user_id' => $_SESSION['user_id'] ?? 0,
            ':product_id' => $row['id']
        ]);
        $fav_product = $fav_stmt->fetch();
        $row['is_favorite'] = $fav_product ? 1 : 0;
        $products[] = $row;
    }
?>
<div class="row">
</div>
<div class="d-flex flex-wrap justify-content-evenly">
    <?php
        foreach ($products as $product) {
            $fav_button = '';
            
            if (isset($_SESSION['user_name'])) {
                if ($product['is_favorite'] == '1') {
                    $fav_button = '
                        <div class="card-footer d-flex justify-content-center">
                            <button class="btn btn-sm btn-danger remove-favorite" data-product="' . htmlspecialchars($product['id']) . '">Премахни от любими</button>
                        </div>
                    ';
                } else {
                    $fav_button = '
                        <div class="card-footer d-flex justify-content-center">
                            <button class="btn btn-sm btn-primary add-favorite" data-product="' . htmlspecialchars($product['id']) . '">Добави в любими</button>
                        </div>
                    ';
                }   
            }
            echo '
                <div class="card border-4 border shadow-lg mb-4 bg-white rounded-5" style="width: 18rem;">
                    <div class="d-flex flex-row justify-content-center my-3">
                        <a class="btn btn-sm btn-danger me-2" href="?page=edit_product&product_id=' . $product['id'] . '">Редактирай</a>
                        
                        <form method="POST" action="./handlers/handle_delete.php" style="display:inline-block;">
                            <input type="hidden" name="product_id" value="' . $product['id'] . '">
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Сигурни ли сте, че искате да изтриете този продукт?\')">
                                Изтрий
                            </button>
                        </form>
                    </div>
                    <img src="uploads/' . htmlspecialchars($product['image']) . '" class="card-img-top border-3 rounded-0 border shadow-lg" alt="Product Image">
                    <div class="card-body">
                        <hr>
                        <h5 class="card-title text-black text-center">' . htmlspecialchars($product['title']) . '</h5>
                        <hr>
                        <p class="card-text text-black text-center">'. htmlspecialchars($product['price']) . '$' . '</p>
                    </div>
                    ' . $fav_button . '
                </div>
            ';
        }
    ?>
</div>
