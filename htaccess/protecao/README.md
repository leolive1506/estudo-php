# protegendo arquivos e diretórios
- Bloqueio indexização
```
Options -Indexes
```

- Validar se tentativa acesso a rota bate com o padrão abaixo
    - bloqueiar acesso todo mundo o acesso
    ```
    <FilesMatch "\.env$">
        // oq fazer quando cair nessa condição
        Deny from all 
    </FilesMatch>
    ```
    - diretiva de acesso permitido, sobrescreve a de acesso negado
        - Por padrão é ao contrário
    ```
    <FilesMatch "\.json$">
        Order allow, deny
        // condição de permissão
        Allow from 127.0.0.1
    </FilesMatch>
    ```
    - P bloquear diretórios tem que alterar alguns config no diretório do apache (Não falado no video por ser algo mais interno do apache)
        - Ensinado de maneira masi simples
        - Criar um htaccess dentro da pasta que não pode ser visualizada e colocar Deny form all

- Bloqueio de alguns metódos (Ex: POST, PUT)
    - Bloqueia tentativa de acesso com post e put (pode colocar quantos métodos quiser bloquear)
```
<Limit POST PUT>
Deny from all
</Limit>
```

- Bloquear scripts xss de forma simples
    - Qualquer url que tiver script, bloqueia o acesso com RewriteRule
    - - [F] indica que o acesso é bloqueado a url
```
RewriteEngine on

RewriteCond %{QUERY_STRING} "script"
RewireRule .* - [F]
```

- Proteger com senha
    - Colocar acima de regras de rotas url
    - Criar um arquivo p guardas as senhas chamado .htpasswd
```
AuthType Basic
AuthName "Acesso restrito leo"
// arquivo que vai guardar as senhas
AuthUserFile /home/leo/estudo-php/htaccess/protecao/.htpasswd
Require valid-user
```