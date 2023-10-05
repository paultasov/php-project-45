# Install Composer dependencies
install:
	composer install

# Validate composer.json
validate:
	composer validate

# Linter validation: Code Sniffer
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

# Start Brain-Games
brain-games:
	./bin/brain-games

# Start Brain-Even Game
brain-even:
	./bin/brain-even

# Start Brain-Calc Game
brain-calc:
	./bin/brain-calc

# Start Brain-Gcd Game
brain-gcd:
	./bin/brain-gcd

# Start Brain-Progression Game
brain-progression:
	./bin/brain-progression