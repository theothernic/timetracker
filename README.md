# Timetracker

## What is this?
Timetracker is a simple time-tracking app that allows you to log in, 
 clock in and out, and to view your timesheet.

Timetracker is built upon Laravel (v7), and uses Bootstrap.


## How can I use it?
### Prerequisites
 - A PHP environment, PHP >= 7.2 and `composer` installed
 - A Laravel-supported database
    - Tested with Sqlite.
 
### Installation
 1. Clone the project from GitHub.
 1. Ensure a proper database has been set up.
 1. Run `composer install`
 1. Copy *.env.example* file to *.env*
 1. Run `php artisan key:generate`
 1. Update the .env file with the desired settings.
    1. Update the *APP_NAME* variable with your desired application name.
    1. Set the database credentials for the selected database in the *.env* file.
 1. Run `php artisan migrate` to get the database up to speed.
 
 You should now be able to run `php artisan serve` to use this application
 in a development environment.
 
## Todos and Future Thinking

 - Better error-checking. (Always.)
 - Add accounting and auditing features.
   - Roles and Permissions
   - Audit Trails
   - Daily punch rate-limits.
 - Timezone upgrades
    - Change out hardcoded references in the code for what's in the user's profile.
    - Allow user to select timezone preference at registration. 
 - Report filters/searching.
 - Implement a more 'mobile-centric' design to be used outside the desktop.
 - Develop a project tracking module for assigning time to different projects.
 - User profile page to update name/preferences.
 




-- Nicholas Barr http://nicholasbarr.net/



