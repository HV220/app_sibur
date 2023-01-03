build:
	@docker-compose -f ./docker/docker-compose.yml build

start:
	@docker-compose -f ./docker/docker-compose.yml up -d

stop:
	@docker-compose -f ./docker/docker-compose.yml stop

init:
	@docker exec -it php-fpm php yii migrate/up --interactive 0 --migrationPath=@yii/rbac/migrations
	@docker exec -it php-fpm php yii migrate/up --interactive 0
