#!/bin/bash

#Create database directory
mkdir mysql

#Build and Up Docker
docker-compose up --build -d

#Create Environments
cp api/.env.example api/.env

#Laravel Key Generate
docker exec -it fit-api php artisan key:generate

#Install Dependencies
docker exec -it fit-api composer install

#Create Tables Database
sleep 5
docker exec -it fit-api php artisan migrate:status
sleep 5
docker exec -it fit-api php artisan migrate
sleep 5
docker exec -it fit-api php artisan migrate:status
sleep 5
docker exec -it fit-api php artisan migrate

#Execute Seeders
docker exec -it fit-api php artisan db:seed --class=PersonalSeeder
docker exec -it fit-api php artisan db:seed --class=MovementSeeder
docker exec -it fit-api php artisan db:seed --class=PersonalRecordSeeder