import { createRouter, createWebHistory } from "vue-router";

import HomePage from "../pages/HomePage.vue";
import TopRatedManga from "../pages/TopRatedManga.vue";
import OngoingManga from "../pages/OngoingManga.vue";
import CompletedManga from "../pages/CompletedManga.vue";
import NewMangaPage from "../pages/NewMangaPage.vue";
import MangaDetailsPage from "../pages/MangaDetailsPage.vue";
import PopularMangaAllPage from "../pages/PopularMangaAllPage.vue";
import NewMangaAllPage from "../pages/NewMangaAllPage.vue";
import UpcomingMangaAllPage from "../pages/UpcomingMangaAllPage.vue";
import GenreMangaAllPage from "../pages/GenreMangaAllPage.vue";
import TopRatedMangaAllPage from "../pages/TopRatedMangaAllPage.vue";
import OngoingMangaAllPage from "../pages/OngoingMangaAllPage.vue";
import CompletedMangaAllPage from "../pages/CompletedMangaAllPage.vue";

const routes = [
    { path: '/', name: 'Home', component: HomePage },
    { path: '/manga/:id', name: 'MangaDetails', component: MangaDetailsPage },
    { path: '/manga/top', name: 'TopRatedManga', component: TopRatedManga },
    { path: '/manga/ongoing', name: 'OngoingManga', component: OngoingManga },
    { path: '/manga/completed', name: 'CompletedManga', component: CompletedManga },
    { path: '/manga/new', name: 'NewManga', component: NewMangaPage },
    { path: '/manga/popular/all', name: 'PopularMangaAll', component: PopularMangaAllPage },
    { path: '/manga/top/all', name: 'TopRatedMangaAll', component: TopRatedMangaAllPage },
    { path: '/manga/ongoing/all', name: 'OngoingMangaAll', component: OngoingMangaAllPage },
    { path: '/manga/new/all', name: 'NewMangaAll', component: NewMangaAllPage },
    { path: '/manga/completed/all', name: 'CompletedMangaAll', component: CompletedMangaAllPage },
    { path: '/manga/upcoming/all', name: 'UpcomingMangaAll', component: UpcomingMangaAllPage },
    { path: '/manga/genre/:genreId', name: 'GenreMangaAll', component: GenreMangaAllPage,
        props: route => ({ genreId: route.params.genreId, genreName: route.query.genreName })
    },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior (to, from, savedPosition) {
    return { top: 0 }
  }
})

export default router
