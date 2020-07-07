# QuickFile PHP SDK Library

Used to connect to QuickFile Cloud Accounting Software API.

**Please note**: This is a new, basic library, so there may be issues along the way.

## Requirements

* PHP 5.5.0 and later
* Guzzle HTTP 7.0 and later
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

All header information is populated for you. You need to supply everything as part of the body.

## FAQ

**Q. What version of the API does this use?**
A. It uses 1.2 of the JSON API

**Q. What methods does it support?**
A. Client, Invoice and Ledger functions. More to follow.

**Q. Is this library supported by QuickFile?**
A. No, this is an unofficial library

**Q. How is the data sent to QuickFile?**
A. The data is always sent using HTTPS, using the Guzzle HTTP library. Guzzle will use cURL, but it's not required. Please see the [Guzzle Website](http://docs.guzzlephp.org/en/latest/overview.html) for information.

**Q. I've found a bug, where do I report it?**
A. If it's a security bug relating to the API, you can post it to the [QuickFile forum](https://community.quickfile.co.uk). If it's a bug with the library, please open an issue. If it's a security issue, please contact us through [our website](https://roseblade.media) before posting it publicly.