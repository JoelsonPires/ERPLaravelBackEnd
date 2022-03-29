Instalação Back-End
-----------------------
Após clonar o projeto, instale as dependências com o comando:
```composer install

```Apos as dependencias terem sido instaladas configure as variaveis de ambiente que se encontra no arquivo **.env** 
banco de que irá utilizar.

Execute comando 
```composer install

Execute comando abaixo para executar as migrate e criar as tabelas no banco 

```php artisan migrate 

Execute comando abaixo para povoar as tabelas com Seeds

```php artisan db:seed

Realize o start do server  

composer run serve 

Neste momento o servidor esta ativo.