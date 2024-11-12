# devs_do_RN

Instruções para instalação e execução da aplicação

## Dependências

É necessário ter intalado o [PHP](https://www.php.net/downloads) e o [Postgres](https://www.postgresql.org/) para executar corretamente a aplicação

## Configuração

Após garantir que as dependências foram instaladas e configurada corretamente, clone esse repositório para o diretório que preferir e acesse o arquivo database.php,
dentro da pasta config.
Lá, altere nas linhas 7 e 8, substituindo seu_usuario e sua_senha, pelos seus usuário e senha do postgres.

## Comandos

Com tudo configurado, execute os seguintes comandos:

No Linux:

```sh
  $ sudo -u postgres psql -f meu_database.sql
```

No Windows:

Certifique-se de que o diretório psql do PostgreSQL está incluído no PATH do sistema ou navegue até a pasta de instalação do PostgreSQL (geralmente algo como C:\Program Files\PostgreSQL\<versão>\bin).

```sh
  $ psql -U postgres -f meu_database.sql
```

Isso criara o banco de dados e as tabelas.

Para executar a aplicação em si, execute o seguinte comando(é o mesmo para Linux e Windows):

```sh
  $ php -S localhost:8000 -t public
```

OBS: Garanta que está na raiz do projeto ao executar esses comandos.

Dessa forma, a aplicação estará rodando na porta 8000, então é só acessar "http://localhost:8000" pelo navegador, e aproveitar a aplicação

## Informações adicionais

As credenciais para login são:

```sh
  Usuário: admin
  Senha: admin
```
