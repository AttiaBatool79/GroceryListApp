# Project Diagram

The `Project_Diagram` folder contains the **ER diagram** and **Relational Model** for the database design of the project. It helps visualize the structure of the database, its entities, and how they are linked.

### What's inside the `Project_Diagram` folder:

1. **ER Diagram (ER_Diagram.png)**  
   - A **graphical representation** of the database, showing the **entities** (tables) and the **relationships** between them.
   - The diagram also shows **primary keys** (PK) and **foreign keys** (FK) that link tables together.

2. **Relational Model (Relational model.png)**  
   - A **textual representation** of the database schema, showing how the tables are created and how the **relationships** are defined.
   - In this file, you'll find:
     - **Table Creation Statements**: SQL code that defines each table, its columns, and their data types.
     - **Primary Keys (PK)**: Uniquely identifies each record in a table.
     - **Foreign Keys (FK)**: Links tables together, showing how data in one table corresponds to data in another.

### Example of How Tables are Linked:

Here’s a basic example of how tables are related:

1. **Grocery List Table** (`grocery_list`):
   - Contains information about each grocery item.
   - Has a **primary key** `id` to uniquely identify each record.

2. **Users Table** (`users`):
   - Contains user details (e.g., name, email).
   - Has a **primary key** `user_id` to uniquely identify each user.

3. **Relationship**:
   - The **Grocery List Table** has a **foreign key** `user_id` that references the **Users Table**.
   - This means that each grocery list is associated with a specific user.

### SQL Example:

```sql
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE grocery_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100),
    quantity INT,
    price DECIMAL(10, 2),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
