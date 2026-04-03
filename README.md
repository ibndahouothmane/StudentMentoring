# StudentMentoring

StudentMentoring is a web portal designed to facilitate appointment management between students and mentors. The platform provides separate interfaces for students and mentors to register, log in, and manage mentoring sessions.

-   **English:** A student mentoring web portal for managing appointments. Once registered, a student can choose a time slot to contact their mentor via a form. The mentor can then view these requests on a calendar and access the student's details.
-   **Français:** Un portail web de mentoring pour étudiants (gestion de rendez-vous). Une fois inscrit, l’étudiant choisit un créneau horaire pour contacter son mentor. Le mentor peut voir la liste des demandes de contact sur un agenda et visualiser les détails de l’étudiant.

## Key Features

*   **Dual User Roles:** Separate registration, login, and dashboard functionalities for students and mentors.
*   **Student Dashboard:** Students can find mentors, request appointments through a form, and view the status of their requests (Pending, Accepted, Refused).
*   **Mentor Dashboard:** Mentors have a calendar view of all incoming appointment requests from students.
*   **Appointment Management:**
    *   Students can submit detailed appointment requests including title, preferred time slot, and a message.
    *   Students can view, update, or cancel their pending requests.
    *   Mentors can accept or refuse requests, which updates the status for the student.
*   **Interactive Calendar:** Mentors can navigate through months to see their schedule and click on an event to view the full details of the appointment request, including student information.
*   **Multi-Step Registration:** User-friendly, multi-step registration forms for both students and mentors to gather necessary profile information.

## Technologies Used

*   **Backend:** PHP
*   **Frontend:** HTML, CSS, JavaScript
*   **Database:** MySQL
*   **Libraries & Frameworks:** Bootstrap, jQuery

## Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

You need a local server environment with PHP and MySQL, such as XAMPP, WAMP, or MAMP.

### Installation

1.  **Clone the repository:**
    ```sh
    git clone https://github.com/ibndahouothmane/studentmentoring.git
    ```

2.  **Navigate to the project directory:**
    ```sh
    cd studentmentoring
    ```

3.  **Database Setup:**
    *   Open your MySQL database management tool (e.g., phpMyAdmin).
    *   Create a new database named `projetpfe`.
    *   Inside the `projetpfe` database, you will need to create the tables required by the application. The table schemas can be inferred from the SQL queries in the `.php` files (e.g., `server_etudiant.php`, `server_mentor.php`).
    *   The required tables include:
        *   `etudiant`
        *   `etudiant_info`
        *   `etudiant_bac`
        *   `etudiant_formation`
        *   `mentor`
        *   `mentor_info`
        *   `mentor_bac`
        *   `mentor_situation`
        *   `rendez_vous`

4.  **Database Connection:**
    The application connects to the database using the following credentials by default:
    *   **Host:** `localhost`
    *   **Username:** `root`
    *   **Password:** (empty)
    *   **Database Name:** `projetpfe`
    
    If your local database setup is different, update the connection strings in the following files:
    *   `demandes.php`
    *   `demandes_m.php`
    *   `rendez_vous.php`
    *   `server_etudiant.php`
    *   `server_mentor.php`
    *   `src/Calendar/bootstrap.php`

5.  **Run the application:**
    *   Move the project folder into your server's root directory (e.g., `htdocs` for XAMPP).
    *   Open your web browser and navigate to `http://localhost/studentmentoring/index.html`.
