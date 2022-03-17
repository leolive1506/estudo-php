<main class="mt-4">


    <h2 class="mt-3">Excluir vaga</h2>

    <form action="" method="POST">
        <input type="hidden" name="excluir">
        <div class="form-group">
            <p>Você deseja realmente excluir a vaga <strong><?= $vaga->titulo ?></strong></p>
        </div>

        <div class="form-group mt-2">
            <a href="index.php">
                <buttom class="btn btn-success">Cancelar</buttom>
            </a>
            <button class="px-4 btn btn-danger">Excluir </button>
        </div>

    </form>
</main>