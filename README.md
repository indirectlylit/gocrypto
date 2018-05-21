# WordPress Base Theme
<!-- TOC -->

- [Features](#features)
	- [Notes](#notes)
- [Installation](#installation)
- [Development](#development)
- [Deployment](#deployment)

<!-- /TOC -->

## Features

* Sass for stylesheets
* Modern JavaScript
* Advanced Custom Fields Pro `TODO: Decouple the theme from ACF functions.`
* Webpack for compiling assets, and concatenating and minifying files
* Foundation for sites (6.4) with Sass and XY Grid

### Notes

All Javascript should be appropriately routed in `assets/js/routes`. The router parses a page's body element class attribute in order to conditionally load scripts on a page. Global javascript should be written in `assets/js/routes/common.js`.

## Installation
Simply clone this repo into your `wp-cotent/themes` directory and run:
```
$ yarn install
$ composer install
```
This will get the theme setup with all required dependencies.

## Development
When you are ready to start developing, run:
```
$ yarn run start
```
This will start Webpack, watch your files for changes, and recompile said changes in real time.

## Deployment
When you are ready to compile your files for production, run:
```
$ yarn run build
```
*TODO:* Add deployment workflow documentation. 
