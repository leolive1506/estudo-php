# Install
```sh
composer require phpunit/phpunit --dev
```
- No composer .json
```json
"autoload": {
    "psr-4": {
        "CodeExpress\\": "src/"
    }
}
```
- Criar um phpunit.xml.dist
```html
<?xml version="1.0" encoding="UTF-8"?>

<phpunit
    backupGlobals="false"
    backupStaticAttributes="false"
    bootstrap="./vendor/autoload.php"
    cacheTokens="true"
    colors="true"
    convertErrorsToExceptions="true" convertNoticesToExceptions="true" convertWarningsToexceptions="true"
    processIsolation="false"
    stopOnFailure="false"
    verbose="false">

    <testsuites>
        <testsuite name="GetStarted Tests">
            <directory>./tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

- Informar arquivo de bootstrap -> configs de inicialização
bootstrap="./vendor/autload.php"

- Compost codigos do framework auxiliam codigos de teste e binário que executa a suite
    - Por padrão salvo dentro de vender/bin
    
- Executar testes
```sh
vendor/bin/phpunit
# aparecer mais bonitinho
vendor/bin/phpunit --testdox
``` 

# Class de teste tem quw ter sufixo text
- SomaTest.php

# metodos pra testar tem que ter um prefixo teste
```php
public function testSomaDoisNumeros() {}
```

# saber se a soma é o esperado
- tem uma session pra isso que vem no TestCase ($this->assertEquals)
```php
$soma = new Soma();
$soma->setNum1(10);
$soma->setNum2(20);
$this->assertEquals(30, $soma->somar());
```

# TDD
- Test Drive Development

# Função assertPreConditions
- se passar oq tem dentro, os outros tester são executados

Ex:
```php
class SubtracaoTest extends TestCase
{
    public function assertPreConditions(): void
    {
        $this->assertTrue(class_exists('CodeExpress\Aritmetico\Subtracao'));
    }
}
```

# 3 passos
- Red
    - Falhas
    
- Green
    - Implementar o min para class passar
    ex: Retornar o valor desejado na função direto 

- Refactor
    - Possibilidade de receber valores pelos set e retornar valor correto

# Lançar uma exception
```php
if(!$num1) {
    throw new \InvalidArgumentException("Parametro nao informado");
}
```

# Se Saber se a unidade irá gerar uma exceptions    

- O método expectedException() deve ser declarado antes do teste executar a unidade.

```php
$this->expectException(\InvalidArgumentException::class);
```

# Assegurar de que o valor de retorno não é null
```php
$this->expectNotNull($clientDao->findClientByID(552));
```

## Novos
# Validar se contém algo dentro de array de valores
```php
public function testAzeitona()
{
    $this->assertContains('foo', ['foo'], '', true);
}
```

# Validar se contém somente um tipo
```php
public function testFailure()
{
    $this->assertContainsOnly('int', [1, 2]); //true
    $this->assertContainsOnly('string', ['1', '2']); // true
    $this->assertContainsOnly('string', ['1', '2', 3]); // false
}
```

# Validar length do array
```php
public function testCount()
{
    $this->assertCount(2, ['foo', 'asdfasdf']);
}
```