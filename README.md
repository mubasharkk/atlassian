# Task Description
The development team needs a REST API to capture and collect data from Atlassian Marketplace to decide
which apps to develop.

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


### Documentation
* (Optional) It would be nice if there was user-friendly documentation for the REST API
  * [Available here](https://mubasharkk.github.io/atlassian/) 

# Running the app

```
#insalling composer dependencies
$ composer install

#executing the index.php file
$ php -S localhost:8000 ./index.php
```