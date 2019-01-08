# Caldera Core

This package provides the application container for sharing services between packages and it helps with testing the integration of PHP packages.

* Provides application container with:
    * Interop - `calderawp/interop`: Shared interfaces and traits that:
        - Interfaces that provide data-typing of entities, more consistent translation to and from array/ JSON/ database serialization and more predictable public APIs of business logic providing classes.
        - Traits that provide implementations of these interfaces. 
    * Forms - `calderawp/forms`: Forms and form entries.
    * Rest API - `calderawp/rest-api`: REST API endpoints and controllers
        - REST API endpoints that can translate to and from PSR-7 or WordPress REST API requests.
        - The Caldera Forms REST API.
    * HTTP - `calderawp/http`: Http interactions between application and outside world via HTTP.
        - Base Request/Response classes used for REST API request/ responses as well as HTTP clients
        - Http clients
        - Dispatching HTTP requests to other servers.
    * Database - `calderawp/caldera-db`: interactions -- CRUD + anonymize and queries.
        - Works with WordPress, and could work with any MySQL-like database.
        - Mainly for internal use. The data package
    * Data Sourcing - `calderawp/data-source` Provides common, swappable interface for accessing application.
        - By default, uses `calderawp/caldera-db`
        - Could use any database, locally or via remote API.
    * Events - `calderawp/events` - WordPress-like event dispatching.
        - Provides an ApplyFilters/AddFilter implementation.
        - Needs an AddAction/DoAction implementation.
        - The WordPress plugin SHOULD (it does not yet) repeat events with `apply_filters` and `do_action`.
        
* Provides tests for said the application container, and runs integration tests.


## Examples
In general, you should use the function `\caldera()` to access the main container or any of the modules.

```php
$calderaForms = caldera()->getCalderaForms();
```

### Instantiate Caldera Core
You can use the static accessor function, which always returns the same, global instance of Caldera Core:
```php
$calderaForms = caldera();
```

Alternatively, you can create your own instance of Caldera Core:

```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());

```

### Get The Caldera Forms Module
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

### Get The Caldera Rest API Module
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


### Get The Caldera Events Module
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

### Get The Caldera Http Module
```php
$calderaForms = caldera()->getHttp();
```

or


```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$calderaEvents = $core->getHttp();
```

### Add A Module 

Module must implement `calderawp\interop\Contracts\CalderaModule`;
```php

\caldera()->addModule($module);
$module = $core->getModule('moduleIdentifier');
```

## Testing
Unit tests are in `tests/Unit`. They are run at same time as integration tests -- `composer test:integration` -- for now.

    
## License, Copyright, etc.
Copyright 2018+ CalderaWP LLC and licensed under the terms of the GNU GPL license. Please share with your neighbor.
