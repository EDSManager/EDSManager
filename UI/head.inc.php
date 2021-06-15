
<?php if (isset ($_SESSION["userid"])): ?>

<div id="headerInner">
    <div class="logo">
        <a href="../">EDS Manager</a>
    </div>

    <div class = "sprava">
    Добро пожаловать.
    </div>
</div>

<?php else: header("Location: /"); ?>
<?php endif; ?>