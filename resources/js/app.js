import { createApp } from 'vue';
import './bootstrap';
import '../css/app.css';
import router from './router';
import App from './App.vue';

// Import components
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
import AppLayout from './layouts/AppLayout.vue';
import Search from './components/Search.vue';
import HomePage from './pages/HomePage.vue';
import About from './pages/About.vue';
import PopularMangaPreview from './components/PopularMangaPreview.vue';
import NewMangaPreview from './components/NewMangaPreview.vue';
import UpcomingMangaPreview from './components/UpcomingMangaPreview.vue';
import Genres from './components/Genres.vue';
import AZList from './components/AZList.vue';


const app = createApp(App);

// Register components globally
app.component('Navbar', Navbar);
app.component('Footer', Footer);
app.component('AppLayout', AppLayout);
app.component('Search', Search);
app.component('Home', HomePage);
app.component('About', About);
app.component('PopularMangaPreview', PopularMangaPreview);
app.component('NewMangaPreview', NewMangaPreview);
app.component('Genres', Genres);
app.component('AZList', AZList);
app.component('UpcomingMangaPreview', UpcomingMangaPreview);

app.use(router);
app.mount('#app');

