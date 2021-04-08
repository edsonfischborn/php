<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include TEMPLATES_DIR.'/head.php' ?>
    <link rel="stylesheet" href=<?= TEMPLATES_URL.'/header/header.css'; ?>>
    <link rel="stylesheet" href=<?= TEMPLATES_URL.'/footer/footer.css'; ?>>
    <link rel="stylesheet" href=<?= PAGES_URL.'/home/home.css'; ?>>
    <title>Incio | MVC CIMOL</title>
</head>
<body>
    <?php include TEMPLATES_DIR.'/header/header.php' ?>

    <main>
        <section>
            <h1>Dados pessoais</h1>
            <?php 
                if(isset($_SESSION['user'])){
                    echo "
                        <div>
                            <strong>Nome:</strong>
                            <span>"
                                .$_SESSION['user']['nome'].
                            "</span>
                        </div>
                        <div>
                            <strong>E-mail:</strong>
                            <span>"
                                .$_SESSION['user']['email'].
                            ".</span>
                        </div>
                        <div>
                            <strong>Perfil:</strong>
                            <span>"
                                .$_SESSION['user']['perfil'].
                            "</span>
                        </div> ";
                } else {
                    echo "Faça login";
                }
            ?>
        </section>
    </main>

    <?php include TEMPLATES_DIR.'/footer/footer.php' ?>
        
</body>
</html>