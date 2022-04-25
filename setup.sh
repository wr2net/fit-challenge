#!/bin/bash

#Install Dependencies
docker exec -it fit-api composer install

#create Environments
cp .env.example .env

#Laravel Key Generate
docker exec -it fit-api php artisan key:generate

#Create Tables Database
docker exec -it fit-api php artisan migrate

#Execute Seeders
docker exec -it fit-api php artisan db:seed --class=PersonalSeeder
docker exec -it fit-api php artisan db:seed --class=MovementSeeder
docker exec -it fit-api php artisan db:seed --class=PersonalRecordSeeder