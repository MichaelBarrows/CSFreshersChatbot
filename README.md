## Edge Hill University Computer Science Department Chatbot and FAQ's website.
Created by Michael Barrows (22686134)

### Installation
To install the required dependencies for the Chatbot Driven Mobile Web Application and the FAQ's Mobile Website, please complete the following commands within the `chatbot_and_faqs` folder in order:
```
composer install
npm install
```
Then, open the .env file and put your database information into the `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` fields and save the file.

Please open the `codeception.yml` file and replace the `?` in the database credentials with your own.

To create and seed the database once the database credentials have been provided, run the following command:
```
php artisan run:database
```

At this point, installation should be complete and you can run the application using built in server:
```
php artisan serve
```

The Chatbot will now be available from `http://localhost:8000/chat/`

The FAQ's website will now be available from `http://localhost:8000/faqs/`

### Default Settings
Please not that by default, the chatbot will use the keyword extractor API. This can be disabled by changing directories to `chatbot_and_faqs/database/seeds` and open the `ChatbotSettingsTableSeeder.php` file, and replacing `true` with `false` on line `16`

If you wish to make use of the keywords extractor API, then please follow the instructions within that folder to set up and run the API.

###### To have the keyword extractor API generate keywords, please complete the following steps:
If you have changed the default setting from `true` to `false` in  `chatbot_and_faqs/database/seeds/ChatbotSettingsTableSeeder.php`, you should change it back to true before continuing.

In the `DatabaseSeeder.php` file within the `chatbot_and_faqs/database/seeds` directory, you should comment out lines 26 and 27, so that the seed data does not get pushed to the database.

Then, please run the following command to refresh the database and serve the application (if it isn't already):
```
php artisan run:database
php artisan serve
```

and go to the following URL: `http://localhost:8000/chat/`
###### Please note:
The page will take some time to load as it performs the natural language processing on all of the questions in the database.




### Testing
To execute the tests, a number of commands must be run in separate console windows:
```
php artisan serve
./node_modules/phantomjs-prebuilt/bin/phantomjs --webdriver=4444
./vendor/bin/codecept run
```
