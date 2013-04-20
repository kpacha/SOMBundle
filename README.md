SOMBundle
=========

Success-O-Meter Bundle

Simple tracking bundle for easy and scalable analytics collection and management.

##Requirements

- PHP 5.4
- MongoDB (http://www.mongodb.org/ & http://www.php.net/manual/en/book.mongo.php)

##Third-Party components

- Doctrine ODM (https://doctrine-mongodb-odm.readthedocs.org/en/latest/)
- Piwik javascript tracking client (https://github.com/piwik/piwik/blob/master/piwik.js)

##Installation

- Add composer dependency

        "require": {
            "kpacha/som-bundle": "dev-master"
        },
        "repositories": [
            {"type": "vcs", "url": "https://github.com/kpacha/SOMBundle"}
         ],

- Update dependencies

        composer update

- Register the bundles into app/AppKernel.php

        public function registerBundles()
        {
            $bundles = array(
                ...
                // SOM Bundle and related dependencies
                new Kpacha\SOMBundle\KpachaSOMBundle(),
                new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
                ...

- Add mongoDb configuration

        #mongo db configuration
        doctrine_mongodb:
            connections:
                default:
                    server: mongodb://localhost:27017
                    options: {}
            default_database: SOM
            document_managers:
                default:
                    auto_mapping: true

- Register SOMBundle route

        kpacha_som:
            resource:  "@KpachaSOMBundle/Controller/"
            type:      annotation
            prefix:    /

##TO-DO

- Improve documentation
- Full code coverage
- Improve data aggregation
