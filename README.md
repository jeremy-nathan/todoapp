# MoneyMatch Engineering Case Assessment

## Instructions to setup the todo app:

### Prerequisites
- PHP (https://www.apachefriends.org/download.html)
- Composer (https://getcomposer.org/)
- Node.js (https://nodejs.org/)

### Installation
1. Navigate to the root folder once it is extracted.

```sh
cd ./todoapp
```
2. Install PHP dependencies
```sh
composer install
```
3. Install NPM dependencies
```sh
npm install
```
4. Generate assets
```sh
npm run dev
```
5. Setup .env file
```sh
cp .env.example .env
```
6. Generation application key
```sh
php artisan key:generate
```
7. Configure database connections and credentials in __.env__ file.
- Please make sure that the database is manually created first.
8. Run database migrations
```sh
php artisan migrate
```
9. Run dev server
```sh
php artisan serve
```  
### Running tests
To run tests, run:
```sh
./vendor/bin/phpunit --filter=TodoTest
``` 
#### Assumptions
- User authentication is not required
