# Simple-TMDB-Symfony-App
A simple TMDB php app that uses 'The Movie Database' (TMDb) data. 
## Installation
You can clone the repository to a path of your choice or donwload the zip file and then extract it.
```
https://github.com/rborges13795/Simple-TMDB-Symfony-App.git
```
## Configuration
First thing that needs to be done is to change the `.env.example` file to just `.env` and add 'api_key' and 'api_token' to it. After you get said key and token from the TMDB website, assign them respectively. After that, go to `/public/assets/js/search.js` and replace `APIKeyHere` with your api_key. Then, at the end of the file, replace the mock database data with your own. Finally, run composer install with
```
composer install 
```
### Usage
Initiate your server and check the routes in /config/routes.yaml and copy the path under 'Dashboard'. From there you can explore the options and even create or delete users (recommended, since it opens more options to explore).
To initiate the server:
```
php -S localhost:8080 -t public
```
## Database
If your database data was added on the .env file, run the command:
```
php bin/console doctrine:database:create
```
After that, add the tables through migrations:
```
php bin/console doctrine:migrations:migrate DoctrineMigrations\Version20210825203308
```
If you want to populate the database with some users, run the command:
```
php bin/console doctrine:fixtures:load
```
## The Data
This app uses the 'The Movie Database' ([TMDb](https://www.themoviedb.org)) as the source of the data and images used.
## Requirements
- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
