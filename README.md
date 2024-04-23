# WordPress minimum theme template

## Structure

```
theme-root:
	- assets # design
		- css
		- js
		- images
	- prats # components
		- headers
			- components
		- footers
	- templates # page template
	- inc # for functions.php
		- shortcodes # shortcode
		- functions # function
		- management # admin 
		- custom-posts.php # custom post
		- enqueue-scripts-css.php # js, css
	- style.css
	- index.php
	- functions.php
	- screenshot.png
  - header.php
  - footer.php
	...
```

## phpcs and phpcbf

1. `cd VSCode root`
2. `composer global require "squizlabs/php_codesniffer=*"`
3. `/Users/{user name}/.composer/vendor/bin/phpcs --version` -> skippable
4. `echo 'export PATH=$HOME/.composer/vendor/bin:$PATH' >> ~/.bashrc`
5. `source ~/.bashrc`
6. `phpcs --version`
7. `composer global require wp-coding-standards/wpcs`
8. `phpcs --config-set default_standard WordPress`
9. `phpcs -i`
10. `The installed coding standards are PEAR, Zend, PSR2, MySource, Squiz, PSR1, PSR12, WordPress, ...`
11. Add VSCode extentions
  - `ikappas.phpcs`
  - `persoderlind.vscode-phpcbf`
12. edit `.vscode/settings.json`

```settings.json
{
    "editor.detectIndentation": false,
    "editor.insertSpaces": false,
    "editor.tabSize": 4,
    "files.eol": "\n",
    "phpcs.executablePath": "/home/{user name}/.composer/vendor/bin/phpcs",
    "phpcbf.executablePath": "/home/{user name}/.composer/vendor/bin/phpcbf",
    "phpcs.standard": "WordPress",
    "phpcbf.standard": "WordPress",
    "phpcbf.onsave": true
}
```

