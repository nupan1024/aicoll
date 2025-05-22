# AIColl Laravel Project

## Requirements

- PHP >= 8.2
- Composer
- Node.js and npm
- MySQL

## Installation

1. **Clone the repository**
   ```sh
   git clone https://github.com/nupan1024/aicoll.git
   cd aicoll
   ```

2. **Install PHP dependencies**
   ```sh
   composer install
   ```

3. **Install JavaScript dependencies**
   ```sh
   npm install
   ```

4. **Copy the environment file and configure**
   ```sh
   cp .env.example .env
   ```
   Edit `.env` and set your database and other required variables.

5. **Generate the application key**
   ```sh
   php artisan key:generate
   ```

6. **Run migrations and seeders**
   ```sh
   php artisan migrate --seed
   ```

7. **Build frontend assets**
   ```sh
   npm run dev
   ```
   or for production:
   ```sh
   npm run build
   ```

8. **Start the development server**
   ```sh
   php artisan serve
   ```
   Visit [http://localhost:8000](http://localhost:8000)

## Useful commands

- Run tests:
  ```sh
  php artisan test
  ```
- Clear caches:
  ```sh
  php artisan optimize:clear
  ```

---