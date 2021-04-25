<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastra-se</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="registration-form">
        <form action="create_login.php" method="POST" enctype="multipart/form-data">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="nome" id="nome" placeholder="Digite seu nome">
            </div>
			<div class="form-group">
                <input type="text" class="form-control item" name="usuario" id="usuario" placeholder="Digite seu username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="form-group">
				<input type="file" class="form-control card-input" name="avatar" id="avatar" placeholder="Selecione um arquivo" accept='image/*'>
            </div>
            <div class="form-group">
                <button type="submit" name="btn-criar-usuario" class="btn btn-block create-account">Criar Usuário</button>
            </div> 
			<div class="form-group">
				<a class="btn btn-block" href="index.php" role="button">Voltar</a>
			</div> 

        </form>
        
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>