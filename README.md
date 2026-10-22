# Database Management | Week: PHP Login / Logout + GitHub

## Based on last week's Resume CRUD Lab

This code extends the previous CRUD project, retaining `skills.php`, `skill_create.php`, `skill_edit.php`, `skill_delete.php` and `index.php`.

### Setup (local XAMPP / Angsila)
1. Backup the existing MySQL database in phpMyAdmin first.
2. Keep previous tables `profile`, `education`, `skill`, `training`. **Do not re-import the previous setup.sql**: it contains DROP TABLE commands.
3. In phpMyAdmin, select your existing database and run `database/this_week_migration.sql` (creates `users` only).
4. Configure `config/db.php` using your assigned MySQL credentials and database name (use environment variables on shared servers).
5. Upload files to a dedicated folder on web server (for Angsila, follow instructor's permitted deployment path).
6. Open `register.php`, sign up with a unique email and password >= 10 characters.
7. Open `login.php` then test `skills.php`, `skill_create.php`, `skill_edit.php`, `skill_delete.php`, `index.php`, `logout.php`.
8. All new accounts get their own profile; earlier demo skill records remain in the original profile and do not appear for new users.

### Lab tasks
- TODO 1: `SELECT id, profile_id, password_hash ... WHERE email = ?` with prepared statement.
- TODO 2: bind email, execute, read matched user.
- TODO 3: check `password_verify` (never compare passwords directly).
- TODO 4: regenerate session ID; store user_id/profile_id/email on successful authentication.
- TODO 5: redirect to `skills.php`.
- TODO 6: `logout.php` securely destroys the session (POST + CSRF token).

### Test cases
1. Unauthenticated access to `skills.php`, `index.php` or create/edit/delete redirects to login.
2. Existing account correct password logs in; incorrect password fails.
3. Logout prevents access to private pages, even with browser Back/refresh.
4. Two different registered users cannot view/update/delete each other's skills.
5. Create → Edit → Delete after login works correctly.
6. SQL injection string in email must not bypass login.
7. Repository does not contain a real DB password or `.env` file.

### Git/GitHub evidence
`git init` → `git add .` → `git commit -m "Add PHP session login"` → `git branch -M main` → `git remote add origin <URL>` → `git push -u origin main`.
For an existing repository, simply commit and push updates. Commit at least twice with meaningful messages. Avoid uploading secrets. Include screenshots (register, successful login, failed login, CRUD, logout) in your report, not database passwords.

### Security note
Teaching lab only. HTTPS is recommended on shared Angsila hosting. Authenticator uses password hashing, prepared statements, session rotation, owner-scoped CRUD, and POST+CSRF logout; production apps also require throttling, session timeouts, centralized permissions, HTTPS enforcement and monitoring.

### Deliverables
A. GitHub repository (source excluding secrets)  B. Running Angsila URL or instructor-approved local demonstration  C. Screenshot evidence  D. Short explanation of Session and login/logout flow.

### Instructor / student status
**STUDENT STARTER**: login/logout intentionally incomplete. Complete TODO 1–6.
