# RaoVat.
<div>Clone the repository with git clone </div>
    <div>Copy .env.example file to .env and edit database credentials there. (cp .env.example .env)</div>
<div>Run composer install</div>
<div>Run php artisan key:generate</div>
<div> # add the database connection config to your .env file </div>

<div>Run php artisan migrate</div>
<div>Run npm install</div>
<div>Run npm run dev</div>

# visit https://pusher.com and create a free app. then copy the keys into your .env file
<div>PUSHER_APP_ID=your_pusher_app_id</div>
<div>PUSHER_APP_KEY=your_pusher_app_key</div>
<div>PUSHER_APP_SECRET=your_pusher_app_secret</div>
<div>PUSHER_APP_CLUSTER=your_pusher_cluster</div>

# change the BROADCAST_DRIVER in your .env to pusher
<div>BROADCAST_DRIVER=pusher</div>

# seed your databse with some users and messages
<div>php artisan db:seed</div>

# run webpack and watch for changes
<div>npm run watch</div>

# Docker
- **build:**
```docker-compose build```
- **up:**
```docker-compose up -d```
- **view logs:**
```docker-compose logs```
- **restart app only:**
```docker-compose up -d --force-recreate --no-deps app```
- **restart database only:**
```docker-compose up -d --force-recreate --no-deps database```
- **restart all:**
```docker-compose up -d --force-recreate```
- **composer install:**
```docker-compose exec app composer install```
- **artisan:**
```docker-compose exec app php artisan```
```docker-compose exec app php artisan migrate:refresh --seed```
- **build frontend**
```docker-compose exec app npm install```
```docker-compose exec app npm run watch-poll```

- **run any command inside container:**
```docker-compose exec app bash```