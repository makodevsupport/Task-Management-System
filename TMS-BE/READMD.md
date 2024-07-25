
## Clarity Task Mangament:
# Modules:
- Authentication
- Create Task
- Edit/Update Task
- List task with pagination
- View task information
- Delete task


# Requirements
Outline the prerequisites for running your project:

- PHP version(8.1 - 8.3)
- Composer >2.7
- Laravel 11 version
- Other dependencies
- Mysql 8.0
Installation Provide step-by-step instructions to install and set up your project locally. Include any necessary commands or configurations.

# Clone the repository
```sh
Base URL : git clone https://github.com/your/repository.git
```

# Navigate into the project directory
cd <project-directory>

# Install PHP dependencies
```composer install ```
```php artisan nova:install```
with license key
# Copy .env.example to .env and configure your environment variables
```cp .env.example .env```
Add database credentials in .env also add NOVA_LICENSE_KEY
 
# Generate application key
```php artisan key:generate```
# Run database migrations (if applicable)
```php artisan migrate```
# Create NOVA user using below command
``` php artisan nova:user ```

# Create NOVA user using below command
Add the nova user email in RolesAndPermissionsSeeder then run seeder
``` php artisan db:seed ```

# Serve the application locally
```php artisan serve ```

# Access the application in your browser
```http://localhost:8000 ```
Provide instructions for running tests, if applicable, and any relevant details about your testing setup.
# Run tests
```php artisan test```
# Login & Authentication token
```sh
POST: http://localhost:8000/api/login
Request Body:
{"email":"string","password":"password"}
Response:
{"access_token":"Adasdasd!asdasdasdadasda"}
```
# Authentication header
```Bearer {access_token} ```
A token must be present in every task API in order to avoid returning a 401 error (Unnautenticated).
# Create Task
```sh
Valid status are: pending,in-progress,completed
POST: http://localhost:8000/api/tasks
Request Body:
{"title":"unique string","description":"long text","status":"completed","due_date":"2024-01-12"}
Response:
{"title":"unique string","description":"long text","status":"completed","due_date":"2024-01-12","created_at":"timestamp","updated_at":"timestamp"}
```

# Update Task
```sh
POST: http://localhost:8000/api/tasks/{task_id}
Request Body:
{
  "title": "updated unique name",
  "description": "long text",
  "status": "completed",
  "due_date": "2024-01-12",
}

Response:
{
  "title": "updated unique name",
  "description": "long text",
  "status": "completed",
  "due_date": "2024-01-12",
  "created_at": "timestamp",
  "updated_at": "timestamp"
}

Exception:
Resource not found
```

# Delete Task Info
```sh
DELETE : http://localhost:8000/api/tasks/{task_id}
Response:
HTTP status code 204
Exception:
Resource not found
```

# Get Task Info
```sh
GET: http://localhost:8000/api/tasks/{task_id}
Response:
{
    "id": "1",
    "title": "updated unique name",
    "description": "long text",
    "status": "completed",
    "due_date": "2024-01-12",
    "created_at": "timestamp",
    "updated_at": "timestamp"
  }
Exception:
Resource not found
```
# List Task With Pagination
```sh
GET: http://localhost:8000/api/tasks?page=1
Response:
{
  "current_page": 1,
  "data": [
    {
      "id": 21,
      "title": "Tempore velit dolor",
      "description": "Optio eaque dolore",
      "status": "in-progress",
      "due_date": null,
      "created_at": "2024-07-18T05:40:50.000000Z",
      "updated_at": "2024-07-18T06:33:12.000000Z"
    },
    
  ],
  "first_page_url": "http://127.0.0.1:8000/api/tasks?page=1",
  "from": 1,
  "next_page_url": "http://127.0.0.1:8000/api/tasks?page=2",
  "path": "http://127.0.0.1:8000/api/tasks",
  "per_page": 10,
  "prev_page_url": null,
  "to": 10
}
```






