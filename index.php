<?php require_once __DIR__ . '/templates/header.php'; ?>

        <div class="container">

            <?php require_once __DIR__ . '/templates/section_phone.php'; ?>
            <?php require_once __DIR__ . '/templates/section_advantages.php'; ?>

        </div>

        <div id="cookiePopup" class="cookie-popup">
            <div class="cookie-content">
                <p>На этой странице используются кукисы.</p>
                <button id="acceptCookies" class="btn btn-success">Принять</button>
                <button id="closePopup" class="btn btn-secondary">Закрыть</button>
            </div>
        </div>
        
<?php require_once __DIR__ . '/templates/footer.php'; ?>