<!DOCTYPE html>
<html lang="en">
<head>
    <?php include TEMPLATES_DIR.'/head.php' ?>
    <link rel="stylesheet" href=<?= TEMPLATES_URL.'/header/header.css'; ?>>
    <link rel="stylesheet" href=<?= TEMPLATES_URL.'/footer/footer.css'; ?>>
    <link rel="stylesheet" href=<?= PAGES_URL.'/user/login.css'; ?>>
    <title>Usuário | MVC CIMOL</title>
</head>
<body>
    <?php include TEMPLATES_DIR.'/header/header.php' ?>

    <main>
        <form class="form" action="<?= HOME_URL; ?>/usuario/auth" method="POST">
            <div class="form__description">
                <h2>Bem-vindo</h2>
                <i class="fas fa-lock fa-lg form__description-icon"></i>
            </div>
            
            <div class="form__group">
                <label class="form__label" for="InputEmail">E-mail</label>
                <input type="email" name="email" class="form__input" id="inputEmail" aria-describedby="emailHelp" placeholder="usuario@cimol.com">
            </div>
            <div class="form__group">
                <label class="form__label" for="inputPassword">Senha</label>
                <input type="password" name="password" class="form__input" id="inputPassword1" placeholder="sua senha" >
            </div>
            <div class="form__group">
                <small class="form-text text-muted">Nunca compartilharemos sus informações. Lorem, ipsum dolor sit amet consectetur adipisicing elit.</small>
            </div>

            <button type="submit" class="form__submit">Autenticar</button>
        </form>
        <aside class="aside"></aside>
    </main>

    <?php include TEMPLATES_DIR.'/footer/footer.php' ?>
</body>
</html>