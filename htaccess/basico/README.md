# Documentação oficial do Apache
- [Flags](https://httpd.apache.org/docs/2.4/rewrite/flags.html) 
- [Variáveis e operadores](https://httpd.apache.org/docs/current/expr.html)

# HTACCESS
- hyper text access
- config servidores apache
- reescrita url (REWRITE)
- configurar diretivas php
- permitir / bloquear acesso a urls, arquivos, diretorios
- config pag de erro

# Criar um arquivo .htaccess
- ligar reescrita de url
```
RewriteEngine on
```

- Definir uma regra de reescrita de url
```
RewriteRule origem destino
```
- ex:
- Qualquer lugar que tiver api ele troca por index.php, começo, final, meio
```
RewriteRule api ./index.php
```

- Definir se vai ser no começo
```
RewriteRule ^api ./index.php
```

- Definir se vai ser no final
```
RewriteRule api$ ./index.php
```

- Definir uma palavra especifica que a url tem que ter
```
RewriteRule ^api$ ./index.php
```

- Definir um caracter como opcional
    - Definindo '/' como opcional
```
RewriteRule ^painel/?$
```

# Flags
- Pode passar flags no final do rules
- no case[NC], não verifica se é maiusculo ou minusculo
```htaccess

RewriteRule ^api$ ./index.php [NC]
```

- R, fazer um redirecionamento
```htaccess
RewriteRule passadoNaRota RotaDeRedirecionamento [R=Permanente(301) / Temporario(302)]

RewriteRule google https://www.google.com [NC,R=302]
```

- QSA, query string append
    - Pega query params passado
    - Req
        http://htaccess.test/PAINEL/primeiro/segundo/?SDF=123
        - chaveGet = primeiro
        - segundaChaveGet = segundo
        - SDF = 123
    ```
    RewriteRule ^painel/([a-z0-9]+)/([a-z0-9]+)/?$ ./admin.php?chaveGet=$1&segundaChaveGet=$2 [NC,QSA]
    ```

# Criar grupos dentro da url 
- Se tiver so painel ele redireciona p index, se tiver letra (a-z) ou numero (0-9), mais de um caracter (+) vai p admin
```
RewriteRule ^painel/?$ ./index.php [NC]
RewriteRule ^painel/([a-z0-9]+)/?$ ./admin.php [NC]
```

- Passar query params 
    - $1 -> indicando que é o grupo um  (([a-z0-9]+)) da rota
```
RewriteRule ^painel/([a-z0-9]+)/?$ ./admin.php?chaveGet=$1 [NC]
RewriteRule ^painel/([a-z0-9]+)/([a-z0-9]+)/?$ ./admin.php?chaveGet=$1&segundaChaveGet=$2 [NC]
```

# Redirecionamento se não existir arquivo
- Pega qualquer e redireciona p router.php
    - Da erro, pq router.php é alguma coisa tbm
    - Entra em loop pq tenta redirecionar router.php p ele mesmo 
```
RewriteRule ^(.*)$ ./router.php
```

- P resolver criar uma condição (RewriteCond)
```
RewriteCond %{VARIAVEL} OPERADOR
```

- Vendo se arquivo existe
    - -f tenta ver se é um arquivo
    - Se não existir, faz a reecrista pra router.php, se existir, inclui o arquivo
```
// RewriteCond %{REQUEST_URI} OPERADOR
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ ./router.php
```

- Verificando se é um diretório tbm
    - Vendo se não é um arquivo nem um diretório
```
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ ./router.php
```

# Bloqueio indexização por segurança quando digitado uma pasta válida
```
Options -Indexes
```