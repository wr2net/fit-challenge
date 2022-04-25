# Fit Challenge

-----
## Observation:
### This system is object of study, case you want use in production, attention with applications environments variables and include authentication.

-----

## Requirements
Docker and Docker Compose

## Setup
- Clone this repository

`git clone https://github.com/wr2net/fit-challenge`
- Execute Setup

`sh scripts/setup.sh`

## Others
- For down Docker

`sh scripts/down.sh`
- For up without build Docker

`sh scripts/up.sh`

## Tests on Postman
[Postman Files](postman/README.md)

## Tests on Insomnia
[Insomnia Files](insomnia/README.md)

## Unitary tests
- Execute

`sh scripts/test.sh`

## Routes
### Movements
TYPE | ENDPOINT                    | CONTROLLER
-----|-----------------------------|-------
GET | api/movements               | api.movements.index › App\Movements\Controllers\Api\MovementController@index
POST | api/movements               | api.movements.store › App\Movements\Controllers\Api\MovementController@store
GET | api/movements/{movement_id} | api.movements.show › App\Movements\Controllers\Api\MovementController@show
PUT | api/movements/{movement_id} | api.movements.update › App\Movements\Controllers\Api\MovementController@update
DELETE | api/movements/{movement_id} | api.movements.delete › App\Movements\Controllers\Api\MovementController@destroy

### Personals (Users)
TYPE | ENDPOINT                    | CONTROLLER
-----|-----------------------------|-------
GET | api/personals | api.personals.index › App\Personals\Controllers\Api\PersonalController@index
POST | api/personals | api.personals.store › App\Personals\Controllers\Api\PersonalController@store
GET | api/personals/{personal_id} | api.personals.show › App\Personals\Controllers\Api\PersonalController@show
PUT | api/personals/{personal_id} | api.personals.update › App\Personals\Controllers\Api\PersonalController@update
DELETE | api/personals/{personal_id} | api.personals.delete › App\Personals\Controllers\Api\PersonalController@destroy

### Personal Records
TYPE | ENDPOINT                    | CONTROLLER
-----|-----------------------------|-------
GET | api/personalRecords                     | api.personalRecords.index › Api\PersonalRecordController@index
POST | api/personalRecords                     | api.personalRecords.store › Api\PersonalRecordController@store
GET | api/personalRecords/{personalRecord_id} | api.personalRecords.show › Api\PersonalRecordController@show
PUT | api/personalRecords/{personalRecord_id} | api.personalRecords.update › Api\PersonalRecordController@update
DELETE | api/personalRecords/{personalRecord_id} | api.personalRecords.delete › Api\PersonalRecordController@destroy


