Laravel 5.4 plus Bootstrap (SB Admin Template)

I. Modules
	A. Maintenance Report
	B. Station Management
	C. User Management
		1. CRUD
		2. PERMISSIONS AND ROLES:
			a. ADMIN:
				1. Create, Edit, Delete User/s
				2. View Notifications
				3. View user activities
				4. View log or User activities

			b. ADMIN and HEAD:
				1. View all users
				2. View pending reports

			c. ALL:
				1. View own/all maintenance reports
				2. Create maintenance reports
				3. Calendar
				4. View notifications
				5. View own profile (User Profile)
	D. Calendar and Notification
	E. Station Statistics
		1. Frequently defective part
		2. Common sensor defect

II. ON START-UP:
    1. Create own env file. Modify .env.example. Save as .env
        a. DB_DATABASE
        b. DB_USERNAME
        c. DB_PASSWORD
    2. In command line, run "php artisan key:generate"
	3. Serve the project by typing "php artisan serve" in the command line

III. HOW TO's:
	A. Create User
	    1. Get: First && Last Name (permanent), Employee ID (permanent), E-mail, Position
	    2. Register: First && Last Name (permanent), Employee ID (permanent), E-mail, Position