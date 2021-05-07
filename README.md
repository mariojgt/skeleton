![image info](https://raw.githubusercontent.com/mariojgt/skeleton/master/Publish/Public/image/skeleton.png)

# Skeleton
This Laravel packages contain a very simple structure for any kind of packages development for Laravel.

# Features

- [ ] Clean and basic start point in Laravel package development.
- [ ] Webpack setup with tailwind css ,sweetalert2 and vue3 basic setup.
- [ ] Simple out of the box Laravel Authentication.
- [ ] Example Laravel components, and layout structure.
- [ ] Tailwind with npm presetup for runing with packages.
- [ ] Republish command
- [ ] Reusable laravel layout
- [ ] Dynamic form
- [ ] Lightweight
- [ ] Dark|light mode out of the box
- [ ] Now with api read to use with a mobile aplication

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

## Command Republish

The following commands

```php
php artisan republish:skeleton
```

Will move you changes in your resources like the js or css back to the packages useful to speed up development.

# Packages info

This package purpose is to give a fresh start for a new package so you can use those premade tools or just delete and use the package skeleton, note the by default the system don't allow registration but you can change that i the skeleton config file.
# Easy way to install

```php
php artisan install:skeleton
```

1.0.4
