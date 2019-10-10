## docker-yii2-samp

1. Для запуска необходимо склонировать проект
2. В папке с проектом запустить: ```docker-compose up -d```
3. Запустите миграции: ```docker exec -it yii2fpm_php_1 bash -c 'yii migrate'```
4. Проект откроется по адресу: ```http://localhost:8100```
5. Добавьте в свой планировщик задач обновление погоды:```docker exec -it yii2fpm_php_1 bash -c 'yii update-weather/load'```

Логин/пароль по умолчанию admin/admin
* Для просмотра/редактирования списка городов ```/admin```
* Для просмотра end-point'ов ```/site/test```
