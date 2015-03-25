# boilerdemo
Repo for the Boiler demo site: http://boiler.dd9.com

----------

## Current Config Notes

**boilerdemo** Boiler theme official submodule:

`wp-content/themes/boilerdemo`

**boilerplay** Boiler sandbox theme subtree for experimentation:

`wp-content/themes/boilerplay`


## Notes on Initial Setup 

Create GitHub Repo (add contributors)

--

Create WP install on WPengine (dd9boiler), add SSH keys

--

Create folder on local system (i.e. /sites/boilerdemo/) and navigate to that folder

```

git clone git@github.com:dd9/boilerdemo.git .
 
```

--

SFTP to WPengine and pull down almost entire site (files necessary for running WP locally) into local folder 

Clean up .gitignore as needed, or pull fresh .gitignore file from here:

http://wpengine.com/git/#toc_0


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

#### WORKFLOW: MAKING COMMITS
**For more detailed info: [Github Primer](http://dd9.com/2012/07/git-primer/)**


*1) Open Terminal and navigate to the correct directory*
```$ cd /path/to/directory```


*2) Check the status of the directory at any time*
```
$ git status
```


*3) Make some changes*


*4) To add changes for new and existing files:*
```
$ git add .
```


*5) To remove deleted files: *
```
$ git add -u .
``` 


*6) Commit a group of changes with a message*
```
$ git commit -m 'commit message here'
```


*7) Every so often, and **ALWAYS** before "git push," merge any changes that might have been made by someone else*
```
$ git pull --rebase
```


*8) Once you are ready (doesn't need to be every commit) and have run "git pull --rebase", push your changes to github*
```
$ git push
```


*9) To then push your changes to production:*
```
$ git push production
```


----

**First Commit** as is a little different: $ git push production master


## Local Configurations 

Configure XAMPP to load correct directory


--

Export/Import Database from PHPmyAdmin as needed


--

Update wp-config.php

```PHP

<?php

define('DB_NAME','wp_dd9boiler');
define('DB_USER','root');
define('DB_PASSWORD','YOUR_PASSWORD_HERE');
define('DB_HOST','localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_HOME','http://localhost/');
define('WP_SITEURL','http://localhost/');

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

$table_prefix  = 'wp_';

define('WPLANG', '');

define('WP_DEBUG', true);

if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
```

--
