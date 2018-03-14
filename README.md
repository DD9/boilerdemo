# boilerdemo
Repo for the Boiler demo site: https://boiler.dd9.com

Due to complexities of submodule & subtree workflows, it is best to just clone copies of Boiler theme into `wp-content/themes/` and work on them as needed.

----------

## Compile Boiler (NPM + GULP)

Configure GULP to automate several tasks, starting with minifying vendor JS files and compiling LESS/SASS

### 1. Global Setup 
Run through once on first use on current computer

- Install **Node** https://nodejs.org/en/
- Install **NPM** globally  `npm install npm -g` (Node will come installed with NPM)
- Install **gulp** globally `npm install gulp -g`
- Install **less** globally `npm install less -g`  
- (TO-DO: Add SASS instructions)
- Verify Installs

```
node -v
npm -v
gulp -v
less -v
```

### 2. Theme Setup 
Run once on first installation of theme

- Navigate to theme directory and from command line `npm install`
- Verify creation of /node_modules/ (which will be ignored by Git)

### 3. Dev Setup 
Run once every dev session

- From the theme directory and from command line `gulp`
- Verify gulp is monitoring for changes by tweaking .less and .js files



## Notes on Initial Setup (TGD/HC)

Create GitHub Repo (add contributors)

--

Create WP install on WPengine (`dd9boiler`) 

--

Add GitPush SSH keys

--

Create folder on local system (i.e. `/sites/boilerdemo/`) and navigate to that folder

```

git clone git@github.com:todditron/boilerdemo.git .
 
```

--

Create new SFTP credentials from WPE dashboard

SFTP to WPengine and pull down almost entire site (files necessary for running WP locally) into local folder.  Files include `wp-includes`, `wp-admin`, and most of the items in the root directory.

Clean up `.gitignore` as needed, copy from recent project or pull fresh `.gitignore` file from here:

http://wpengine.com/git/#toc_0

Delete `Hyper DB` and other WPE-specific must-use plugins that may have tagged along (this is sometimes optional)

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


## Local Configurations (TGD)

Create project in SublimeText (or preferred editor)

Configure XAMPP to load correct directory

XAMPP on Windows
 - update `hosts` file to include local url in `C:/Windows/System32/divers/etc` using notepad (run as administrator)
 - update `httpd-vhosts.conf` to include local url permissions in `C:/xampp/apache/conf/extra` 

--

Export/Import Database from PHPmyAdmin as needed

--


Back-up `wp-config-production.php`, should be ignored by version control, but kept for safe keeping incase we accidently overrwrite production config file.

Update `wp-config.php` to the following

```PHP

<?php

define('DB_NAME','wp_dd9boiler');
define('DB_USER','root');
define('DB_PASSWORD','[[[YOUR_PASSWORD_HERE]]]');
// define('DB_HOST','localhost');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_HOME','http://boilerdemo.localhost/');
define('WP_SITEURL','http://boilerdemo.localhost/');

$table_prefix  = 'wp_';

define('WPLANG', '');

// define('WP_DEBUG', false);
define('WP_DEBUG', true);

if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
```

--

