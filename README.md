# Caldera Core

This package provides the application container for sharing services between packages. This package should not do anything else.

It also provides tests for said container, and runs integration tests.


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


