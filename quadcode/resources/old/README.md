### quadcode.com

**SoftWare Brand Site**

Структура проекта:

1) `./src`
    Исходный код сайта

2) `./webpack`
    Каталог с конфигами для сборщика проекта Webpack

3) `./.eslintrc`
    конфиг линтера Eslint

4) `./.prettierc`
    конфиг форматера кода Prettier

5) `./.babelrc`
    конфиг транспайлера Babel

6) `./.gitignore`
    Конфиг правила для игнора файлов в системе контроля версий Git

7) `./.index.html`
    Шаблон главной

8) `./nginx`
    Конфиг nginx для работы с проектом

Разворачивание проекта:

1) Делаем npm i
2) Ставим node_modules как Resources root
3) Добавляем строчку sudo nano /private/etc/hosts
127.0.0.1 dev.quadcode.com
4) Добавьте конфиг nginx из ./nginx в /opt/local/etc/nginx
5) Перезапускаем nginx
6) Запускаем npm start
