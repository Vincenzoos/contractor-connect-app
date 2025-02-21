# Contractor Connect Application
A web application that enables organizations to outsource contractors for their projects

---

# Authors
- Viet Quoc Tran (33810672) - vtra0041@student.monash.edu
- Jiahuan He (31492185) - jhee0074@student.monash.edu
- Submission Date: 01/11/2024
---

# Repository
- Clone with HTTPS:
    ```bash
  https://github.com/Vincenzoos/contractor-connect-app.git
    ```
- Clone with SSH:
    ```bash
  git@github.com:Vincenzoos/contractor-connect-app.git
    ```
---

# Application Information and Credentials
_Note: this account is for demonstration purposes only._
- Business name: Jims Connect
- Business Owner: Nathan Jims
- email: nathan.recruiter@example.com
- password: L34fddFmvzxD

---

# Database Schema:
- [app schema](database/fit2104_a5_schema.sql)

---

# Entity Relationship Diagram (ERD)
- [Logical diagram](docs/erd/fit2104-a5-logical.png)

---

# Features:
- User Authentication & Management
  - ✅ Business staff can log in and access system functionalities.
  - ✅ Customers (organizations and contractors) can register as partners with Jims Connect.

- Project Management
  - ✅ CRUD operations: Create, Read, Update, Delete projects.
  - ✅ Update project details (name, progress, status, deadlines, etc.).
  - ✅ Link projects to contractors or organizations.

- Contractor & Organization Management
  - ✅ Manage contractor details (name, phone, profile picture, skills, etc.).
  - ✅ Manage organization details (name, contact info, industry, website, related projects, etc.).

- Contact Management
  - ✅ Handle new contractor and organization partnership requests.
  - ✅ Track and update contact statuses and details.


---

# Design Rationale
- [design_proposal](docs/rationale/design_proposal.pdf)
- [design_rationale](docs/rationale/design_rationale.pdf)

---

# Tech Stack
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: CakePHP
- **Database**: MySQL
- **Hosting**: XAMPP, phpMyAdmin

---

# Application Screenshots
## Landing pages
  - Homepage
  ![Home Page](docs/app_screenshots/public_page/homepage.png)

  - About Us
    ![About Us](docs/app_screenshots/public_page/about_page.png)

  - Service
    ![Service](docs/app_screenshots/public_page/service_page.png)

## Authentication
  - Staff Login
    ![login](docs/app_screenshots/public_page/login_page.png)

  - Contractor Registration
    ![Contractor Registration](docs/app_screenshots/public_page/contractor_registration_page.png)

  - Organisation Registration
    ![Organisation Registration](docs/app_screenshots/public_page/organisation_registration_page.png)

## Project Management
  - Project Listing
    ![Project Listing](docs/app_screenshots/private_page/project_listing_page.png)

  - Project Filtering
    ![Project Filter](docs/app_screenshots/private_page/project_filter_functionality.png)

  - Project Adding
    ![Project Add](docs/app_screenshots/private_page/project_add_page.png)

  - Project Inspecting
    ![Project Read](docs/app_screenshots/private_page/project_read_page.png)

  - Project Editing
    ![Project Edit](docs/app_screenshots/private_page/project_edit_page.png)

  - Project Deleting
    ![Project Delete](docs/app_screenshots/private_page/project_delete_page.png)

## Contractors Management
  - Contractor Listing
      ![Project Listing](docs/app_screenshots/private_page/contractor_listing_page.png)

  - Contractor Filtering
    ![Contractor Filter](docs/app_screenshots/private_page/contractor_filter_functionality.png)

  - Contractor Adding
    ![Contractor Add](docs/app_screenshots/private_page/contractor_add_page.png)

  - Contractor Inspecting
    ![Contractor Read](docs/app_screenshots/private_page/contractor_read_page.png)

  - Contractor Editing
    ![Contractor Edit](docs/app_screenshots/private_page/contractor_edit_page.png)

  - Contractor Deleting
    ![Contractor Delete](docs/app_screenshots/private_page/contractor_delete_page.png)

## Organisation Management
  - Organisation Listing
    ![Organisation Listing](docs/app_screenshots/private_page/organisation_listing_page.png)

  - Organisation Filtering
    ![Organisation Filter](docs/app_screenshots/private_page/organisation_filter_functionality.png)

  - Organisation Adding
    ![Organisation Add](docs/app_screenshots/private_page/organisation_add_page.png)

  - Organisation Adding
    ![Organisation Read](docs/app_screenshots/private_page/organisation_read_page.png)

  - Organisation Editing
    ![Organisation Edit](docs/app_screenshots/private_page/organisation_edit_page.png)

  - Organisation Deleting
    ![Organisation Delete](docs/app_screenshots/private_page/organisation_delete_page.png)

## Contacts Management
  - Contact listing
      ![Contact Listing](docs/app_screenshots/private_page/contact_listing_page.png)

  - Contact Filtering
    ![Contact Filter](docs/app_screenshots/private_page/contact_filter_functionality.png)

  - Contact Adding
    ![Organisation Add](docs/app_screenshots/private_page/contact_add_page.png)

  - Contact Inspecting
    ![Contact Read](docs/app_screenshots/private_page/contact_read_page.png)

  - Contact Editing
    ![Contact Edit](docs/app_screenshots/private_page/contact_edit_page.png)

  - Contact Deleting
    ![Contact Delete](docs/app_screenshots/private_page/contact_delete_page.png)

---

# Application Installation
- ## Prerequisite:
  - 🔹 Install XAMPP
  - 🔹 Install PHPStorm
  - 🔹 Install CakePHP

- ## Installation Steps
  1. **Set Up XAMPP**
     - Run XAMPP as an administrator.
     - Start Apache and MySQL.

  2. **Create a user in phpMyAdmin**
      - Follow instruction here: https://youtu.be/6mOA53bR_B8?feature=shared

  3. **Database Configuration**
     - Create a new database with:
       - Database Name: username_databasename
       - Collation: utf8mb4_general_ci
     - Import the [app schema](database/fit2104_a5_schema.sql).
     - Ensure foreign key checks are disabled before importing.
     ![Schema Import](docs/erd/schema_import.png)

  4. **Clone & Deploy the Application**
     - Clone the repository inside the htdocs folder.
     - Access the app via: http://localhost/your_folder_name

---

# External Code references:
- file upload:[CakePHP Upload Plugin](https://cakephp-upload.readthedocs.io/en/latest/configuration.html)
- authentication plugin: [CakePHP Authentication](https://book.cakephp.org/authentication/3/en/index.html)
- Kill session: [How to Destroy a Session](https://book.cakephp.org/1.3/en/The-Manual/Core-Components/Sessions.html#destroy)

