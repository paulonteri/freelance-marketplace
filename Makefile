start: ## Start the docker containers
	@echo "Starting the docker containers"
	@docker-compose up
	@echo "Containers started - http://localhost:9000"

stop: ## Stop Containers
	@docker-compose down

restart: stop start ## Restart Containers

build: ## Build Containers
	@docker-compose build

create-db-tables: ## Create mysql tables in the db container
	@docker-compose exec -T db mysql -u root --password=freelance freelance < ./freelance/db_schema.sql

create-db-data: ## Create mysql data in the db container
	@docker-compose exec -T db mysql -u root --password=freelance freelance < ./freelance/db_data.sql

sync-db: create-db-tables create-db-data