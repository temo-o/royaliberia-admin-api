# Royal Iberia Admin API

This repository contains the admin API for the Royal Iberia project, it's primarily dedicated for [royaliberia-admin](https://github.com/temo-o/royaliberia-admin) microservice


## Installation
1. Clone the repository:
```sh
git clone https://github.com/temo-o/royaliberia-admin-api.git
```

2. Build containers
```sh
docker-compose up --build
```
3. Open container
```sh
docker exec -it royaliberia-admin-api-php-fpm-1 bash
```
4. Install dependencies
```sh
composer install 
```

5. Project requires [royaliberia-queue](https://github.com/temo-o/royaliberia-queue) - need standalone RabbitMQ container, when something is updated in current microservice, it should not be visible right away to clients unless `published`. Publishing will create a message that will be read by [`royaliberia-api`](https://github.com/temo-o/royaliberia-api)
`Pull the queue repository and run it.`

6. Run consumer
```sh
php bin/console messenger:consume rabbitmq -vv
```

> **_NOTE:_**  bridge ntwork - `rabbitmq-net` has to be created manually for now.