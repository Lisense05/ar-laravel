# AR-laravel


### Prerequisites

- PHP
- Composer
- Laravel 

### Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/Lisense05/ar-laravel.git
   cd your-project
   ```
2. Install dependecies
   ```bash
    composer install
   ```
3. Copy the .env.example file to .env and update the necessary databes credentials
    ```bash
    cp .env.example .env
    ```
4. Generate a new application key.
    ```bash
    php artisan key:generate
    ```
5. Start the dev server.
    ```bash
    php artisan serve
    ```

6. (Optional)
    ```bash
    php artisan migrate --seed
    ```

http://localhost:8000
