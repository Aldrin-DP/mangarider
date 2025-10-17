<template>
  <div class="mt-2 sm:w-11/12 sm:m-auto sm:mt-2 md:w-full md:px-5">
    <div class="flex justify-between">
      <h3 class="heading">Ongoing Manga</h3>
    </div>

    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
      <div v-for="manga in ongoingMangas" :key="manga.mal_id">
        <RouterLink :to="{ name: 'MangaDetails', params: { id: manga.mal_id } }">
          <div class="aspect-[2/3]">
            <img
              :src="manga.images.jpg.image_url"
              :alt="manga.title"
              class="w-full h-full object-cover rounded"
            />
          </div>
          <p class="font-medium mt-2 truncate cursor-pointer text-center">
            {{ manga.title }}
          </p>
        </RouterLink>
      </div>
    </div>

    <div class="flex justify-center mt-5" v-if="hasNextPage && !isLoading">
      <button
        @click="loadMore"
        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
      >
        Load More
      </button>
    </div>

    <div class="flex justify-center mt-5" v-if="isLoading">
      <span>Loading...</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "OngoingMangaAll",
  data() {
    return {
      ongoingMangas: [],
      page: 1,
      hasNextPage: true,
      isLoading: false,
    };
  },
  mounted() {
    this.fetchOngoingMangas();
  },
  methods: {
    async fetchOngoingMangas() {
      try {
        this.isLoading = true;
        const response = await fetch(`/api/manga/ongoing?page=${this.page}`);
        const data = await response.json();

        this.ongoingMangas.push(...data.data);

        this.hasNextPage = data.pagination.has_next_page;
      } catch (error) {
        console.error("Error fetching ongoing mangas:", error);
      } finally {
        this.isLoading = false;
      }
    },
    loadMore() {
      this.page++;
      this.fetchOngoingMangas();
    },
  },
};
</script>
