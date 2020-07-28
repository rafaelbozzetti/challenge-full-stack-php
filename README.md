GrupoA Educação - Full Stack Web Developer PHP
===================

[![N|Solid](https://www.grupoa.com.br/hs-fs/hubfs/logo-grupoa.png?width=300&name=logo-grupoa.png)](https://www.grupoa.com.br) 


### Requisitos

* PHP 7.4+
* MySQL 5.7+ or MariaDB
* Composer (only for development)


```console
git clone https://github.com/rafaelbozzetti/challenge-full-stack-php.git
cd challenge-full-stack-php
composer install
```

### Configuração Manual

A configuração manual deve ser utilizada para rodar a aplicação na máquina local, deve-se ter atendido os seguinte requisitos:

 * php 7.4
 * Mysql Server

Altere a configuração conforme necessário no arquivo:
``config/settings.php`` nas linhas 54 e 56.

```php
$settings['db'] = [
    'driver' => \Cake\Database\Driver\Mysql::class,
    'host' => 'localhost',
    'username' => 'USUARIO MYSQL',
    'database' => 'DATABASE',
    'password' => 'SENHA MYSQL',
```
Com a database previamente criada, execute as migrations:

```console
vendor/bin/phinx migrate 
```

Inicie a aplicação
```console
php -S localhost:8000 -t public/
```

### Configuração via docker

O projeto pode rodar via docker, não sendo necessário a configuração manual.

As configurações do arquivo ``config/settings.php`` são:

```php
$settings['db'] = [
    'driver' => \Cake\Database\Driver\Mysql::class,
    'host' => 'db',
    'username' => 'grupoa',
    'database' => 'grupoa',
    'password' => 'grupoa',
```

```console
docker-composer build
docker-composer up
```

Aguarde os containers subirem completamente.


### Acesso
 * acesso: http://localhost:8000/
 * usuario: admin@grupoa.com.br
 * senha: admin


### Telas

#### Login
![Search Component](https://raw.githubusercontent.com/rafaelbozzetti/challenge-full-stack-php/master/mockups/login.png)

#### Listagem Alunos
![Search Component](https://raw.githubusercontent.com/rafaelbozzetti/challenge-full-stack-php/master/mockups/listagem.png)

#### Cadastro Alunos
![Search Component](https://raw.githubusercontent.com/rafaelbozzetti/challenge-full-stack-php/master/mockups/cadastro.png)

 