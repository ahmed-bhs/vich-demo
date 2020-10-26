Installation
============

* Clone the demo : `git clone https://github.com/ahmed-bhs/vich-demo.git`

* `cd vich-demo && composer install`
* create sqlite test database & run migrations & fixutres:
`bin/console d:d:c && bin/console d:m:m -n && d:f:l -n`
* `bin/console server:start 127.0.0.1:8080`
* curl many times `http://127.0.0.1:8080/api/images`
you gonna figure out that updatedAt field is always equal to current datetime.
