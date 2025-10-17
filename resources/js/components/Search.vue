<template>
    <div class="md:w-11/12 lg:w-full">
        <div class="relative">
        <input type="text" class="border rounded bg-gray-100 p-2 w-full outline-none md:w-full" placeholder="Search manga.."
            v-model="query"
            @input="onInput"
        >
        <button class="absolute right-1 top-1/2 -translate-y-1/2 bg-green-300 py-1 px-2 rounded">Search</button>
        </div>
        <div class="relative">
            <ul v-if="results" class="absolute bg-gray-50 w-full shadow-md">
                <li v-for="(manga, index) in results" :key="manga.mal_id" class="p-1 cursor-pointer hover:bg-gray-200 flex gap-2">
                    <img :src="manga.images.jpg.small_image_url" :alt="manga.title" class="h-[40px] w-[27px]">
                    <div class="flex-1 overflow-hidden">
                        <RouterLink :to="{ name:'MangaDetails', params: {id: manga.mal_id } }" @click="results = []">
                            <p class="text-sm truncate">{{ manga.title }}</p>
                            <p v-if="manga.chapters" class="text-sm">{{ manga.chapters }} Chapters</p>
                            <p v-else="manga.chapters" class="text-sm">Ongoing</p>
                        </RouterLink>
                    </div>
                </li>
            </ul>
        </div>
        </input>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                query: '',
                results: [],
                loading: false,
                error: '',
                debouceTimer: null,
            }
        },
        methods: {
            onInput() {
                clearTimeout(this.debounceTimer);
                this.debounceTimer = setTimeout( () => {
                    this.searchManga();
                }, 500);
            },
            async searchManga() {

                if (this.query.length < 2){
                    this.results = [];
                    return;
                }

                this.loading = true;
                this.error = '';
                this.results = [];

                try {
                    const response = await fetch(`/api/search-manga?q=${encodeURIComponent(this.query)}`);
                    const data = await response.json();
                    this.results = data.data;

                } catch (error) {
                    this.error = 'Failed to fetch manga';
                    console.error('Failed to fetch manga', $error);
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>
