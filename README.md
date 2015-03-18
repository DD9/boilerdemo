# dd9boiler
Boiler dev and demo site: http://boiler.dd9.com

----------

## Current Config Notes

**boilerdemo** Boiler theme official submodule:

`wp-content/themes/boilerdemo`

**boilerplay** Boiler sandbox theme subtree for experimentation:

`wp-content/themes/boilerplay`


## Notes on Initial Setup 

Create GitHub Repo (add contributors)

--

Create WP install on WPengine, add SSH keys

--

Create folder on local system (i.e. /clients/dd9boiler/) and navigate to that folder

```

git clone git@github.com:dd9/dd9boiler.git .
 
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

First Commit

```

$ git add . 

$ git commit -m "initial commit"

$ git push

$ git push production master

```

--

Future Commits as per usual (i.e. `git push production` )


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
