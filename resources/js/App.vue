<template>

    <AppLayout>
        <div class="p-1 lg:flex lg:gap-2">
            <div class="w-full lg:w-9/12" :class="{ 'lg:w-full': isFullWidthPage }">
                <RouterView v-slot="{ Component }">
                    <keep-alive :include="keepAliveList">
                        <component :is="Component" :key="$route.name" />
                    </keep-alive>
                </RouterView>
            </div>
            <div v-if="!isFullWidthPage" class="lg:w-3/12">
                <keep-alive>
                    <NewMangaPreview />
                </keep-alive>
            </div>
        </div>

        <keep-alive>
            <UpcomingMangaPreview v-if="!isFullWidthPage" />
        </keep-alive>

        <div class="mt-2">
            <Genres />
        </div>
    </AppLayout>

</template>

<script>
export default {
  data() {
    return {

    };
  },
  computed: {
    keepAliveList() {
      return [
        "Homepage",
        "TopRatedManga",
        "OngoingManga",
        "CompletedManga",
        "MangaDetails",
        "PopularMangaAll",
        "NewMangaAll",
        "UpcomingMangaAll",
        "TopRatedMangaAll",
        "OngoingMangaAll",
        "GenreMangaAll",
      ];
    },
    isFullWidthPage() {
      return [
        "PopularMangaAll",
        "NewMangaAll",
        "UpcomingMangaAll",
        "GenreMangaAll",
        "TopRatedMangaAll",
        "OngoingMangaAll",
        "CompletedMangaAll",
    ].includes(
        this.$route.name
      );
    }
  },
  methods: {

  }
};
</script>

