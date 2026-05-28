# SIWES Electronic Logbook System

A web-based logbook management system for SIWES (Students Industrial Work Experience Scheme) students in Nigeria. Students log daily work activities digitally, and supervisors can view and add remarks — replacing the traditional paper logbook.

## Features

- Student registration and secure login
- Daily activity logging with date tracking
- View full logbook history
- Supervisor login and registration
- Supervisor can search and view student records
- Supervisor can add remarks/signatures to student entries
- Secure password hashing (bcrypt)
- PDO prepared statements (SQL injection protection)
- Clean responsive UI

## Tech Stack

- PHP 8+
- MySQL
- HTML5 / CSS3
- PDO (database layer)

## Setup

1. Clone the repository
2. Import `siwes.sql` into your MySQL database
3. Copy `.env.example` to `.env` and update with your database credentials
4. Run on a local server (XAMPP / WAMP / Laragon)
5. Visit `http://localhost/siwes-logbook`

## Security Improvements

- Passwords hashed with `password_hash()` (bcrypt)
- All queries use PDO prepared statements — no SQL injection
- Session validation on all protected pages
- Output escaped with `htmlspecialchars()` — no XSS
- No credentials hardcoded in source code

## Project Structure

```
siwes-logbook/
├── index.php
├── .env.example
├── siwes.sql
├── css/
│   └── style.css
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── student/
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── view.php
│   └── logout.php
└── supervisor/
    ├── login.php
    ├── register.php
    ├── dashboard.php
    ├── view.php
    └── logout.php
```

## Author

Bolutife Akinlawon — [GitHub](https://github.com/BoluAkinlawon) | [LinkedIn](https://www.linkedin.com/in/bolutife-akinlawon-623784193/)
