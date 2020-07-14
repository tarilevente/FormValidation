# FormValidation
php - mvc - oop

The program is using a 3rd party service: currencyconverterapi.com
It's free to try out, and my job was to work with the free trial, apikey was given. 
**********************

Unfortunately the free usage is not stabile, It's not accessible. Therefore I bought 60 pieces of currency changes from the author (50 pieces left for more tests), this way the API is working..
**********************

The apikey is should not be on github, so I sent it via email. 
OTHER WAYS exists to include the paid apikey
    - I also emailed the apikey.php file to you, it can be placed into the Document Root, next to index.php. If the apikey.php  exists in the Document Root, the program will recognise it
    - You can put it into the convertCurrency() method in Api.class.php

In case of server error of the 3rd party, I put a line of code with proper data (now it's commented out) for test the program is working..


