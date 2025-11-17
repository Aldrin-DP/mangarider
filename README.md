# MangaRider 

A web application that allows users to browse and search for manga online, built with Laravel, Vue.js, and TailwindCSS.

## Features

- **Search Manga**: Search through thousands of manga titles
- **Browse Catalog**: Explore popular, trending and more
- **Detailed Information**: View comprehensive manga details including synopsis, genres, ratings, and more
- **Responsive Design**: Seamless experience across desktop and mobile devices

## Tech Stack

- **Backend**: Laravel API
- **Frontend**: Vue.js 3
- **Styling**: TailwindCSS
- **API**: [Jikan API](https://jikan.moe/) (MyAnimeList unofficial API)

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Aldrin-DP/mangarider.git
   cd mangarider
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your database**
   
   Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mangarider
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**
   ```bash
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser

## Usage

1. Open the application in your browser
2. Use the search bar to find manga by title
3. Browse through the manga catalog
4. Click on any manga to view detailed information

## API Integration

This project uses the [Jikan API](https://jikan.moe/), which is an unofficial MyAnimeList API. The API provides:
- Manga search functionality
- Detailed manga information
- Genre and category data
- Ratings and statistics

**Note**: Reading actual manga chapters is not available as there are no free APIs that provide this functionality.

## 👤 Author

**Aldrin Pelayo**

- GitHub: [@Aldrin-DP](https://github.com/Aldrin-DP)
- Portfolio: [https://adpelayo.netlify.app](https://adpelayo.netlify.app)

## Acknowledgments

- [Jikan API](https://jikan.moe/) for providing the manga data
- [MyAnimeList](https://myanimelist.net/) for being the data source

---
