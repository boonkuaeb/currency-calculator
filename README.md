Installation
============

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

.. code-block:: bash

    $ composer install

After install dependency package. try this command to start app.
.. code-block:: bash

    $ php -S 127.0.0.1:8000 -t public 


Open browser and go to url 'http://localhost:8000/'
As you can see. The Application can not calculate currency rate.
Because we need to install Symfony Bundle

Install FxRateBundle 
.. code-block:: bash

    $ composer require boonkuaeboonsutta/fx-rate-bundle
    
    
    
Create 'config/routes/bk_fx_rate.yml' file. File contain as below
.. code-block:: bash

    _bk_fx_rate:
        resource: '@BKFxRateBundle/Resources/config/routes.xml'
        prefix: /api/fxrate/

    
Create anathor file at 'config/packages/bk_fx_rate.yml'
.. code-block:: bash

    bk_fx_rate :
      endpoints : https://forex.1forge.com/1.0.3/convert
      api_key : EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS