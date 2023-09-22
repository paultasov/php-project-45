# Install Composer dependencies
install:
	composer install

# Start Brain-games
brain-games:
	./bin/brain-games

# Validate composer.json
validate:
	composer validate

# Linter validation // Code Sniffer
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin