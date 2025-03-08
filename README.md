# News Management Website

## Overview

This project is a simple yet functional website designed for managing and displaying news articles. It allows users to add news, view a list of news articles, and access detailed views of individual news items. The website is built using PHP and MySQL, with a focus on clean, object-oriented programming practices. The frontend is styled using a CSS framework (e.g., Bootstrap or Tailwind) to ensure a modern and responsive design without the need for custom CSS.

---

## Functional Requirements

### 1. **Main Page**
   - Displays a list of news articles with the following details:
     - Date
     - Title (linked to the detailed page)
     - Announcement text
     - Category
   - Includes a **filter and sorting form**:
     - **Sorting**: Drop-down list to sort news by:
       - Date of addition (newest, oldest)
       - Popularity (based on view count)
     - **Filtering**: Form to filter news by:
       - Category (values fetched from the database)
       - Creation date (lower limit)

### 2. **Detailed News Page**
   - Displays the full details of a news article, including:
     - Date
     - Title
     - Category
     - View counter (incremented on each visit)
     - Detailed text
     - List of **related news** (based on similar news IDs)

### 3. **Add News Page**
   - A form to add new news articles with the following fields:
     - Date
     - Title
     - Announcement text
     - Detailed text
     - ID of similar news (multiple-choice list)
     - Author (dropdown list)
     - Category (single-choice list)
   - **Validation**: Ensures all fields are filled; displays an error if any field is empty and prevents adding the news to the database.

### 4. **Related News**
   - On the detailed news page, a list of related news articles is displayed based on the selected similar news IDs.

### 5. **View Counter**
   - Increments by 1 each time the detailed news page is accessed. No IP checks or session/cookie tracking is required.

### 6. **Sorting and Filtering**
   - **Sorting**: Implemented via a drop-down list on the main page.
   - **Filtering**: Works at the SQL query level and can be implemented with or without AJAX.

---

## Non-Functional Requirements

### Development Environment
- Built and tested on a local server (e.g., [Open Server](https://ospanel.io/) or any equivalent).
- **PHP Version**: 8.1 or higher.
- **MySQL Version**: 5.6 or 5.7.

### URL Structure
- **Main Page**: `http://<url>/`
- **Add News Page**: `http://<url>/add-news/`
- **Detailed News Page**: `http://<url>/news/?id=<database_entry_id>`

### Form Fields
- **Similar News ID**: Multiple-choice dropdown list.
- **Author**: Dropdown list.
- **Category**: Single-choice dropdown list.

### Programming Approach
- **Object-Oriented Programming (OOP)**: Use of classes and OOP principles is encouraged for better code organization and maintainability.

### Frontend Design
- **CSS Framework**: Use a CSS framework like Bootstrap or Tailwind for styling. No custom CSS is required.

---

## Technologies Used

### Backend
- **PHP 8.1+**: Server-side scripting language for handling business logic and database interactions.
- **MySQL 5.6/5.7**: Relational database management system for storing news data.
- **Object-Oriented Programming (OOP)**: For modular and maintainable code structure.

### Frontend
- **HTML5**: Markup language for structuring the website.
- **CSS Framework (Bootstrap/Tailwind)**: For responsive and modern design.
- **JavaScript**: Optional for AJAX-based filtering (if implemented).

### Development Tools
- **Local Server**: Open Server or any equivalent local development environment.
- **Version Control**: Git for source code management.

---

## Installation and Setup

1. **Clone the Repository**:
   ```bash
   git clone <repository_url>
   ```
2. **Set Up the Database**:
   - Import the provided SQL file to create the necessary tables.
   - Update the database connection details in the PHP configuration file.

3. **Configure the Local Server**:
   - Ensure the project is accessible at `http://<url>/`.

4. **Run the Application**:
   - Open the main page in your browser to view the news list.
   - Use the "Add News" page to create new entries.

---

## Features and Benefits
- **User-Friendly Interface**: Simple and intuitive design for adding and viewing news.
- **Efficient Data Management**: Sorting and filtering at the SQL level for optimal performance.
- **Scalable Architecture**: Object-oriented approach ensures the codebase is maintainable and extensible.
- **Responsive Design**: Built with a CSS framework for compatibility across devices.

---

## Contribution Guidelines
Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Submit a pull request with a detailed description of your changes.

---

## License
This project is open-source and available under the [MIT License](LICENSE).

---

For any questions or issues, please open an issue on the GitHub repository or contact the project maintainer.
