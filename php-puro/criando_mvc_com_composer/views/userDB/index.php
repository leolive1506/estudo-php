<form action="?r=/users" method="POST">
    <label for="user">User: </label>
    <input type="text" name="nome" id="user" /> <br>
    <label for="email">Email: </label>
    <input type="text" name="email" id="email" />
    <button>Send</button>
</form>

<ul>
    <?php foreach ($vars['users'] as $index => $user) : ?>
        <li><?= ($index + 1) . ': ' . $user->getNome() ?></li>
    <?php endforeach ?>
</ul>