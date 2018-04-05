# boilerdemo
Repo for the Boiler demo site: http://boiler.dd9.com

----------


## Project-Specific Notes

[Project notes goe here]


## Project Setup (w/ WPengine Workflow)

Create GitHub Repo (add contributors)

--

Create WP install on WPengine (`dd9boiler`)

Add GitPush Developer SSH keys

--

Create folder on local system (i.e. `/sites/boilerdemo/`) and navigate to that folder

```

git clone git@github.com:todditron/boilerdemo.git .
 
```

--

Create Project in Dreamweaver or other SFTP program

SFTP to WPengine and pull down almost entire site (files necessary for running WP locally) into local folder 

Clean up `.gitignore` as needed, or pull fresh `.gitignore` file from here:

http://wpengine.com/git/#toc_0

Delete `Hyper DB` and other WPE-specific must-use plugins that may have tagged along

--

```

git remote add production git@git.wpengine.com:production/dd9boiler.git

git remote add staging git@git.wpengine.com:staging/dd9boiler.git

```

Verify Remote Permissions

```

ssh git@git.wpengine.com info

```

--


## Local Configurations (Mostly TGD)

Create project in SublimeText (or preferred editor)

Configure XAMPP to load correct directory

XAMPP on Windows
 - update `hosts` file to include local url in `C:/Windows/System32/divers/etc` using notepad (run as administrator)
 - update `httpd-vhosts.conf` to include local url permissions in `C:/xampp/apache/conf/extra` 

--

Export/Import Database from PHPmyAdmin as needed

--


Back-up `wp-config-production.php`, should be ignored by version control, but kept for safe keeping incase we accidently overrwrite production config file.

Update and customize `wp-config.php` to the following

```PHP

<?php

define('DB_NAME','wp_[PROJECT_DB_HERE]');
define('DB_USER','root');
define('DB_PASSWORD','[YOUR_PASSWORD_HERE]');
// define('DB_HOST','localhost');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_HOME','http://PROJECTURL.localhost/');
define('WP_SITEURL','http://PROJECTURL.localhost/');

$table_prefix  = 'wp_';

define('WPLANG', '');

// define('WP_DEBUG', false);
define('WP_DEBUG', true);

if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
```

--

## Install & Run Boiler Theme

https://github.com/DD9/boiler2

Create new theme directory (i.e. `/wp-content/themes/PROJECT_THEME/`)

Copy Boiler2 theme into directory

**Important: If you use `git clone git@github.com:dd9/boiler2.git .` to load Boiler2, make sure to delete `.git/` and `.gitignore` from the theme directory.** You will not be able to push the theme to WPengine if it is assocaited with another GitHub repository 

Refer to the Boiler 2 ReadMe for instructions on configuring and running the Boiler2 theme 
