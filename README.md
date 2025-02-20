# Contractor Connect Application
An App to allow organization to outsource contractors for their projects

# TODO:
- Add UI prototype and presentation to show the rationale behind the design
- Add a description of the app, its features, tech stack used, etc.
- Add real images of the app to showcase its functionalities

# Authors:
- Viet Quoc Tran (33810672) - email:vtra0041@student.monash.edu - submission date: 1/11/2024
- Jiahuan He (31492185) - email: - jhee0074@student.monash.edu submission date: 1/11/2024


# Repo:
- Clone with HTTPS: https://github.com/Vincenzoos/contractor-connect-app.git
- Clone with SSH: git@github.com:Vincenzoos/contractor-connect-app.git

# Application Credentials:
- Business Owner: Nathan Jims
- email: nathan.recruiter@example.com
- password: L34fddFmvzxD


# Schema:
- [fit2104_a5_schema.sql](database/fit2104_a5_schema.sql)

# ER Diagram
- [logical_diagram](docs/erd/fit2104-a5-logical.png)

# Features:
- Allows business staff to log in and use the system
- Allows customers (organisations and contractors) to become a partner with Jims Connect
- Allows staff to manage projects in the system (i.e. CRUD, update project info such as name progress status, check date, link project to different contractor or organisation)
- Allows staff to manage contractors in the system (i.e. CRUD, update personal info such as name, phone number, profile pic, skills)
- Allows staff to manage organisations in the system (i.e. CRUD, update info such as name, contact phone number, projects related, industry, website)
- Allows staff to manage contacts, new contractors, organisations who want to become partner with Jims Connect (i.e. CRUD, update replied status, contact details, etc)

# Rationale
- [design_proposal](docs/rationale/design_proposal.pdf)
- [design_rationale](docs/rationale/design_rationale.pdf)
# App Demonstration Screenshots
- Landing pages
  - Homepage
  ![Home Page](docs/app_screenshots/public_page/homepage.png)

  - About Us
    ![About Us](docs/app_screenshots/public_page/about_page.png)

  - Service
    ![Service](docs/app_screenshots/public_page/service_page.png)

- Business staff and business customer Authentication
  - Staff Authentication
    ![login](docs/app_screenshots/public_page/login_page.png)

  - Contractor Registration
    ![Contractor Registration](docs/app_screenshots/public_page/contractor_registration_page.png)

  - Organisation Registration
    ![Organisation Registration](docs/app_screenshots/public_page/organisation_registration_page.png)

- Manages Projects
  - Project listing
    ![Project Listing](docs/app_screenshots/private_page/project_listing_page.png)

  - Filter Project
    ![Project Filter](docs/app_screenshots/private_page/project_filter_functionality.png)

  - Create new Project
    ![Project Add](docs/app_screenshots/private_page/project_add_page.png)

  - Read Project
    ![Project Read](docs/app_screenshots/private_page/project_read_page.png)

  - Edit Project
    ![Project Edit](docs/app_screenshots/private_page/project_edit_page.png)

  - Delete Project
    ![Project Delete](docs/app_screenshots/private_page/project_delete_page.png)

- Manges Contractors
  - Contractor listing
      ![Project Listing](docs/app_screenshots/private_page/contractor_listing_page.png)

  - Filter Contractor
    ![Contractor Filter](docs/app_screenshots/private_page/contractor_filter_functionality.png)

  - Create new Contractor
    ![Contractor Add](docs/app_screenshots/private_page/contractor_add_page.png)

  - Read Contractor
    ![Contractor Read](docs/app_screenshots/private_page/contractor_read_page.png)

  - Edit Contractor
    ![Contractor Edit](docs/app_screenshots/private_page/contractor_edit_page.png)

  - Delete Contractor
    ![Contractor Delete](docs/app_screenshots/private_page/contractor_delete_page.png)

- Manages Organisation
  - Organisation listing
    ![Organisation Listing](docs/app_screenshots/private_page/organisation_listing_page.png)

  - Filter Organisation
    ![Organisation Filter](docs/app_screenshots/private_page/organisation_filter_functionality.png)

  - Create new Organisation
    ![Organisation Add](docs/app_screenshots/private_page/organisation_add_page.png)

  - Read Organisation
    ![Organisation Read](docs/app_screenshots/private_page/organisation_read_page.png)

  - Edit Organisation
    ![Organisation Edit](docs/app_screenshots/private_page/organisation_edit_page.png)

  - Delete Organisation
    ![Organisation Delete](docs/app_screenshots/private_page/organisation_delete_page.png)

- Manages Contacts

# External Code references:
- file upload: https://cakephp-upload.readthedocs.io/en/latest/configuration.html
- authentication plugin: https://book.cakephp.org/authentication/3/en/index.html
- Kill session: https://book.cakephp.org/1.3/en/The-Manual/Core-Components/Sessions.html#destroy

