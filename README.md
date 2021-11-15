# Laravel Dashboard

## Instructions for setting up With Laravel Sail in a Docker Container on WSL2

1. Clone repo
2. Run `npm install`
3. Run `npm run dev`
4. Run `composer install` the optional command `composer install --ignore-platform-reqs` may be needed
5. Run `sail up -d` to start the app. If you do not have a sail alias `.vendor/bin/sail` will be required
6. Create `SQLite` Database by running `touch database/database.sqlite`
7. Populate the DB by running `sail artisan migrate:fresh --seed`
8. Navigate via your web browser to `localhost` or use the link via your container in docker
9. Login with the email `admin@admin.com` and password `password`

## Using the application as admin

Upon logging in you will land on a page which you can use to naviagte to either a company list or employee list

The admin user is capable of CRUD functionality on these views (namely create, update, delete)

Note that currently there is no validation when creating a user to check if a company name already exists

Creating a company will require all fields. When creating a company the logo is stored in `storage/app/public`

This logo is viewable to the public via the `sail artisan storage:link` command so if you aren't seeing your logos try running the command

Creating a user will also require all fields. Note again that company must match an existing company name for the employee's company to show on the list view

## Using the application as a regular employee

After you have finished exploring the application you can make an employee with any email and password and login to the application with them

The regular employee is not authorized to perform CRUD functionality so therefore will receive a 401 unauthorized page if navigating to a create, update, or delete resource

## Tech Talk

The application leverages Laravel Breeze to handle authentication

The routes for companies and employees are handled in a resourceful manner and only admins are authorized for CRUD functionality

The application is largely standard Laravel utilizing Routes, Controllers, Migrations, etc.

The styling was done with custom CSS prior to incorporating Laravel Breeze as a personal challenge/demonstration

Laravel Breeze pulls in Tailwind, but the custom views make little use of it. Outside of using the recommended Tailwind classes for headers due to how Tailwind overrides their style there is no other use of Tailwind

The application may update to use Tailwind styling for a future version
