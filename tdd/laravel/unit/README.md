# Em phpunit.xml
- Descomentar
```xml
<server name="DB_CONNECTION" value="sqlite"/>
<!-- cria banco sqlite na memória ram -->
<server name="DB_DATABASE" value=":memory:"/>
```

# Em tests
- Feature Pra Testar os recursos
    - ex: ver se api retonar algum tipo de dado
- Unit Pra fazer testes unitários
    - instancia class
- Browser pra testar pessoa navegando no projeto

# Criar test
```sh
php artisan make:test NomeFileTest
# pra unitário
php artisan make:test NomeFileTest --unit
```

# Testar status da porta
```php
$response = $this->get(route('home'));
$response->assertStatus(200);
```
# Fazer test sem começar metodo com testNomeMetodo
```php
/** @test */
public function example()
{
    $response = $this->get(route('home'));

    $response->assertStatus(200);
}
```
# Redirecionamento
```php
public function apenas_usuarios_logados_podem_ver_a_lista_de_clientes()
{
    // se não tiver logado é redirecionado pra /login
    $response = $this->get('/customers')
        ->assertRedirect('/login');
}
```

# Filtrar metodo de teste p executar so ele
```sh
vendor/bin/phpunit --filter apenas_usuarios_logados_podem_ver_a_lista_de_clientes
```

# Checar campos de uma tabela
```php
public function checar_se_colunas_user_esta_correta()
{
    $user = new User();
    $expected = [
        'name',
        'email',
        'passwords',
    ];
    $arrayCompared = array_diff($expected, $user->getFillable());
    $this->assertEquals(0, count($arrayCompared));
}
```

# Testar um browser test
- depende pacote que chama dusk que não vem por padrão 
```sh
composer require --dev laravel/dusk
```
```sh
php artisan dusk:install
```
- Se der bo pra install chrome-drive, ver versão chrome
```sh
php artisan dusk:chrome-driver versão
```

# Criar test dusk
```sh
php artisan dusk:make RegisterUserTest
```

# Executar test dusk
```sh
php artisan dusk
```

# Validação login
```php
public function checkIfLoginFunctionIsWorking()
{
    $this->browse(function(Browser $browser) {
        // rota
        $browser->visit('/login') 
            // (campoInput, valor)
            ->type('email', 'leonardolivelopes2@gmail.com') 
            ->type('password', 'asdfasdf')
            // clica em Login (leva em conta se o css altera texto)
            ->press('LOGIN') 
            // Certificar se o caminho é dashboard
            ->assertPathIs('/dashboard'); 
    });
}
```
