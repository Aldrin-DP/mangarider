<template>
    <div v-if="isLoading" class="py-3 px-1 animate-pulse">
        <div class="mt-1 mb-4">
            <div class="flex justify-between">
                <div class="w-32 h-4 bg-gray-200"></div>
                <div class="w-16 h-4 bg-gray-200"></div>
            </div>
        </div>
        <div class="w-full h-[120px] bg-gray-200 mb-2"></div>
        <div class="w-full h-[120px] bg-gray-200 mb-2"></div>
        <div class="w-full h-[120px] bg-gray-200 mb-2"></div>
        <div class="w-full h-[120px] bg-gray-200 mb-2"></div>
        <div class="w-full h-[120px] bg-gray-200 mb-2"></div>
    </div>
    <div v-else class="sm:px-5 lg:pe-5 lg:ps-0 mt-9 lg:mt-2">
        <div class="flex justify-between mt-2">
            <h3 class="heading">New Manga</h3>
            <RouterLink :to="{ name: 'NewMangaAll' }">
                <span class="view-all">View All</span>
            </RouterLink>
        </div>

        <div v-for="(manga, index) in newMangas" class="p-3 border flex gap-3 mb-2 border-b pb-2">
            <img :src="manga.images.jpg.image_url" :alt="manga.title" class="h-[150px] w-[100px] lg:h-[100px] lg:w-[75px]">
            <div>
                <RouterLink :to="{ name: 'MangaDetails', params: { id: manga.mal_id } }">
                    <h5 class="text-md font-medium cursor-pointer">{{ manga.title }}</h5>
                </RouterLink>
                <div>
                    <p>{{ truncateWords(manga.synopsis, synopsisLimit) }}</p>
                </div>
                <div class="flex gap-1 mt-1">
                    <div v-for="(genre, index) in manga.genres.slice(0,2)">
                        <span class="border px-1 py-1 text-xs rounded-md bg-gray-200">
                            {{ genre.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>


<script>
    export default {
        name: "NewManga",
        data() {
            return {
                isLoading: true,
                newMangas: [],
                windowWidth: window.innerWidth,
            }
        },
        mounted() {
            this.getNewMangaPreview();
            window.addEventListener('resize', this.handleResize);
        },
        unmounted() {
            window.removeEventListener('resize', this.handleResize);
        },
        computed: {
            synopsisLimit() {
                if (this.windowWidth < 640) return 18;
                if (this.windowWidth < 1024) return 36;
                return 0;
            }
        },
        methods: {
            async getNewMangaPreview() {
                this.isLoading = true;
                try {
                    const response = await fetch('/api/manga/new');
                    const data = await response.json();
                    this.newMangas = data.data;
                    console.log(data.data);
                } catch (error) {
                    console.error("Error fetching new manga:", error);
                } finally {
                    this.isLoading = false;
                }
            },
            handleResize() {
                this.windowWidth = window.innerWidth;
            },
            truncateWords(text, limit) {
                if (!text || limit === 0) return '';
                const words = text.split(" ");
                return words.slice(0, limit).join(" ") + (words.length > limit ? '...' : '');
            }
        }
    }
</script>
