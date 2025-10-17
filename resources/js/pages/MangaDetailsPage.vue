<template>
  <div v-if="loading" class="py-3 px-2 animate-pulse">
    <div class="flex gap-5">
        <div class="w-[200px]">
            <div class="h-[300px] w-[200px] bg-gray-200 rounded"></div>
            <div class="h-8 w-[200px] bg-gray-200 rounded mt-3"></div>
        </div>
        <div class="w-full">
            <div class="w-full h-8 bg-gray-200"></div>
            <div class="w-1/2 h-4 bg-gray-200"></div>
            <div class="h-14 w-1/2 bg-gray-200"></div>
        </div>
    </div>
    <div>

    </div>
  </div>

  <div v-else-if="mangaDetails" class="px-1 sm:px-5">
    <div class="flex gap-5 pb-4 mt-3">
      <div>
        <img
          :src="mangaDetails.images.jpg.large_image_url"
          alt=""
          class="h-[300px] w-[200px] md:h-[400px] md:w-[260px] rounded"
        />
        <button
          class="bg-green-500 w-full text-green-900 font-bold py-2 mt-3 rounded"
        >
          Add to favorites
        </button>
      </div>

      <div class="flex-1">
        <h1 class="text-green-500 text-xl font-medium mb-1">
          {{ mangaDetails.title }}
        </h1>

        <label for="" class="hidden text-md font-medium md:block">Synopsis</label>
        <div class="hidden md:block">
          <span v-if="!showFullSynopsis">
            {{ truncatedWords }}
            <span
              class="text-green-500 cursor-pointer"
              @click="showFullSynopsis = true"
            >
              more
            </span>
          </span>

          <span v-else>
            {{ mangaDetails.synopsis }}
            <span
              class="text-green-500 cursor-pointer"
              @click="showFullSynopsis = false"
            >
              less
            </span>
          </span>
        </div>

        <span
          v-for="(genre, index) in mangaDetails.genres"
          :key="index"
          class="mt-1 px-2 py-1 text-sm rounded border border-gray-300 me-2 inline-block"
        >
          {{ genre.name }}
        </span>

        <p class="mt-1">
          Author:
          <span class="font-medium">{{ mangaDetails.authors[0].name }}</span>
        </p>
        <p class="mt-1" v-if="mangaDetails.chapters">
          Chapters: {{ mangaDetails.chapters }}
        </p>
        <p class="mt-1">Status: {{ mangaDetails.status }}</p>
        <p class="mt-1">Publish: {{ mangaDetails.published.string }}</p>
      </div>
    </div>

    <div class="pb-4 border-b md:hidden">
      <label for="" class="text-md font-medium">Synopsis</label>
      <p class="">{{ mangaDetails.synopsis }}</p>
    </div>

    <div class="mt-3 pb-4 border-b">
      <h3 class="text-lg font-medium">Chapters</h3>
      <div>
        <p>Chapters are currently unavailable due to legal API limitations.</p>
      </div>
    </div>
  </div>

  <div v-else class="p-2">
    <p>Failed to load manga details.</p>
  </div>
</template>

<script>
export default {
  name: "MangaDetails",
  data() {
    return {
      loading: true,
      mangaDetails: null,
      chapters: null,
      cache: {},
      truncatedWords: null,
      showFullSynopsis: false,
    };
  },
  mounted() {
    this.getMangaDetails();
  },
  watch: {
    "$route.params.id": function () {
      this.getMangaDetails();
    },
  },
  activated() {
    this.getMangaDetails();
  },
  methods: {
    async getMangaDetails() {
      const id = this.$route.params.id;

      this.loading = true;
      this.truncatedWords = null;
      this.showFullSynopsis = false;

      if (this.cache[id]) {
        this.mangaDetails = this.cache[id];
        this.truncateWords();
        this.loading = false;
        return;
      }

      try {
        const response = await fetch(`/api/manga/${id}`);
        const data = await response.json();
        this.mangaDetails = data.data;

        this.cache[id] = data.data;
        this.truncateWords();

      } catch (error) {
        console.error("Error fetching manga details", error);
      } finally {
        this.loading = false;
      }
    },

    truncateWords() {
      if (!this.mangaDetails || !this.mangaDetails.synopsis) return;

      const words = this.mangaDetails.synopsis.split(" ");
      if (words.length > 105) {
        this.truncatedWords = words.slice(0, 105).join(" ") + "...";
      } else {
        this.truncatedWords = this.mangaDetails.synopsis;
      }
    },
  },
};
</script>
