<template>
    <div v-if="isLoading" class="py-3 px-1 animate-pulse lg:px-5">
        <div class="mt-1 flex justify-between mb-4">
            <div class="w-40 h-4 bg-gray-200"></div>
            <div class="w-16 h-4 bg-gray-200"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 mb-3">
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
            <div class="h-[300px] bg-gray-200 rounded"></div>
        </div>
    </div>

    <div v-else class="mt-2 pb-2 sm:w-11/12 sm:m-auto sm:mt-2 md:w-full md:px-5">
        <div class="flex justify-between">
            <h3 class="heading">Ongoing Manga</h3>
            <RouterLink :to="{ name: 'OngoingMangaAll' }">
               <span class="cursor-pointer hover:text-green-500">View All</span>
            </RouterLink>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:w-full md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
            <div v-for="(manga, index) in ongoingMangas">
                <RouterLink :to="{ name: 'MangaDetails', params: { id: manga.mal_id } }">
                <div class="aspect-[2/3]">
                     <img :src="manga.images.jpg.image_url" :alt="manga.title" class="w-full h-full object-cover rounded">
                </div>
                <p class="font-medium mt-2 truncate cursor-pointer text-center">{{ manga.title }}</p>
                </RouterLink>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OngoingManga",
    data() {
        return {
            isLoading: true,
            ongoingMangas: [],
        }
    },
    mounted() {
        this.getOngoingMangas();
    },
    methods: {
        async getOngoingMangas() {
            try {
                const response = await fetch('/api/manga/ongoing');
                const data = await response.json();
                this.ongoingMangas = data.data;
                console.log(data.data);
            } catch(error) {
                console.error('Error to fetch ongoing manga.', error);
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>
