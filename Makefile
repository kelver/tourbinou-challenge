default: env prepare up key-generate npm-install npm-run-build
	@echo "--> Your environment is ready to use! Access http://tourbinou.test and enjoy it!"

.PHONY: lint
lint:
	@echo "--> Running Pint to format code..."
	@./vendor/bin/pint

.PHONY: env
env:
	@echo "--> Copying .env.example to .env file"
	@cp .env.example .env

.PHONY: prepare
prepare:
	@echo "--> Installing composer dependencies..."
	@sh ./bin/prepare.sh

.PHONY: up
up:
	@echo "--> Starting all docker containers..."
	@./vendor/bin/sail up --force-recreate -d
	@./vendor/bin/sail art storage:link

.PHONY: key-generate
key-generate:
	@echo "--> Generating new laravel key..."
	@./vendor/bin/sail art key:generate

.PHONY:	npm-install
npm-install:
	@echo "--> Installing all node dependencies..."
	@./vendor/bin/sail npm install

.PHONY:	npm-run-build
npm-run-build:
	@echo "--> Building frontend assets..."
	@./vendor/bin/sail npm run build

.PHONY:	down
down:
	@echo "--> Stopping all docker containers..."
	@./vendor/bin/sail down

.PHONY:	restart
restart:	down up

.PHONY: check
check:
	@echo "--> Running all pre-commit actions..."
	@./vendor/bin/captainhook --no-interaction --configuration=captainhook.json --bootstrap=vendor/autoload.php hook:pre-commit
