# Cadastro de vagas de emprego

# PDO por padrão quadno tem um erro ele lança um warning
- Ideal é parar o sistema
```php
// Mudando pra error mode e tipo exception
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```
