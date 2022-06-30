# QuickFile PHP SDK Library

![GitHub](https://img.shields.io/github/license/roseblademedia/quickfile-php-sdk?style=for-the-badge)
[![Packagist Version](https://img.shields.io/packagist/v/roseblade/quickfile-php-sdk?style=for-the-badge)](https://packagist.org/packages/roseblade/quickfile-php-sdk)
[![GitHub issues](https://img.shields.io/github/issues/RosebladeMedia/QuickFile-PHP-SDK?style=for-the-badge)](https://github.com/RosebladeMedia/QuickFile-PHP-SDK/issues)

Wrapper for the [QuickFile](https://www.quickfile.co.uk) API.

No validation is provided by this library.

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

### QuickFile Standard API

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

For example:

* `Client_Search` > `\QuickFile\Client::search();`
* `Project_TagCreate` > `\QuickFile\Project::tagCreate();`
* `Supplier_Create` > `\QuickFile\Supplier::create();`

All header information is populated for you. You need to supply everything as part of the body as per the documentation on the QuickFile site.

### QuickFile Partner API

The QuickFile Partner API allows developers to make their tools available to third parties through the QuickFile Marketplace. This involves generating an app on their account so you have the correct API endpoint access.

The set up is similar to that of the individual API above:

```php
$creds  = [
    'AccountNumber' => 6131400000,
    'Token'         => 'ABCD1234',
    'ProductKey'    => '00000000-AAAA-AAAA-AAAA-00AA00AA00AA',
    'SecretKey'     => '00000000-AAAA-AAAA-AAAA-00AA00AA00AA'
];
\QuickFile\Partner::config($creds);
```

or individually

```php
\QuickFile\Partner::setAccountNumber($creds['AccountNumber']);
\QuickFile\Partner::setToken($creds['Token']);
\QuickFile\Partner::setProductKey($creds['ProductKey']);
\QuickFile\Partner::setSecretKey($creds['SecretKey']);
```

There are several static functions within the `Partner` class that can help you streamline the process:

* **authenticate()**: Returns an array of API Key and ApplicationID.
* **setupConfig()**: Automatically sets up the QuickFile library with these variables

For example, after configuring the class as above:

```php
\QuickFile\Partner::authenticate();

// Or, specify the returnArray and verifyProduct
// Example below is the default - verify the product and return a bool (rather than array)

\QuickFile\Partner::authenticate(true, false);

// Or be fancy with names variables

\QuickFile\Partner::authenticate(returnArray: true, verifyProduct: false);
```

This can be combined with the individual API, quickly setting the config by called `setupConfig()` and then using the API as normal:

```php
\QuickFile\Partner::setupConfig();
\QuickFile\Invoice::get([
    'InvoiceID' => 123456
]);
```

## FAQ

### What version of the API does this use?

It uses 1.2 of the JSON API

### What methods/endpoints are supported?

#### Bank

Function | API Docs
--|--
search | [Link](https://api.quickfile.co.uk/d/v1_2/Bank_Search)
createAccount | [Link](https://api.quickfile.co.uk/d/v1_2/Bank_CreateAccount)
createTransaction | [Link](https://api.quickfile.co.uk/d/v1_2/Bank_CreateTransaction)
getAccounts | [Link](https://api.quickfile.co.uk/d/v1_2/Bank_GetAccounts)
getAccountBalances | [Link](https://api.quickfile.co.uk/d/v1_2/Bank_GetAccountBalances)

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

#### Document

Function | API Docs
--|--
upload | [Link](https://api.quickfile.co.uk/d/v1_2/Document_Upload)

#### Estimate

Function | API Docs
--|--
acceptDecline | [Link](https://api.quickfile.co.uk/d/v1_2/Estimate_AcceptDecline)
convertToInvoice | [Link](https://api.quickfile.co.uk/d/v1_2/Estimate_ConvertToInvoice)

#### Invoice

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_Get)
getPdf | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_GetPDF)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_Search)
send | [Link](https://api.quickfile.co.uk/d/v1_2/Invoice_Send)

#### Item (Inventory Item)

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Item_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Item_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Item_Get)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Item_Search)

#### Journal

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Journal_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Journal_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Journal_Get)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Journal_Search)

#### Ledger

Function | API Docs
--|--
search | [Link](https://api.quickfile.co.uk/d/v1_2/Ledgers_Search)
getNominalLedgers | [Link](https://api.quickfile.co.uk/d/v1_2/Ledgers_GetNominalLedgers)

#### Payment

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Payment_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Payment_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Payment_Get)
getPayMethods | [Link](https://api.quickfile.co.uk/d/v1_2/Payment_GetPayMethods)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Payment_Search)

#### Project

Function | API Docs
--|--
tagCreate | [Link](https://api.quickfile.co.uk/d/v1_2/Project_TagCreate)
tagDelete | [Link](https://api.quickfile.co.uk/d/v1_2/Project_TagDelete)
tagSearch | [Link](https://api.quickfile.co.uk/d/v1_2/Project_TagSearch)

#### Purchase

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Purchase_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Purchase_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Purchase_Get)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Purchase_Search)

#### PurchaseOrder

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/PurchaseOrder_Create)

#### Report

Function | API Docs
--|--
ageing | [Link](https://api.quickfile.co.uk/d/v1_2/Report_Ageing)
balanceSheet | [Link](https://api.quickfile.co.uk/d/v1_2/Report_BalanceSheet)
chartOfAccounts | [Link](https://api.quickfile.co.uk/d/v1_2/Report_ChartOfAccounts)
profitAndLoss | [Link](https://api.quickfile.co.uk/d/v1_2/Report_ProfitAndLoss)
vatObligations | [Link](https://api.quickfile.co.uk/d/v1_2/Report_VatObligations)
subscriptions | [Link](https://api.quickfile.co.uk/d/v1_2/Report_Subscriptions)

#### Supplier

Function | API Docs
--|--
create | [Link](https://api.quickfile.co.uk/d/v1_2/Supplier_Create)
delete | [Link](https://api.quickfile.co.uk/d/v1_2/Supplier_Delete)
get | [Link](https://api.quickfile.co.uk/d/v1_2/Supplier_Get)
search | [Link](https://api.quickfile.co.uk/d/v1_2/Supplier_Search)

#### System

Function | API Docs
--|--
createNote | [Link](https://api.quickfile.co.uk/d/v1_2/System_CreateNote)
searchEvents | [Link](https://api.quickfile.co.uk/d/v1_2/System_SearchEvents)
getAccountDetails | [Link](https://api.quickfile.co.uk/d/v1_2/System_GetAccountDetails)

### Is this library supported by QuickFile?

No, this is an unofficial library

### How is the data sent to QuickFile?

The data is always sent using HTTPS, using the Guzzle HTTP library. Guzzle will use cURL, but it's not required. Please see the [Guzzle Website](http://docs.guzzlephp.org/en/latest/overview.html) for information.

### I've found a bug, where do I report it?

If it's a security bug relating to the API, you can post it to the [QuickFile forum](https://community.quickfile.co.uk). If it's a bug with the library, please open an issue. If it's a security issue, please contact us through [our website](https://roseblade.media) before posting it publicly.

### What is API Partners?

QuickFile operates a scheme called API Partners:

> As an API Partner we provide you with a framework you can use so you can tell other users about your API product

Check out their [user guide](https://support.quickfile.co.uk/t/api-partners/15344) for more info.

### How does the API partners work?

It works by you having access to a secret key which can be combined with a user's account number and token (from the [QuickFile marketplace](https://support.quickfile.co.uk/t/app-marketplace/17571)). This generates an App ID and provides you with their API key so you can then interact with their account on their behalf.
