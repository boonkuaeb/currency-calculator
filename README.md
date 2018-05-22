Installation
============

Applications that use Symfony Flex
----------------------------------
Uses git command to clone the source code.

    $ git@github.com:boonkuaeb/currency-calculator.git

'cd' to directory

    $ cd currency-calculator/


Open a command console, enter your project directory and execute:


    $ composer install

Try to start the Application.

    $ php -S 127.0.0.1:8000 -t public 


Open browser and go to url 'http://localhost:8000/'
As you can see. The Application can not calculate currency rate.
Because we need to install Symfony Bundle

Install FxRateBundle 

    $ composer require boonkuaeboonsutta/fx-rate-bundle
    
    
    
Create 'config/routes/bk_fx_rate.yml' file. A File contain as below

    _bk_fx_rate:
        resource: '@BKFxRateBundle/Resources/config/routes.xml'
        prefix: /api/fxrate/

    
Create anathor file at 'config/packages/bk_fx_rate.yml'

    bk_fx_rate :
      endpoints : https://forex.1forge.com/1.0.3/convert
      api_key : EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS
      


Let try to calculate currency rate again.