## Instructions

- Clone repository
- Install packages: `php composer update`
- Create basic DB and DB for testing
- Based on the file `.env.example`, create the file` .env`, for this, run the command `cp .env.example .env`, then generate the keys using the command` php artisan key: generate`
- Write the basic database and the database for testing settings in `.env`
- Install DB table and generate seeders: `php artisan migrate --seed`
- Setting supervisor like in this instruction https://laravel.com/docs/8.x/queues#supervisor-configuration
- Create cron command `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

## API documentation

Postman is used to describe api.

Login:`perpeeck.for.postman@gmail.com`

Password: `8j(J*J&H9j8(`
