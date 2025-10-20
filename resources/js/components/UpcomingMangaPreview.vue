<template>
    <div v-if="isLoading" class="py-3 px-1 animate-pulse lg:px-5">
        <div class="flex justify-between mb-4">
            <div class="w-40 h-4 bg-gray-200"></div>
            <div class="w-16 h-4 bg-gray-200"></div>
        </div>
        <div class="grid grid-cols-2 gap-3 mb-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
        </div>
        <div class="grid grid-cols-2 gap-3 mb-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
        </div>
    </div>
    <div v-else class="px-1 p-3 border-t sm:px-5">
        <div class="flex justify-between mb-3">
            <h3 class="uppercase text-green-500 tracking-wide font-semibold text-md">Upcoming Manga</h3>
            <RouterLink :to="{ name: 'UpcomingMangaAll' }">
                <span class="cursor-pointer hover:text-green-500">View All</span>
            </RouterLink>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <div v-for="(manga, index) in upcomingMangas">
                <div class="aspect-[2/3]">
                    <img :src="manga.images.jpg.large_image_url" :alt="manga.title" class="h-full w-full object-cover rounded">
                </div>

                <div class="relative group">
                    <RouterLink :to="{ name: 'MangaDetails', params: { id: manga.mal_id } }">
                        <p class="font-medium mt-2 truncate cursor-pointer">{{ manga.title }}</p>
                    </RouterLink>
                    <span class="absolute bg-gray-800 text-white rounded p-1 hidden group-hover:block">
                        {{ manga.title }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UpcomingManga",
    data() {
        return {
            isLoading: true,
            upcomingMangas: [],
        }
    },
    mounted() {
        this.getUpcomingMangas();
    },
    methods: {
        async getUpcomingMangas() {
            try {
                const response = await fetch('/api/manga/upcoming');
                const data = await response.json();
                this.upcomingMangas = data.data;
                console.log(data.data);
            } catch(error) {
                console.error('Error to fetch upcoming manga.', error);
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>
