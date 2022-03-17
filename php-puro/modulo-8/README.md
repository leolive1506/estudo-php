# MVC
- Model
- View
- Controller

- User faz uma req
- MVC verifica se rota existe
- Se tiver, req vai p *controller*, se não 404
    - Ele decide oq vai fazer 
- Controller pode:
    - Carregar uma view
    - Chamar um Model   
        - É uma class relacionada com banco de dados
            - Nome no singular
                - Ex: table: usuarios, nome Model -> Usuario
    
# Instalação
```sh
github.com/suporteb7web/mvc
```

- Rotas
- em routes.php
```php
$router->get('/rota', 'NomeController@metodo_que_vai_ser_acessado');
```