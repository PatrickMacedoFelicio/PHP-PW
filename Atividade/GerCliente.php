<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Novo Cliente</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="mt-3 container" style=" margin: 0 auto;">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_GET, 'id')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'id');
            $clienteEdit = $cliente->buscar('idCliente', $id);
        }
        if (filter_has_var(INPUT_GET, 'idDel')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'idDel');
            $cliente->deletar('idCliente', $id);
        ?>
            <script>
                window.location.href = 'clientes.php';
            </script>
        <?php
        }
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_POST, 'txtId');
            $cliente->setIdCliente($id);
            $cliente->setNomeCliente(filter_input(INPUT_POST, 'txtNome'));
            $cliente->setEnderecoCliente(filter_input(INPUT_POST, 'txtEndereco'));
            $cliente->setBairroCliente(filter_input(INPUT_POST, 'txtBairro'));
            $cliente->setCidadeCliente(filter_input(INPUT_POST, 'txtCidade'));
            $cliente->setEstadoCliente(filter_input(INPUT_POST, 'sltEstado'));
            $cliente->setTelefoneCliente(filter_input(INPUT_POST, 'txtTelefone'));
            $cliente->setNascimentoCliente(filter_input(INPUT_POST, 'txtNascimento'));


            if (empty($id)) {
                $cliente->inserir();
            } else {
                $cliente->atualizar('idCliente', $id);
            }
        ?>
            <script>
                window.location.href = 'clientes.php';
            </script>
        <?php
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="txtId" value="<?php echo isset($clienteEdit->idCliente) ? $clienteEdit->idCliente : null ?>">
            <div class="row">
                <div class="form-group">
                    <label for="txtServico">Nome</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Nome" value="<?php echo isset($clienteEdit->nomeCliente) ?$clienteEdit->nomeCliente : null ?>">

                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="txtEndereco">Endereço</label>
                    <input name="txtEndereco" id="txtEndereco" class="form-control" value="<?php echo isset($clienteEdit->enderecoCliente) ? $clienteEdit->enderecoCliente : null ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-5">
                    <label for="txtBairro">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro" value="<?php echo isset($clienteEdit->bairroCliente) ? $clienteEdit->bairroCliente : null ?>">

                </div>
                <div class="form-group mb-3 col-5">
                    <label for="txtCidade">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade" value="<?php echo isset($clienteEdit->cidadeCliente) ? $clienteEdit->cidadeCliente : null ?>">

                </div>
                <div class="form-group mb-3 col-2">
                    <label for="sltEstado">Estado</label>
                    <select id="sltEstado" name="sltEstado" class="form-select" aria-label="Default select example">
                    <option selected>Selecione um estado</option>
                        <option value="AC" <?php if($clienteEdit->estadoCliente=='AC') echo 'selected' ?>>Acre</option>
                        <option value="AL" <?php if($clienteEdit->estadoCliente=='AL') echo 'selected' ?>>Alagoas</option>
                        <option value="AP" <?php if($clienteEdit->estadoCliente=='AP') echo 'selected' ?>>Amapá</option>
                        <option value="AM" <?php if($clienteEdit->estadoCliente=='AM') echo 'selected' ?>>Amazonas</option>
                        <option value="BA" <?php if($clienteEdit->estadoCliente=='BA') echo 'selected' ?>>Bahia</option>
                        <option value="CE" <?php if($clienteEdit->estadoCliente=='CE') echo 'selected' ?>>Ceará</option>
                        <option value="DF" <?php if($clienteEdit->estadoCliente=='DF') echo 'selected' ?>>Distrito Federal</option>
                        <option value="ES" <?php if($clienteEdit->estadoCliente=='ES') echo 'selected' ?>>Espírito Santo</option>
                        <option value="GO" <?php if($clienteEdit->estadoCliente=='GO') echo 'selected' ?>>Goiás</option>
                        <option value="MA" <?php if($clienteEdit->estadoCliente=='MA') echo 'selected' ?>>Maranhão</option>
                        <option value="MT" <?php if($clienteEdit->estadoCliente=='MT') echo 'selected' ?>>Mato Grosso</option>
                        <option value="MS" <?php if($clienteEdit->estadoCliente=='MS') echo 'selected' ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if($clienteEdit->estadoCliente=='MG') echo 'selected' ?>>Minas Gerais</option>
                        <option value="PA" <?php if($clienteEdit->estadoCliente=='PA') echo 'selected' ?>>Pará</option>
                        <option value="PB" <?php if($clienteEdit->estadoCliente=='PB') echo 'selected' ?>>Paraíba</option>
                        <option value="PR" <?php if($clienteEdit->estadoCliente=='PR') echo 'selected' ?>>Paraná</option>
                        <option value="PE" <?php if($clienteEdit->estadoCliente=='PE') echo 'selected' ?>>Pernambuco</option>
                        <option value="PI" <?php if($clienteEdit->estadoCliente=='PI') echo 'selected' ?>>Piauí</option>
                        <option value="RJ" <?php if($clienteEdit->estadoCliente=='RJ') echo 'selected' ?>>Rio de Janeiro</option>
                        <option value="RN" <?php if($clienteEdit->estadoCliente=='RN') echo 'selected' ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if($clienteEdit->estadoCliente=='RS') echo 'selected' ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if($clienteEdit->estadoCliente=='RO') echo 'selected' ?> >Rondônia</option>
                        <option value="RR" <?php if($clienteEdit->estadoCliente=='RR') echo 'selected' ?>>Roraima</option>
                        <option value="SC" <?php if($clienteEdit->estadoCliente=='SC') echo 'selected' ?>>Santa Catarina</option>
                        <option value="SP" <?php if($clienteEdit->estadoCliente=='SP') echo 'selected' ?>>São Paulo</option>
                        <option value="SE" <?php if($clienteEdit->estadoCliente=='SE') echo 'selected' ?>>Sergipe</option>
                        <option value="TO" <?php if($clienteEdit->estadoCliente=='TO') echo 'selected' ?>>Tocantins</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-5">
                    <label for="txtTelefone">Fone</label>
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="Fone" value="<?php echo isset($clienteEdit->telefoneCliente) ? $clienteEdit->telefoneCliente : null ?>">
                </div>
                <div class="form-group mb-3 col-5">
                    <label for="txtNascimento">Fone</label>
                    <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" placeholder="Fone" value="<?php echo isset($clienteEdit->nascimentoCliente) ? $clienteEdit->nascimentoCliente : null ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
        </form>
    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>