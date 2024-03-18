## Live
[http://flight-info-test.everything-now.space/](http://flight-info-test.everything-now.space/)
## Installation

Using Docker and [Sail](https://laravel.com/docs/11.x/installation#docker-installation-using-sail)
```
git clone
```
```
./vendor/bin/sail up -d
```
```
./vendor/bin/sail artisan migrate
```
```
./vendor/bin/sail artisan db:seed --class=UserSeeder
```
```
./vendor/bin/sail artisan db:seed --class=AirportSeeder
```
```
./vendor/bin/sail artisan db:seed --class=TransporterSeeder
```
```
./vendor/bin/sail artisan db:seed --class=FlightSeeder
```
```
./vendor/bin/sail npm run dev
```
