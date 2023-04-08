# Freelance Marketplace

This is a digital freelancing marketplace that will connect talented professionals with economic opportunities and give organisations access to affordable and low-risk human capital.

It is created from scratch without any libraries or frameworks (apart from `phpmailer`) as part of a school project.

![Home page](https://user-images.githubusercontent.com/45426293/174629447-6e24c65e-eea7-40da-bd7a-12a90eddfb37.png)

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
- `public/static/`: This folder contains all the static files that are used throughout the application like CSS, JavaScript and fonts.
- `public/uploads/`: This folder contains all the uploaded files that are used throughout the application. It should
  not have been added to the repo - it was only added as a convenience with regard to presenting it as a school project.
- `utils/`: This folder contains all the utility classes that are used throughout the application.
- `tasks/`: This folder contains asynchronous tasks that should be run periodically.
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

### Local setup without Docker

You will need to install [Composer](http://getcomposer.org/) following the instructions on their site.

From the `freelance` directory, run the following command:

```bash
composer update
```

#### Database

![db_schema](https://user-images.githubusercontent.com/45426293/174633487-5b99e610-d930-4b0c-8e4b-a69e382faeae.png)

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

#### Environment variables (Optional)

Check out the environment variables used by the app in the `env.example` file.

#### Mail (Optional)

Mails are sent via `smtp.gmail.com` (Gmail). See more in `utils/Mailer.php`.

Set the following environment variables to get it working:

- `MAIL_USERNAME`: Your Gmail email address.
- `MAIL_PASSWORD`: Your Gmail password.

#### Payments (Optional)

This app curretly uses the **M-Pesa Express** (LIPA NA M-PESA Online API / STK Push) and **Business To Customer (B2C)** (Pay Outs / Bulk Disbursements) APIs. See more in `utils/JobMpesaPaymentHelper.php`.

Get started by signing up for an [MPESA Daraja API account](https://developer.safaricom.co.ke/) and set up a payment gateway for the application.

The next step is to create a new sandbox app by clicking on the Add a New App button and give it a name. Ensure you select both _Lipa na Mpesa Sandbox_ and _Mpesa Sandbox_.

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

### Local setup with Docker

Install [Docker](https://docs.docker.com/get-docker/) and [Make](https://www.gnu.org/software/make/) (optional).

#### Build containers

```bash
docker-compose build
```

OR with make

```bash
make build
```

#### Set up database

Run these commands to set up the schema and add data to the db.

See more details about the [database](#database) section.

```bash
docker-compose exec -T db mysql -u root --password=freelance freelance < ./freelance/db_schema.sql

docker-compose exec -T db mysql -u root --password=freelance freelance < ./freelance/db_data.sql
```

OR with make

```bash
make sync-db
```

#### Run containers

```bash
docker-compose up
```

OR with make

```bash
make
```

---

## Running the application

### Without docker

From the `freelance/public` directory, run the following command to run the application locally on port 9000:

```txt
php -S 0.0.0.0:9000
```

### With Docker

```bash
docker-compose up
```

OR with make

```bash
make
```

---

## How to use the system

Register at `/register` then proceed to login. Once you login you can register as a freelancer or client.

The system has three major types of users:

### 1. Freelancer

| Freelancer profile                                                                                                           | Job proposal                                                                                                           | Job                                                                                                           |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| ![Freelancer profile](https://user-images.githubusercontent.com/45426293/174631009-b7a8d5b0-38a4-4f6c-a07e-007d273ef5d1.png) | ![Job proposal](https://user-images.githubusercontent.com/45426293/174631030-1294b369-7a1d-43a8-8b4c-2569472f1221.png) | ![job](https://user-images.githubusercontent.com/45426293/174631031-8a291391-bd92-4032-88a1-a45a39c1a3c7.png) |

Once you register as a freelancer you will have access to the freelancer dashboard.

From here you have the ability to do the following:

1. View and edit your user profile.
2. View and edit your freelancer profile.
3. View jobs.
   1. Give proposals for the jobs.
   2. Withdraw your proposals.
   3. Post work for completed jobs.
   4. Rate clients after completing a job.
4. View jobs you have given proposals to (My jobs).

All of the above functionality can be accessed via the sidebar.

#### 1 a. How to give a proposal

1. From the `all jobs` page, select a job.
2. Click on the `proposal` button and fill in the form.
3. Wait for the client to accept/reject your proposal.
4. You can also choose to withdraw the proposal.
5. Once accepted, you can begin working on the job.

#### 1 b. How to complete a job and rate a freelancer

1. From the `my jobs` page, select a job.
2. Click on the `submissions/ratings` button and fill in the form to submit your work.
3. Wait for the freelancer to accept or reject the work.
4. You can then proceed to rate the freelancer.

### 2. Client

| Pay or job                                                                                                                   | My jobs                                                                                                                      | Create job                                                                                                                   |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| ![Freelancer profile](https://user-images.githubusercontent.com/45426293/174631967-e0361bcb-4c6b-4410-bb86-302744cec11f.png) | ![Freelancer profile](https://user-images.githubusercontent.com/45426293/174631958-8a173caf-9d6b-4756-89b7-4628c9fa920b.png) | ![Freelancer profile](https://user-images.githubusercontent.com/45426293/174631976-a8661741-8032-4f47-8603-08cbbbd01b48.png) |

Once you register as a client, you will access the client dashboard.

From here you have the ability to do the following:

1. View and edit your user profile.
2. View and edit your freelancer profile.
3. View your jobs.
   1. View proposals given to your jobs.
      1. Accept/reject proposals.
   2. View work for completed jobs.
   3. Rate freelancers after completing a job.
4. Post jobs.
5. View freelancers.

All of the above functionality can be accessed via the sidebar.

#### 2 a. How to post a job

1. Click on post job on the sidebar.
2. Fill in the job details.
3. Wait to receive proposals from freelancers.

#### 2 b. How to view proposals

1. From a job, click on `view proposals`.
2. Click on a proposal to accept/reject it. You can only accept one proposal.

#### 2 c. How to see work for a completed job and rate freelancer

1. From a job, click on `review and complete`.
2. You will see the work if the freelancer has completed the work.
3. Accept/reject the work and proceed to rate the freelancer.

### 3. Admin

| Jobs report                                                                                                            | User logs                                                                                                           |
| ---------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------- |
| ![Jobs report)](https://user-images.githubusercontent.com/45426293/174629686-98667e71-3901-416e-8ade-73184e964094.png) | ![User logs](https://user-images.githubusercontent.com/45426293/174629627-00667b3f-3809-464e-9522-df77c4840398.png) |

Can see various reports and user logs via the admin section.

Admins can give other users admin rights by visting their profiles via the admin.

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
