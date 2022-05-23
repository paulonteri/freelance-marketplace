# Freelance Marketplace

This is an online marketplace that connects people with skilled affordable labour, this helps them cut down on cost of
managing human capital. It is created from scratch without any libraries or frameworks as part of a school project.

---

## Folder structure

All the application code is located within the `freelance` folder. It is organised in an MVP structure, with the following folders:

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

### Extra files & folders

- `public/index.php`: This is the main entry point of the application. All routes are defined here
- `public/assets/`: This folder contains all the assets that are used throughout the application.
- `public/uploads/`: This folder contains all the uploaded files that are used throughout the application. It should
  not have been added to the repo - it was only added as a convenience with regard to presenting it as a school project.
- `utils/`: This folder contains all the utility classes that are used throughout the application.
- `Router.php`: This is the main file that handles all the routing logic of the application.
- `Settings.php`: This is the main configuration file that contains all the configuration variables.
- `Database.php`: This is the main file that contains all the database connection logic.
- `db_schema.sql` and `db_schema.png`: These are the database schema files.
- `db_data.sql`: This is the database (backup) data file. Again, it should not have been added to the repo - it was
  only added as a convenience with regard to presenting it as a school project.
- `.env.example`: contains all environment variables that should be set.

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

Set up a MySQL database on your local machine with the following configuration as defined in `Database.php`:

```txt
- Database name: freelance
- Username: freelance
- Password: freelance
```

You can alternatively use a database connection string to connect a database by setting the `CLEARDB_DATABASE_URL` environment variable.

**Set up schema:**

Use the SQL in the `db_schema.sql` file to create the database schema.

**Set up data (Optional):**

Use the SQL in the `db_data.sql` file to populate the database with some data.

### Environment variables (Optional)

Check out the environment variables used by the app in the `env.example` file.

### Mail (Optional)

Mails are sent via `smtp.gmail.com` (Gmail). See more in `utils/Mailer.php`.

Set the following environment variables to get it working:

- `MAIL_USERNAME`: Your Gmail email address.
- `MAIL_PASSWORD`: Your Gmail password.

### Payments (Optional)

This app curretly uses the **M-Pesa Express** (LIPA NA M-PESA Online API / STK Push) and **Business To Customer (B2C)** (Pay Outs / Bulk Disbursements) APIs. See more in `utils/JobMpesaPaymentHelper.php`.

Get started by signing up for an [MPESA Daraja API account](https://developer.safaricom.co.ke/) and set up a payment gateway for the application.

The next step is to create a new sandbox app by clicking on the Add a New App button and give it a name. Ensure you select both *Lipa na Mpesa Sandbox* and *Mpesa Sandbox*.

Take note of the following from the dashboard and set them as environment variables:

- `MPESA_CONSUMER_KEY`
- `MPESA_CONSUMER_SECRET`
- `MPESA_PASSKEY`
- `MPESA_SECURITY_CREDENTIAL`
- `MPESA_BUSINESS_SHORT_CODE`

Tip, the above can be easily found from the [API simulators](https://developer.safaricom.co.ke/APIs) in the Safaricom developer portal.

Note that for the Mpesa callbacks to work the app must be accessible from the internet and the correct host has been set via the `HOST_URL` environment variable.

Once ready to go for live payments, set the `MPESA_ENV` to `live`. The default is `sandbox`.

Learn more from the MPESA documentation [here](https://developer.safaricom.co.ke/Documentation).

---

## Running the application

From the `freelance/public` directory, run the following command to run the application locally on port 9000:

```txt
php -S 0.0.0.0:9000
```

---

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

---

## Maintainers

Current maintainers:

- Paul Onteri - <https://paulonteri.com>

---

## License

[Apache License 2.0](http://www.apache.org/licenses/LICENSE-2.0)
