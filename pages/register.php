<?php

?>
<div class="d-flex justify-content-center border bg-light border-3 border-light shadow-lg rounded p-4 w-50 mx-auto">
    <form class="col-lg-12" method="POST" action="./handlers/handle_register.php">
        <h3 class="text-center fw-bold">Регистрация</h3>
        <div class="mb-3">
            <label for="names" class="form-label">Имена</label>
            <input type="names" class="form-control" id="names" name="names"
                value="<?php echo $flash['data']['names'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Имейл</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php echo $flash['data']['email'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Парола</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="repeat_password" class="form-label">Повтори парола</label>
            <input type="password" class="form-control" id="repeat_password" name="repeat_password">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mx-auto col-lg-4">Регистрирай се</button>
        </div>
    </form>
</div>