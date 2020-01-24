# Offerista-Demo

A basic symfony app that satisfies the Task Requirements

## Task requirements

* Set up a Symfony 4/5 project
* Define one route that:
* loads some random data from a REST API, i.e. https://jsonplaceholder.typicode.com/
* displays the data using a Twig template
* uses only Symfony components
* Implement a JavaScript based solution that:
* lazy loads some random data after the first user interaction
* adds that data to the already existing data
* uses latest JavaScript features
* is embedded in the Symfony app
* Put the app in a reasonable Docker image
* The app should be available on port 80
* The code should be unit tested
* The app should support current browsers
* Styling is not important

## Docker Repo

[Offerista-Demo-Docker](https://github.com/njm222/Offerista-Demo-Docker)

## Getting Started for local use

1.  Make sure you have all the Prerequisites.
2.  `git pull https://github.com/njm222/Offerista-Demo.git`
3.  `cd ./Offerista-Demo`
4.  `composer install`
5.  `yarn encore dev`
6.  `symfony server:start`
7.  Visit `localhost:8000` in a browser

## Testing

1.  `cd` to the root directory
2.  `php bin/phpunit` to run all tests


## Prerequisites

Requirements are php, symfony, composer, npm and yarn


## Built With

* [php](https://www.php.net/)

* [symfony](https://symfony.com/) 

* [composer](https://getcomposer.org/)

* [twig](https://twig.symfony.com/)

* [php-unit](https://phpunit.de/)

* [yarn](https://yarnpkg.com/)


### Authors

* **Nathan Menezes**

