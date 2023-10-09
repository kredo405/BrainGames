# Makefile
install: #Установка зависимостей
	composer install
brain-games:
	./bin/brainGames
validate:
	composer validate
