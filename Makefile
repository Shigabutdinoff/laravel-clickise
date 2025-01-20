install:
	@echo "Installing dependencies..."
	composer install --dev

	@echo "Setting up environment file..."
	cp .env.example .env

	@echo "Starting containers..."
	./vendor/bin/sail up -d

	@echo "Generating application key..."
	./vendor/bin/sail artisan key:generate

	@echo "Running migrations..."
	./vendor/bin/sail artisan migrate

	@echo "Setup complete!"
