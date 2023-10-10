# Makefile
install: #Установка зависимостей
	composer install
brain-games:
	./bin/brainGames
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin	
correction:
	composer exec phpcbf -- --standard=PSR12 src bin	
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc