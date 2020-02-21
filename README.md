# lab-pardini

## Passos para o teste

1º Digite o comando composer install na raiz do projeto

2º Crie um arquivo .env

3º Copie todas as configurações do arquivo .env-example para o arquivo .env

4° Digite php artisan key:generate para criar a chave

5º Informe as credenciais do banco de dados

6º Digite php artisan migrate para criar as tabelas no banco de dados

7º Digite php artisan serve para startar a aplicação web, caso queira rodar em uma porta específica digite o comando php artisan serve --port=SUA_PORTA

8° Start a API, digite php artisan serve --port=SUA_PORTA, obs: a porta específicada deverá ser a mesma da config API_URL no arquivo .env

9º Abra o navegador e digite o endereço que foi startado no passo 7º  
