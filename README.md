WiggleDigital MailChimp - PHP
===============

A simple library for making MailChimp API (v3) calls.

## Installation

```bash
composer require wiggledigital/mailchimp-v3-php
```

## Simple Usage
```php
$key = 'ASDFGHJKLZXCVBNM123456789'; // Your MailChimp Api Key
$client = new \WiggleDigital\MailChimp\Client($key);
 
// Getting all the lists
$lists = $client->lists()->read();
 
// You can optionally pass an id as a parameter to get a single list
$list = $client->lists('asdf12345')->read();

```