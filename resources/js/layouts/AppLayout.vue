<template>
    <div class="max-w-[1550px] mx-auto bg-gray-50">
        <Navbar />

        <slot />

        <Footer />
    </div>

</template>

<script>

export default {
    data() {
        return {

        }
    }
}

</script>
