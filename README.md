MangaRider 

A web application that allows users to browse and search for manga online, built with Laravel, Vue.js, and TailwindCSS.

Features
Search Manga: Search through thousands of manga titles
Browse Catalog: Explore popular, trending and more
Detailed Information: View comprehensive manga details including synopsis, genres, ratings, and more
Responsive Design: Seamless experience across desktop and mobile devices

Tech Stack
Backend: Laravel API
Frontend: Vue.js 3
Styling: TailwindCSS
API: Jikan API (MyAnimeList unofficial API)

Prerequisites
PHP 8.1 or higher
Composer
Node.js & NPM
MySQL

Installation
1. git clone https://github.com/Aldrin-DP/mangarider.git
        
2. composer install
3. npm install
4. cp .env.example .env
php artisan key:generate
5. 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mangarider
DB_USERNAME=your_username
DB_PASSWORD=your_password
6. php artisan migrate
7. npm run dev
8. php artisan serve

Visit http://localhost:8000 in your browser

API Integration

This project uses the Jikan API, which is an unofficial MyAnimeList API. The API provides:
Manga search functionality
Detailed manga information
Genre and category data
Ratings and statistics
Note: Reading actual manga chapters is not available as there are no free APIs that provide this functionality.

 Acknowledgments
Jikan API for providing the manga data