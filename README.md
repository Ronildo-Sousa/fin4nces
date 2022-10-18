# Fin4nces 💸

Uma aplicação de controle financeiro que permite ao usuário acompanhar suas finanças, cadastrando as entradas e saídas ocorridas durante o mês.

![readme](public/readme.gif)

## Rodando o projeto 🕹️

```bash
    # Faça o clone do repositório
    git clone https://github.com/Ronildo-Sousa/fin4nces.git
```
```bash
   #Instale as dependências do projeto utilizando o Docker
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
```bash
    # Inicialize o container Sail
    ./vendor/bin/sail up -d
```
