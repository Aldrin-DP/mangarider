<template>
  <div class="p-1 sm:px-5 mb-3 border-t">
    <h3 class="text-lg font-medium">Genres</h3>
    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-7 w-full gap-1">
      <RouterLink
        v-for="(genre, index) in genres"
        :key="index"
        :to="{ name: 'GenreMangaAll', params: { genreId: genre.id, genreName: genre.name } }"
        class="text-center px-2 py-1 cursor-pointer transition-all duration-200 rounded"
        :class="{
            'bg-green-500 text-white': isActiveGenre(genre.id),
            'hover:bg-green-400': !isActiveGenre(genre.id)
        }"
        >
        {{ genre.name }}
        </RouterLink>

    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      genres: [
        { id: 1, name: 'Action' },
        { id: 2, name: 'Adventure' },
        { id: 4, name: 'Comedy' },
        { id: 8, name: 'Drama' },
        { id: 9, name: 'Ecchi' },
        { id: 10, name: 'Fantasy' },
        { id: 11, name: 'Harem' },
        { id: 14, name: 'Horror' },
        { id: 62, name: 'Isekai' },
        { id: 17, name: 'Martial Arts' },
        { id: 7, name: 'Mystery' },
        { id: 22, name: 'Romance' },
        { id: 24, name: 'Sci-Fi' },
        { id: 28, name: 'Seinen' },
        { id: 36, name: 'Slice of Life' },
        { id: 27, name: 'Shounen' },
        { id: 30, name: 'Sports' },
        { id: 37, name: 'Supernatural' },
        { id: 40, name: 'Suspense' },
        { id: 41, name: 'Vampire' },
      ],
    };
  },
  methods: {
    isActiveGenre(id) {
        return this.$route.name === 'GenreMangaAll' && +this.$route.params.genreId === id;
    },
  },
};
</script>
