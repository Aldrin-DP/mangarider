<template>
  <div>
    <div class="p-1 md:flex md:justify-between lg:flex items-center border-b-4 border-green-500">
        <div class="w-full flex justify-center md:justify-start md:w-auto">
            <RouterLink to="/">
                <img :src="logo" alt="logo" class="w-[200px] h-[100px]"></img>
            </RouterLink>
        </div>
        <div class="w-full md:w-10/12 md:flex md:flex-col md:justify-end md:pr-5 lg:flex-row lg:pr-5">
            <div class="flex justify-center md:justify-end lg:w-10/12 lg:m-auto lg:justify-start">
                <ul class="text-sm mt-3 flex w-full justify-between sm:text-base sm:w-11/12 md:mt-2 lg:mt-0 lg:w-full lg:justify-start lg:gap-3 lg:mr-4">
                    <RouterLink
                        to="/"
                        :class=" $route.path === '/' ? 'isActive' : 'notActive'">
                        Home
                    </RouterLink>
                    <RouterLink
                        to="/manga/top"
                        :class=" $route.path === '/manga/top' ? 'isActive' : 'notActive'">
                        Top Rated
                    </RouterLink>
                    <RouterLink
                        to="/manga/ongoing"
                        :class=" $route.path === '/manga/ongoing' ? 'isActive' : 'notActive'">
                        Ongoing Manga
                    </RouterLink>
                    <RouterLink
                        to="/manga/completed"
                        :class=" $route.path === '/manga/completed' ? 'isActive' : 'notActive'">
                        Completed Manga
                    </RouterLink>
                </ul>
            </div>
            <div class="mt-3 mb-2 sm:w-11/12 sm:mx-auto md:flex md:justify-end md:w-full lg:w-10/12">
                <Search />
            </div>
        </div>
    </div>
  </div>
</template>


<script>
import logo from '@/assets/images/logo3.png';
export default {
    data() {
        return {
            logo
        }
    }
}

</script>

<style>
    .isActive {
        color: rgb(34 197 94 / var(--tw-bg-opacity, 1));
        border-bottom: 1px solid rgb(34 197 94 / var(--tw-bg-opacity, 1));
    }
    .notActive {
        border-bottom: 1px solid transparent;
    }
    .notActive:hover {
        color: rgb(34 197 94 / var(--tw-bg-opacity, 1));
        border-bottom: 1px solid rgb(34 197 94 / var(--tw-bg-opacity, 1));
        transition: all;
        transition-duration: 300ms;
    }
</style>
