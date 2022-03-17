<main class="mt-4">
    <section>
        <a href="index.php">
            <buttom class="btn btn-success">Voltar</buttom>
        </a>
    </section>

    <h2 class="mt-3"><?= !isset($_GET['id']) ? 'Cadastrar' : 'Editar' ?> vaga</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="<?= $vaga->titulo ?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" rows="5" name="descricao"><?= $vaga->descricao ?></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="titulo">Status</label>
            <div class="mt-2">
                <div class="form-check form-check-inline">
                    <label for="ativo" class="form-control d-flex gap-2 align-items-center">
                        <input type="radio" name="ativo" id="ativo" value="s" checked>Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="inativo" class="form-control d-flex gap-2 align-items-center">
                        <input type="radio" name="ativo" id="inativo" value="n" <?= $vaga->ativo == 'n' ? 'checked' : '' ?>>Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group mt-2">
            <button class="px-4 btn btn-success">Enviar</button>
        </div>

    </form>
</main>