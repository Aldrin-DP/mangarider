<template>
    <div v-if="isLoading" class="p-5 flex gap-3 justify-center animate-pulse">
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
        <div class="w-[170px] h-[200px] bg-gray-200"></div>
    </div>
    <div v-else class="p-3">
        <h3 class="font-semibold text-md mb-3 uppercase tracking-wide text-green-500">Popular Manga</h3>
        <div class="flex overflow-x-scroll gap-3 manga-scroll">
            <div class="flex flex-col cursor-pointer" v-for="(popularManga, index) in popularMangas"
                :key="index">
                <RouterLink :to="{ name: 'MangaDetails', params: { id: popularManga.mal_id } }">
                    <img :src="popularManga.images.jpg.image_url" :alt="popularManga.title"
                        class="h-[180px] w-[120px] object-cover rounded shadow" />
                </RouterLink>
                <p class="mt-2 text-sm font-medium text-center w-[120px]">
                    {{ popularManga.title }}
                </p>
            </div>
        </div>
    </div>

</template>


<script>
    export default {
        data() {
            return {
                isLoading: true,
                popularMangas: [],
            }
        },
        mounted() {
            this.getPopularManga();
        },
        methods: {
            async getPopularManga() {
                this.isLoading = true;
                try {
                    const response = await fetch('/api/manga/popular');
                    const data = await response.json();
                    this.popularMangas = data.data;
                } catch (error) {
                    console.error("Error fetching popular manga:", error);
                } finally {
                    this.isLoading = false;
                }
            }
        }
    }
</script>
