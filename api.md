# API

# first level

## authentication

* login
* password

## media

[* id]
* distributor_id | name
* edition_id | name
* type_id | name
* user_id
* age_limit
* release_date

## audio

[* id]
[* media_id]
* name
* artist_id | name
* number_of_discs
* duration

## book

[* id]
[* media_id]
* number_of_pages
* isbn_10
* isbn_13
* media_id

## game

[* id]
[* media_id]

## video

[* id]
[* media_id]
* duration
* number_op_discs
* media_id

## user

* name
    * first
    * last
* email

# second level

## artist

## comment

## distributor

## edition

## genre

## language

## platform

## type

## track
