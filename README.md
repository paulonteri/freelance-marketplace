# Freelance Marketplace

This is an online marketplace that connects people with skilled affordable labour, this helps them cut down on cost of
managing human capital. It is created from scratch without any libraries or frameworks as part of a school project.

---

## Folder structure

All the application code is located within the `freelance` folder. It is organised in an MVP structure, with the
following folders:

### Models

The Model component corresponds to all the data-related logic that the user works with. This can represent either the
data that is being transferred between the View and Controller components or any other business logic-related data.

Most of the models are simple, they only contain a few properties and a few methods and represent tables in the
database.

Most `SQL` queries are located here.

### Views

The view defines how the app's data should be displayed. It is used for all the UI logic of the application.

The `views/_layout.php` file is the main layout file that all the other views are rendered into.

### Controllers

The controller contains logic that updates the model and/or view in response to input from the users of the app.

They act as an interface between Model and View components to process all the business logic and incoming requests,
manipulate data using the Model component and interact with the Views to render the final output.

### Extra files & folders:

- **/public/index.php**: This is the main entry point of the application. All routes are defined here.
- **Router.php**: This is the main file that handles all the routing logic of the application.
- **Settings.php**: This is the main configuration file that contains all the configuration variables.
- **Database.php**: This is the main file that contains all the database connection logic.
- **/utils**: This folder contains all the utility classes that are used throughout the application.
- **/public/assets**: This folder contains all the assets that are used throughout the application.
- **public/uploads**: This folder contains all the uploaded files that are used throughout the application. It should not
  have been added to the repo - it was only added as a convenience with regard to presenting it as a school project.
- **db_schema.sql** and **db_schema.png**: These are the database schema files.
- **db_data.sql**: This is the database (backup) data file. Again, it should not
  have been added to the repo - it was only added as a convenience with regard to presenting it as a school project.

---

## Local setup

Clone the repository to your local machine.

```bash
git clone https://github.com/paulonteri/freelance-marketplace.git
```

Then you will need to install [Composer](http://getcomposer.org/) following the instructions on their site.

From the `freelance` directory, run the following command:

```bash
composer update
```

### Database

Set up a MySQL database with the following configuration as defined in `Database.php`:

```
- Database name: freelance
- Username: freelance
- Password: freelance
```

---

## Running the application

From the `freelance/public` directory, run the following command to run the application locally on port 9000:

```bash
php -S 0.0.0.0:9000
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Maintainers

Current maintainers:

* Paul Onteri - https://paulonteri.com/

## License

[MIT](https://choosealicense.com/licenses/mit/)