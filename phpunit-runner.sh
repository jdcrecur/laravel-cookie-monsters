#!/bin/bash

php artisan database:drop-tables-build-seed

vendor/bin/phpunit