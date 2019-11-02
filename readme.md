## Sobre este projeto

Este projeto é um simples e-commerce feito com o framework Laravel na versão 5.8 usando somente o blade para o frontend e MySQL como ferramenta de banco de dados. Nele há um painel administrativo para cadastro de usuários, produtos e categorias.

## Pré requisitos necessários para executar este projeto

- [PHP 7 (>= 7.2.0)](https://www.php.net/).
- [MySQL](https://laravel.com/docs/container).
- [Composer](https://getcomposer.org/)
- [Node e NPM](https://nodejs.org/pt-br/)

- OBS: Para que o projeto funcione sem problemas com o Laravel, é necessário instalar as seguintes extensões do PHP:

- **BCMath**
- **Ctype**
- **JSON**
- **Mbstring**
- **OpenSSL**
- **PDO**
- **Tokenizer**
- **XML**

## Pré configuração do banco de dados

Antes de iniciar é preciso criar um banco de dados para a aplicação. Isto pode ser feito de diversas formas e com diversos gerenciadores. Neste projeto usei o mysql-workbench, mas podem ser usados vários outros. Abaixo uma lista dos principais gerenciadores:

- [MySQL Workbench] (https://www.mysql.com/products/workbench/)
- [DBeaver] (https://dbeaver.io/)
- [phpMyAdmin] (https://www.phpmyadmin.net/)
- [Valentina Studio] (https://www.valentina-db.com/en/valentina-studio-overview)

Com seu gerenciador preferido, crie um banco de dados com o nome que desejar.

## Baixando e configurando o projeto

Faça o clone deste projeto para seu computador executando o comando:

```
git clone https://github.com/rafaelfgomes/ecommerce-zaptrade.git 
```

Após fazer o clone deste projeto, entre na pasta raiz do projeto e execute os seguintes comandos para preparar o ambiente:

```bash
php artisan cp .env.example .env
php artisan key:generate
```

Agora execute estes comandos para instalar as dependências do composer e do node:

```bash
composer install
npm install
```

É preciso que seja setado no arquivo ".env" as credenciais do banco que será utilizado na aplicação:

```
DB_CONNECTION=<driver do banco (mysql, sqlserver, etc)>
DB_HOST=<endereço do banco (remoto ou local)>
DB_PORT=<porta do banco de dados (o padrão é 3306)>
DB_DATABASE=<nome do banco de dados (explicado na seção anterior)>
DB_USERNAME=<usuário do banco>
DB_PASSWORD=<senha do usuário do banco>
```

## Criando e populando previamente as tabelas

É preciso criar as tabelas no banco fazer o cadastro inicial de algumas categorias e perfis. Isso é feito na pasta raiz do projeto através do comando:

```
php artisan migrate --seed
```

## Executando o projeto

O projeto pode ser executado digitando o seguinte comando na pasta raiz

```
php artisan serve
```

Este comando iniciará o servidor web do php no endereço local na porta 8000 por padrão. Caso queira uma porta diferente da padrão use o parâmetro --port:

```
php artsan serve --port=9000
```

Agora é só acessar o navegador no endereço: "127.0.0.1:8000". Ou caso tenha setado uma porta diferente: "127.0.0.1:9000".

## Ecommerce e Dashboard

A princípio o ecommerce estará vazio, sem nenhum produto cadastrado. Para que seja cadastrado os produtos, categorias e usuários, é necessário que se acesse o dashboard no seguinte endpoint: '/auth/dashboard'. Exemplo:

- http://127.0.0.1:8000/auth/dashboard

Há um gerente teste e um usuário teste cadastrados. Eles podem logar com as credenciais: (usuário: gerente@zaptrade.com.br / senha: 123456) ou (usuário: vendedor@zaptrade.com.br / senha: 123456).

## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).
