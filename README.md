# QuickFile PHP SDK Library

Wrapper for the [QuickFile](https://www.quickfile.co.uk) API.

## Requirements

* PHP 8.0 and later
* Guzzle HTTP 7.4 and later
* ext-json

## Composer

You can install the library by using [Composer](http://getcomposer.org), and using the following command:

```bash
composer require roseblade/quickfile-php-sdk
```

Then use the Composer [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading) library to get started:

```php
require_once('vendor/autoload.php');
```

## Manual

If you don't wish to use Composer, or are unable to, you can download the latest release and include the ``init.php`` file:

```php
require_once('/path/to/roseblade/quickfile-php-sdk/init.php');
```

Don't forget to download and install [Guzzle](https://github.com/guzzle/guzzle).

## Getting Started

We've included an example PHP file for you to get started in ``/example/index.php``.

To get started, you will need to set the API credentials, available within your QuickFile account.

```php
$creds  = [
    'AccountNumber' => 6131400000,
    'APIKey'        => '000AA000-AAAA-0000-A',
    'ApplicationID' => '00000000-AAAA-AAAA-AAAA-00AA00AA00AA'
];
\QuickFile\QuickFile::config($creds);
```

or individually

```php
\QuickFile\QuickFile::setAccountNumber($creds['AccountNumber']);
\QuickFile\QuickFile::setAPIKey($creds['APIKey']);
\QuickFile\QuickFile::setApplicationID($creds['ApplicationID']);
```

Each function can be accessed through it's own class, for example, for a client\search, you would use:

```php
\QuickFile\Client::search([
    // Search Data
]);
```

And for ``invoice\create``

```php
\QuickFile\Invoice::create([
    // Invoice Data
]);
```

These all match up with the API endpoints found in the [QuickFile API documentation](https://api.quickfile.co.uk), replacing the underscore with the function name.

All header information is populated for you. You need to supply everything as part of the body as per the documentation on the QuickFile site.

## FAQ

### What version of the API does this use?

It uses 1.2 of the JSON API

### What methods does it support?

#### Client

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Get)
insertContacts | [Link](https://api.quickfile.co.uk/d/v1_2/Client_InsertContacts)
login | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Login)
newDirectDebitCollection | [Link](https://api.quickfile.co.uk/d/v1_2/Client_NewDirectDebitCollection)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Search)
update | [Link](https://api.quickfile.co.uk/d/v1_2/Client_Update)

### Is this library supported by QuickFile?

No, this is an unofficial library

### How is the data sent to QuickFile?

A. The data is always sent using HTTPS, using the Guzzle HTTP library. Guzzle will use cURL, but it's not required. Please see the [Guzzle Website](http://docs.guzzlephp.org/en/latest/overview.html) for information.

### I've found a bug, where do I report it?

A. If it's a security bug relating to the API, you can post it to the [QuickFile forum](https://community.quickfile.co.uk). If it's a bug with the library, please open an issue. If it's a security issue, please contact us through [our website](https://roseblade.media) before posting it publicly.
