<script>
export default {
    name: "PaginationComponent",
    props: [
        'lastPage',
        'prevPage',
        'nextPage',
        'prevPageQuery',
        'nextPageQuery'
    ],
    methods: {
        fetch(page) {
            this.$emit('fetch', page);
        }
    }
}
</script>

<template>
    <div class="my-3 p-1 flex flex-wrap items-center justify-center max-w-screen-xl mx-auto">
        <router-link
            @click.prevent="fetch(prevPage)"
            class="flex items-center justify-center mx-1 px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            :to="{ name: 'all-films', query: prevPageQuery }"
        >
            Попередня
        </router-link>
        <router-link
            @click.prevent="fetch(nextPage)"
            class="flex items-center justify-center mx-1 px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            :to="{ name: 'all-films', query: nextPageQuery }"
        >
            Наступна
        </router-link>
    </div>
</template>
