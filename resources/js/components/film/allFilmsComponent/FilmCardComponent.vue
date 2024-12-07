<script>
export default {
    name: "FilmCardComponent",
    props: [
        'item'
    ],
}
</script>

<template>
    <div
        class="flex flex-col justify-between h-[38rem] max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a v-if="item.poster !== null && item.poster.url_sm !== null" href="#">
            <img class="rounded-t-lg" :src="item.poster.url_sm" alt=""/>
        </a>
        <a v-else href="#">
            <img class="rounded-t-lg" :src="item.noimg_sm" alt=""/>
        </a>
        <h4 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ item.name }}</h4>
        <a :href="'/films/' + item.id"
           class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Дізнайся більше</a>
    </div>
</template>
