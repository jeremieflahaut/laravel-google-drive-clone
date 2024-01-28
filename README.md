# laravel inertia starter kit

## Features

### Github workflow for laravel test

Laravel tests are run in Github runner . The coverage badge will be pushed to a Badges branch. To do this, you must provide read and write access to the workflow.<br>

To do this, go to settings >> Actions >> General >> Workflow permissions in your repository.

[![Tests](https://github.com/jeremieflahaut/laravel-google-drive-clone/actions/workflows/main.yml/badge.svg)](https://github.com/jeremieflahaut/laravel-google-drive-clone/actions/workflows/main.yml)
![Coverage](https://github.com/jeremieflahaut/laravel-google-drive-clone/blob/badges/coverage.svg?raw=true&sanitize=true&branch=badges)



```
php artisan vendor:publish --provider "Inertia\ServiceProvider"
```
