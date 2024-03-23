<?php
namespace ProcessWire;

use Dotenv\Dotenv;

/**
 * ProcessWire Configuration File
 *
 * Site-specific configuration for ProcessWire
 *
 * Please see the file /wire/config.php which contains all configuration options you may
 * specify here. Simply copy any of the configuration options from that file and paste
 * them into this file in order to modify them.
 * 
 * SECURITY NOTICE
 * In non-dedicated environments, you should lock down the permissions of this file so
 * that it cannot be seen by other users on the system. For more information, please
 * see the config.php section at: https://processwire.com/docs/security/file-permissions/
 * 
 * This file is licensed under the MIT license
 * https://processwire.com/about/license/mit/
 *
 * ProcessWire 3.x, Copyright 2023 by Ryan Cramer
 * https://processwire.com
 *
 */

if (!defined('PROCESSWIRE'))
  die();

Dotenv::createImmutable(dirname(__DIR__, 2), '.processwire_env')->load();

/** @var Config $config */

/*** SITE CONFIG *************************************************************************/

// Let core API vars also be functions? So you can use $page or page(), for example.
$config->useFunctionsAPI = true;

// Use custom Page classes in /site/classes/ ? (i.e. template "home" => HomePage.php)
$config->usePageClasses = true;

// Use Markup Regions? (https://processwire.com/docs/front-end/output/markup-regions/)
$config->useMarkupRegions = true;

// Prepend this file in /site/templates/ to any rendered template files
$config->prependTemplateFile = '_init.php';

// Append this file in /site/templates/ to any rendered template files
$config->appendTemplateFile = '_main.php';

// Allow template files to be compiled for backwards compatibility?
$config->templateCompile = false;

/*** INSTALLER CONFIG ********************************************************************/
/**
 * Installer: Database Configuration
 * 
 */
$config->dbHost = $_ENV['DBHOST'];
$config->dbName = $_ENV['DBNAME'];
$config->dbUser = $_ENV['DBUSER'];
$config->dbPass = $_ENV['DBPASS'];
$config->dbPort = $_ENV['DBPORT'];
$config->dbEngine = $_ENV['DBENGINE'];
/**
 * Installer: User Authentication Salt 
 * 
 * This value was randomly generated for your system on 2024/03/23.
 * This should be kept as private as a password and never stored in the database.
 * Must be retained if you migrate your site from one server to another.
 * Do not change this value, or user passwords will no longer work.
 * 
 */
$config->userAuthSalt = $_ENV['USERAUTHSALT'];

/**
 * Installer: Table Salt (General Purpose) 
 * 
 * Use this rather than userAuthSalt when a hashing salt is needed for non user 
 * authentication purposes. Like with userAuthSalt, you should never change 
 * this value or it may break internal system comparisons that use it. 
 * 
 */
$config->tableSalt = $_ENV['TABLESALT'];

/**
 * Installer: File Permission Configuration
 * 
 */
$config->chmodDir = '0755'; // permission for directories created by ProcessWire
$config->chmodFile = '0644'; // permission for files created by ProcessWire 

/**
 * Installer: Time zone setting
 * 
 */
$config->timezone = 'UTC';

/**
 * Installer: Admin theme
 * 
 */
$config->defaultAdminTheme = 'AdminThemeUikit';

/**
 * Installer: Unix timestamp of date/time installed
 * 
 * This is used to detect which when certain behaviors must be backwards compatible.
 * Please leave this value as-is.
 * 
 */
$config->installed = 1711195416;


/**
 * Installer: HTTP Hosts Whitelist
 * 
 */
$config->httpHosts = array('localhost', 'www.wvsu-usc.org', 'wvsu-usc.org');


/**
 * Installer: Debug mode?
 * 
 * When debug mode is true, errors and exceptions are visible. 
 * When false, they are not visible except to superuser and in logs. 
 * Should be true for development sites and false for live/production sites. 
 * 
 */
$config->debug = true;

