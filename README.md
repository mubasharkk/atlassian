# Task Description
<details>
<summary>The development team needs a REST API to capture and collect data from Atlassian Marketplace to decide
which apps to develop.</summary>

The Atlassian Marketplace API has to be used for this:
https://developer.atlassian.com/platform/marketplace/rest/v2/api-group-apps/#api-addons-get

### Create a REST API with the following features:
* A user can make a request to get the apps from the Atlassian Marketplace.
### The apps can be filtered by :

  * [x] [Application](https://developer.atlassian.com/platform/marketplace/rest/v2/api-group-applications/#api-applications-get)
  * [x] Hosting type
  * [x] Filter
  * [x] Search text
  * [x] (Additional) The endpoint has all the available filters provided by the Atlasian Rest API

### The response should contain the following information:

  * [x] The name of the app
  * [x] The description of the app
  * [x] The link to the app in the Atlassian Marketplace
  * [x] The categories of the app
  * [x] The vendor of the app
  * [x] The average stars for the app
  * [x] The number of reviews
  * [x] The number of downloads
  * [x] The number of the installs
  * [x] The number of users of the app

</details>

### Documentation
* (Optional) It would be nice if there was user-friendly documentation for the REST API
  * [Available here](https://mubasharkk.github.io/atlassian/)
  * The API documentation remains the same for both projects

# Details

I have built 2 applications to display my technical expertise , first application is based on 
PHP without using any framework and second application is built using ExpressJs framework.
The application structure is simple and should be easy to understand. 

In case you have any question regarding any technical details or its execution, you can reach me via github, email or phone.


# PHP Application 

<details open>
<summary>The API is built on core PHP without using any framework.</summary>

### Running the PHP application

```
#go to the php app directory
$ cd php/

#insalling composer dependencies
$ composer install

#executing the index.php file
$ php -S localhost:8000 ./index.php
```


### Testing the PHP application with PhpUnit

```
$ ./vendor/bin/phpunit ./tests/AddonServiceTest.php
```
</details>

### Codebase to look into
All the important code to examine is in [./php/src/](https://github.com/mubasharkk/atlassian/tree/master/php/src)

# NodeJs Application

<details open>
<summary>The API is built on using ExpressJs framework for nodejs.</summary>

```
#go to the nodejs app directory
$ cd nodejs/

#insalling NPM dependencies
$ npm install

#executing the app.js file
$ npm start

OR 

$ node app.js
```

### Testing the PHP application with PhpUnit

```
$ npm test
```
</details>

### Codebase to look into
All the important code to examine is in [./nodejs/src/](https://github.com/mubasharkk/atlassian/tree/master/nodejs/src)

