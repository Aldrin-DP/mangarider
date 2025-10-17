<template>
    <div class="p-1 sm:px-5">
        <h3 class="">Searching manga order by alphabet name A to Z.</h3>
        <div class="flex flex-wrap gap-1 mt-2">
            <div v-for="(letters, index) in letters" class="px-3 py-1 cursor-pointer rounded font-bold text-lg bg-gray-200 hover:bg-green-400">
                {{ letters.name }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            letters: [
                {name: 'All'},
                {name: '0-9'},
                {name: 'A'},
                {name: 'B'},
                {name: 'C'},
                {name: 'D'},
                {name: 'E'},
                {name: 'F'},
                {name: 'G'},
                {name: 'H'},
                {name: 'I'},
                {name: 'J'},
                {name: 'K'},
                {name: 'L'},
                {name: 'M'},
                {name: 'N'},
                {name: 'O'},
                {name: 'P'},
                {name: 'Q'},
                {name: 'R'},
                {name: 'S'},
                {name: 'T'},
                {name: 'U'},
                {name: 'V'},
                {name: 'W'},
                {name: 'X'},
                {name: 'Y'},
                {name: 'Z'},
            ]
        }
    }
}
</script>
