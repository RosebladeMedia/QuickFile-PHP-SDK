# Changelog

## v2.3.0beta 2024-04-29

* Added a separate data prepare, so data can be set up and stored prior to the call being made, if required

## v2.2.0beta 2022-06-30

* Added support for [API Partners](https://support.quickfile.co.uk/t/api-partners/15344)

## v2.0.0beta 2022-06-05

* Updated Guzzle HTTP to 7.4 due to security advisories
* Updated requirement to PHP 8
* Added support for more endpoints
* Breaking changes include:
  * Change of some endpoint function names
  * Consistent variables for functions across all endpoints

## v1.1.6beta 2018-11-27

* Switched variables in sendToEndPoint

## v1.1.5beta 2018-09-17

* Added generic endpoint for un-supported API commands
* Updated composer.json

## v1.1.3beta 2018-09-06

* Fixed returned variables with client_update and client_delete
* Added support for [supplier](https://api.quickfile.co.uk/method/supplier) methods

## v1.0.1beta 2018-09-05

* Fixed issue with client_delete

## v1.0.0beta 2018-08-29

* Initial commit, including support for:
  * Clients
  * Invoices
  * Ledger
