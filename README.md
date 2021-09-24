# ClinicPlus

### LOGIN USERS
Role: Username, Password
* Superadmin:     superadmin@hms.com, 12345
* Admin:          admin@hms.com, 12345
* Doctor:         doctor@hms.com, 12345
* Patient:        patient@hms.com, 12345
* Nurse:          nurse@hms.com, 12345
* Pharmacist:     pharmacist@hms.com, 12345
* Accountant:     accountant@hms.com, 12345
* Laboratorist:   laboratorist@hms.com, 12345
* Receptionist:   receptionist@hms.com, 12345

## Installation
1. Upload zipped file Multi-Hms.zip to your server directory and unzip there.
2. Create a database.
3. Go to the Database file application/config/database.php and fill up with your database details.
  * $db['default']['hostname'] = 'localhost';
  * $db['default']['database'] = 'clinicplus';
  * $db['default']['username'] = 'root';
  * $db['default']['password'] = '';
4. Import the .sql file into your database from the Database folder.
5. Upload the .htaccess file from htaccess folder into the server directory.
Its Done !!!!

## Server Requirements
Software Framework: CodeIgniter,
* PHP version: PHP 5.4 - PHP 7.1 (JUST FOR THE SAKE OF THE PROJECT).
* Languages: JavaScript (JS), HTML, CSS, PHP & SQL.
* Browser compatibility: IE8, IE9, IE10, IE11, Firefox, Safari, Opera, Chrome
