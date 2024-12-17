<?php

if (isset($_POST['submit'])) {
    $errors = [];
    foreach ($_POST as $key => $value) {
        if (empty($value) && $key != 'submit') {
            $errors[] = 'Полето ' . $key . ' е задължително';
        }
    }
    if (count($errors) == 0) {
        echo '
            <div class="alert alert-success" role="alert">
                Благодарим ви ' . $_POST['name'] . ', че се свързахте с нас.
                Ще се свържем с вас на ' . $_POST['email'] . ' възможно най-скоро.
            </div>
        ';
    } else {
        echo '
            <div class="alert alert-danger" role="alert">
                Възникнаха следните грешки:
                <ul>';

        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }

        echo '
                </ul>
            </div>
        ';
    }
}
?>
<div class="border bg-light border-3 border-light shadow-lg rounded p-4 w-50 mx-auto">
    <h3 class="text-center">Свържете се с нас</h3>
    <div class="d-flex justify-content-center">
        <form method="POST" class="col-lg-12">
            <div class="mb-3">
                <label for="name" class="form-label">Имена</label>
                <input type="text" class="form-control" id="name" placeholder="Въведете имена" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Имейл</label>
                <input type="email" class="form-control" id="email" placeholder="Въведете имейл" name="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Съобщение</label>
                <textarea class="form-control" id="message" rows="4" name="message"
                    placeholder="Въведете вашето съобщение"></textarea>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary rounded-4 col-lg-4">Изпрати</button>
            </div>
        </form>
    </div>
</div> 