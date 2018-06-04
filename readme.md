Welcome to Song Book Manager
by Nick DuBois

## About this Project

This project will be a simple TDD driven restful API.  Any actual database access will be faked from the start, and no database will be configured or required for this project.  Of course this means that there will be no persistence of data.

## What need will this project solve?

You and I are rock stars!  That's right!  Full blown, bigger than life rock stars!  Because we are so busy, it is hard to keep track of our songs chord progressions and lyrics.  Lucky for us, I am a web developer and plan on creating an application to solve this issue.

This application will be the back end of a front end React application that displays these song chord sheets!  It will strictly be a restful API that allows for:

- Getting list of all songs
- Adding a song to the list
- Editing/Update a song in the list
- Remove song from list. 

## Setup steps taken.

Create laravel application inside existing vagrant box (scotchbox) setup using this command:

    composer create-project laravel/laravel SongBookManager
    
Create Resources routes:

    php artisan make:controller SongListController --resource


Next I need to create the routes for the SongListController:

    Route::resource("api/items', "SongBookController");

When I want to connect this to a database, I would use the following command to create models for whatever tables I require:

    php artisan make:model SongListItem -m
    
_note: -m creates migration!_    

To run tests, I run this command:

    ./vendor/bin/phpunit
    
