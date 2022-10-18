# Fin4nces 💸

Uma aplicação de controle financeiro que permite ao usuário acompanhar suas finanças, cadastrando as entradas e saídas ocorridas durante o mês.

![readme](public/readme.gif)

## Rodando o projeto 🕹️

```bash
    # Faça o clone do repositório
    git clone https://github.com/Ronildo-Sousa/fin4nces.git
```
```bash
   # Instale as dependências do projeto utilizando o Docker
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
```
```bash
    # Crie o arquivo .env
    cp .env.example .env 
```
```php
    # Crie uma aplicação OAuth do Google e Github e preencha os dados no .env
    GITHUB_CLIENT_ID="seu client id"
    GITHUB_CLIENT_SECRET="sua chave"
    GITHUB_CLIENT_URI="sua URI"

    GOOGLE_CLIENT_ID="seu client id"
    GOOGLE_CLIENT_SECRET="sua chave"
    GOOGLE_CLIENT_URI="sua URI"
```
```bash
    # Inicialize o container Sail
    ./vendor/bin/sail up -d

    # Rode as migrations e Seeders
    ./vendor/bin/sail artisan migrate --seed

    # Crie uma chave da aplicação
    ./vendor/bin/sail artisan key:generate

    # Acesse a aplicação
    http://localhost
```
## Tecnologias utilizadas 🛠️

**Laravel**

**Livewire**

**TailwindCSS**
