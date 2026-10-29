![University Study Plan Manager](assets/cover.png)

# University Study Plan Manager

A web application developed as an academic project for the *Progettazione di servizi web e reti di calcolatori* (Web Services Design and Computer Networks) course (2021–2022) at Politecnico di Torino.

The application simulates a university study plan management system, allowing students to select courses and academic administrators to manage the course catalogue.

## Technologies

- **PHP** — Server-side application logic and session management
- **MySQL / MariaDB** — Relational database
- **HTML5** — Page structure and forms
- **CSS3** — User interface styling
- **SQL** — Data retrieval and manipulation

## Features

### Student

- Log in using student credentials
- Browse available courses
- Select courses for a study plan
- Calculate the total number of selected credits
- Validate the study plan against academic requirements
- Confirm or cancel the selection

### Administrator

- Log in using administrator credentials
- View the course catalogue
- Activate or deactivate courses
- Add new courses with input validation

## Project Structure

```text
EsamePWR/
├── azioniForm/       # Form handlers and application actions
├── altrePagine/      # Confirmation and result pages
├── altro/            # Shared components and CSS
├── config/           # Database configuration template
├── database/         # Demo SQL database
├── pagine/           # Main application pages
├── .gitignore
└── README.md
```

## Local Setup

**Requirements:** PHP with the MySQLi extension, MySQL or MariaDB, and a local web server such as Apache (XAMPP is supported).

1. Place the project in your web server's document root.
2. Start Apache and MySQL/MariaDB.
3. Import `database/database.sql` into a new database environment.
4. Create two MySQL users with permissions limited to the `pianostudi` database:
   - `uRO`: `SELECT`
   - `uRW`: `SELECT`, `INSERT`, `UPDATE`, `DELETE`
5. Copy `config/database.example.php` to `config/database.local.php`.
6. Update `database.local.php` with your local database credentials.
7. Open the project in your browser through your local web server.

The local configuration file is excluded from Git to prevent database credentials from being committed.

## Demo Accounts

The SQL script includes fictional accounts for local testing.

| Role | Username | Password |
|---|---|---|
| Administrator | `r900` | `DemoAdmin2026!` |
| Student (Computer Engineering) | `s901` | `DemoStudent2026!` |
| Student (Management Engineering) | `s902` | `DemoStudent2026!` |

These credentials are for demonstration purposes only and must not be used for real accounts.

## Academic Context

This project was originally developed during the 2021–2022 academic year as part of a university assignment.

The repository preserves the original PHP-based architecture, with adjustments for local execution, configuration management, input validation, and safer database queries.

## Security Notes

This is an educational project, **not a production-ready authentication system**.

The original database schema stores user passwords in plaintext to remain compatible with the assignment's authentication mechanism. A production implementation would require password hashing, CSRF protection, stronger authorization checks, and additional security hardening.

## Author

Letizia Pontarolo

GitHub: https://github.com/letiziapontarolo
