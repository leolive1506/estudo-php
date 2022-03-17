# MVC

- MOdel -> camada que se conecta ao banco de dados e realiza operações nele (app/Models)
- View -> Páginas/ mostra os dados para o usuário  (resources)
- Cosntroller -> faz a ligação entre o model e a view (app/Http/Controllers)


# Model
o nome do model deve sempre ser o nome da table no singulas e escrito em maiúsculo
Criar model
    php artisan make:model Post


# HTTP methods
GET - pegar / mostrar informações
POST - criar informações
PUT
DELETE
