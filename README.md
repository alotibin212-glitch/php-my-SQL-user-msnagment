
# Registered Users Database 👥

A clean, full-stack web application designed to manage user records. This project features a PHP backend integrated with a remote MySQL database to seamlessly register users and dynamically toggle their active status.

---

## 🔗 Live Demo
You can access and test the live website here:
👉 https://noor-db.howto.rocks/index.php

---

## 🚀 Key Features
* **Data Insertion:** A clean and responsive front-end form to add new users (Name & Age) directly into the database.
* **Dynamic Status Toggle:** Change user status instantly between **Active** and **Inactive** with a single click.
* **Database Integration:** Backed by a relational MySQL system to safely store, retrieve, and display user records in a clean table format.

---

## 📂 Project Structure
To maintain security, the repository is structured as follows:
* **`index.php`**: The main interface containing the HTML structure, CSS styling, and PHP logic to fetch and display the users' table.
* *(Excluded)* **`db.php`**: The configuration file establishing the secure bridge to the remote MySQL database (kept private to secure credentials).

---

## 📸 Deployment & System Setup

### 1. Database Structure (phpMyAdmin)
The database contains a table named `users` structured as follows:
* `id` (INT, Primary Key, Auto-Increment)
* `name` (VARCHAR)
* `age` (INT)
* `status` (TINYINT, where `1` = Active, `0` = Inactive)
