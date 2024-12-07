<script>
export default {
    name: "FilmCardComponent",
    props: [
        'item',
        'categories'
    ],
}
</script>

<template>


    <div class="flex justify-center mb-2">
        <button onclick="window.history.back()" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Назад
        </button>
    </div>
    <div class="flex justify-around mb-2" v-if="categories" v-for="category in categories">
        <p class="text-2xl text-gray-900 dark:text-white">{{ category.name }}</p>
    </div>
    <div class="flex justify-center mb-2">
        <div
            class="mt-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a v-if="item.poster !== null && item.poster.url_lg !== null" href="#">
                <img class="rounded-t-lg" :src="item.poster.url_lg" alt=""/>
            </a>
            <a v-else href="#">
                <img class="rounded-t-lg" :src="item.noimg_lg" alt=""/>
            </a>
            <h4 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ item.name }}</h4>
        </div>
    </div>
</template>
