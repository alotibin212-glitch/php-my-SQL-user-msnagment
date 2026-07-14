
# php My SQL user managment 👥

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
<img width="1920" height="938" alt="لقطة شاشة 2026-07-14 143051" src="https://github.com/user-attachments/assets/b97cfe4a-43d6-4f13-bdaa-c2611bcfc529" />

### 2. Web Hosting File Directory
This section demonstrates the deployed files under the main public directory on the production server (such as `htdocs` or `public_html`), connecting our PHP frontend scripts securely with the live database.
<img width="1920" height="960" alt="لقطة شاشة 2026-07-14 142125" src="https://github.com/user-attachments/assets/e8b34ff0-2636-4bb8-bbda-e297e0d697fc" />



