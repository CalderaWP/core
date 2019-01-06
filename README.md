# Caldera Core

This package provides the application container for sharing services between packages and it helps with testing the integration of PHP packages.

* Provides application container with:
    * Interop - Shared interfaces and traits that:
        - Interfaces that provide data-typing of entities, more consistent translation to and from array/ JSON/ database serialization and more predictable public APIs of business logic providing classes.
        - Traits that provide implementations of these interfaces. 
    * Forms - Forms and form entries.
    * Rest API 
        - REST API endpoints that can translate to and from PSR-7 or WordPress REST API requests.
        - The Caldera Forms REST API.
    * HTTP - Interactions between application and outside world via HTTP.
        - Base Request/Response classes used for REST API request/ responses as well as HTTP clients
        - Http clients
        - Dispatching HTTP requests to other servers.
    * Database - Database interactions -- CRUD + anonymize and queries. Works with WordPress, and could work with any MySQL-like database.
    * Data sourcing - Not used yet, may have been a mistake.
* Provides tests for said the application container, and runs integration tests.


## Examples
In general, you should use the function `\caldera()` to access the main container or any of the modules.

```php
$calderaForms = caldera()->getCalderaForms();
```

### Instantiate Core

```php
$calderaForms = caldera();
```

or

```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());

```

### Get The Caldera Forms
```php
$calderaForms = caldera()->getCalderaForms();
```

or

```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$calderaForms = $core->getCalderaForms();
```

### Get The Caldera Rest API
```php
$calderaForms = caldera()->getRestApi();
```

or


```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$restApi = $core->getRestApi();
```


### Get The Caldera Events
```php
$calderaForms = caldera()->getEvents();
```

or


```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$calderaEvents = $core->getEvents();
```

### Add A Module 

Module must implement `calderawp\interop\Contracts\CalderaModule`;
```php

\caldera()->addModule($module);
$module = $core->getModule('moduleIdentifier');
```

## Testing
Unit tests are in `tests/Unit`. They are run at same time as integration tests -- `composer test:integration` -- for now.


