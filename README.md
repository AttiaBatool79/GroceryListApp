# Grocery List Home Application

Welcome to the **Grocery List Home Application**! This project helps users manage their grocery items easily by allowing them to add, view, and remove items, as well as generate reports. It is built using **XAMPP** for the server, **HTML, CSS, PHP** for the front end and backend, and **MySQL** for the database.

---

## How to Use the Application

1. **Set Up XAMPP**  
   - Download and install [XAMPP](https://www.apachefriends.org/index.html).
   - Start the **Apache** and **MySQL** services from the XAMPP control panel.

2. **Set Up the Database**  
   - Open your browser and go to `http://localhost/phpmyadmin`.
   - Create a new database and import the **database_setup.sql** file located in the `XAMPP_Setup` folder to set up your database.

3. **Running the Application**  
   - Put all the project files (PHP, HTML, CSS files) in the `htdocs` directory of XAMPP (usually found at `C:/xampp/htdocs`).
   - In your browser, go to `http://localhost/[your_project_folder_name]` to open the application.

4. **Using the Application**  
   - **Login/Signup:** Users can sign up for an account or log in to access their grocery list.
   - **Add Items:** Users can add new grocery items with details like name, quantity, and price.
   - **View Items:** Users can view all the added items and details.
   - **Generate Report:** Users can generate reports to view the total cost of the grocery items.
   - **Logout:** When done, users can log out.

---

## Project Structure

This project has the following folders:

1. **XAMPP_Setup**  
   Contains all files related to setting up and connecting XAMPP with the project.

2. **Project_Media**  
   Contains images, diagrams, and screenshots that help in visualizing the project, including pages like the login page, home dashboard, and data flow.

3. **Source_Code**  
   Contains all the code files (HTML, PHP, CSS) and other resources like images used in the project.

4. **Documentation**  
   Contains project-related documentation, including the presentation and project report.

5. **Project_Diagrams**  
   Contains project-related diagrams like the ER (Entity-Relationship) model and relational models that represent the structure of the database.

---

### XAMPP_Setup

The **`XAMPP_Setup`** folder contains files to guide you through the process of setting up XAMPP and running the project.

1. **README.md**  
   - Explains how to set up XAMPP, create a database, and run the project locally.
   
2. **xampp_installation_guide.pdf** (optional)  
   - A detailed guide to install and configure XAMPP.
   
3. **server_configuration.txt**  
   - Instructions for configuring Apache and MySQL to run the project.

4. **database_setup.sql**  
   - A SQL script that contains the structure for creating the necessary tables in the database.

---

### Project_Media

The **`Project_Media`** folder contains images and diagrams of the application. These images help to visualize the pages and flow of the project.

1. **Add_items_page.png**  
   - Screenshot of the **Add Items** page where users can add grocery items.

2. **Data_Flow_Diagram.png**  
   - Diagram showing how data flows through the system, from user input to the database.

3. **Database View.png**  
   - Shows the structure of the database, including tables and their relationships.

4. **Login_signup_page.png**  
   - Screenshot of the **Login/Signup** page for user authentication.

5. **Reports_page.png**  
   - Screenshot of the **Reports** page, where users can see a summary of their grocery list.

6. **Home_dashboard.png**  
   - Screenshot of the **Home Dashboard**, where users can view and manage their items.

7. **Logout_page.png**  
   - Screenshot of the **Logout** page for logging out of the application.

8. **View_items_page.png**  
   - Screenshot of the **View Items** page, where users can see all the added grocery items.

---

### Documentation

The **`Documentation`** folder contains important project documents, including the project report, presentation, and diagrams.

1. **Project_Report.pdf**  
   - Detailed project report that explains the entire development process, functionality, and outcomes of the project.

2. **Project_Presentation.pptx**  
   - PowerPoint presentation summarizing the project, its features, and how it works.

3. **ER_and_Relational_Model.pdf**  
   - Contains the Entity-Relationship (ER) model and relational model diagrams that represent the database structure.

---

### Project_Diagrams

The **`Project_Diagrams`** folder contains the project diagrams, including the ER and relational models.

1. **ER_Diagram.png**  
   - Diagram of the **Entity-Relationship model** showing how entities in the system are related.

2. **Relational_Model.png**  
   - Diagram of the **relational model** representing tables, keys, and relationships in the database.

---

### Source_Code

The **`Source_Code`** folder contains the actual code for the application. Here’s a list of the key files:

1. **add_item.html**  
   - HTML page to add new items to the grocery list.

2. **add_item.php**  
   - PHP script to process and store the new grocery items in the database.

3. **dashboard.php**  
   - PHP page that displays the user's dashboard with options to manage items.

4. **generate_report.php**  
   - PHP script that generates a report showing the total cost of grocery items.

5. **home.html**  
   - HTML page for the home screen of the application.

6. **home.php**  
   - PHP version of the home page that displays dynamic content based on the user's session.

7. **i.jpeg / i.jpg**  
   - Image files used for displaying in the application (e.g., logo or background).

8. **index.html**  
   - The landing page of the application.

9. **index.php**  
   - PHP version of the landing page.

10. **login.php**  
    - PHP script to handle user login.

11. **logout.php**  
    - PHP script to log the user out.

12. **signup.html**  
    - HTML page for user signup.

13. **signup.php**  
    - PHP script to process the signup form and store user details.

14. **style**  
    - Folder containing all the CSS files that style the application.

15. **style.css**  
    - Main CSS file for styling the project.

16. **test_connection.php**  
    - PHP script to test the database connection.

17. **view_items.php**  
    - PHP page to view the added grocery items.

18. **view_list.php**  
    - PHP page to view the complete grocery list.

---

## Prerequisites

To run this application, you need to have the following installed:

- **XAMPP**: For running the PHP server and MySQL database locally.
- **A web browser**: To access the application.

---

## How to Run the Application Locally

1. Install XAMPP and start the **Apache** and **MySQL** services.
2. Create a new database in `phpmyadmin` and import the **database_setup.sql** file.
3. Copy all project files to the `htdocs` directory in XAMPP (usually located at `C:/xampp/htdocs`).
4. Open your browser and type `http://localhost/[your_project_folder_name]` to run the application.

---

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

## Contributing

If you want to contribute to this project, feel free to fork the repository, make changes, and submit a pull request.

---

## Contact

For any questions, feel free to reach out via [email](mailto:attia.computerengineer079@gmail.com).

