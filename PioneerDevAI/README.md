# PIONEER DEV AI - Technical Exam

## Requirements

Docker https://www.docker.com/

## Setup project

Clone project and build up container
```
git clone https://github.com/debuggingeveryday/PioneerDevAI_technical-exam
cd PioneerDevAI_technical-exam
docker-compose up -d
```

Enter container and build vite, composer
```
docker-compose exec php bash
npm install
composer install
```

To update changes
```
npm run build // or
npm run watch
```

## Web page location

[Main Page](http:/localhost)

## My reference for this project

[Docker build](https://github.com/refactorian/laravel-docker/tree/laravel_10x) <br/>
[Laravel Open Router](https://github.com/moe-mizrak/laravel-openrouter)
