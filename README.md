Vacancies Application
=====================

The "Vacancies Application" is an application that provides a repository to handle crud operations using multiple datasources on the vacancy model  

Requirements
------------

  * PHP 5.3 or higher;
  * [Predis 1.1](https://github.com/nrk/predis) or higher;
  * [ElasticSearch](https://github.com/elastic/elasticsearch-php) for PHP;
  * [PHPUnit 5.4](https://github.com/sebastianbergmann/phpunit) or higher.
  * MySQL Server up and running (execute vacancies.sql on root folder to setup db)
  * Redis Server up and running
  * ElasticSearch Server up and running

Installation
------------


Install using composer:

```bash
$ composer install
```

Usage
-----

You can use AppBundle/Controller/VacancyController to implement the repository or you can use the test cases defined in AppBundle/Tests 