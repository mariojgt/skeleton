# Skeleton

This Laravel packages contain a very simple structure for any kind of packages development for Laravel.

# Features

- [ ] Clean and basic start point in package development.
- [ ] Webpack setup with tailwind css and sweetalert2.
- [ ] Simple out of the box Laravel Authentication.
- [ ] Example Laravel components, and layout structure.

# Installation

You have 2 options.

### First option via composer

1. composer require mariojgt/skeleton
2. php artsain vendor:publish --force  (select the package number)

### Second Option gitclone (Recommended if you like to change and make to your own)

1. git clone https://github.com/mariojgt/skeleton

2. Setup you composer to use local VCS

3. ```javascript
   "repositories": [
           {
               "type" : "path",
               "url": "packages/skeleton", // Path to your local folder package
               "options": {
                   "symlink": true
               }
           }
       ],
       "require": {
           "php": "^7.3|^8.0", //Example
           "fideloper/proxy": "^4.4",//Example
           "fruitcake/laravel-cors": "^2.0",//Example
           "guzzlehttp/guzzle": "^7.0.1",//Example
           "laravel/framework": "^8.12",//Example
           "laravel/tinker": "^2.5",//Example
           "mariojgt/skeleton": "@dev"// Here is where you add the package reference
       },
   ```

4. php artsain vendor:publish --force  (select the package number)

