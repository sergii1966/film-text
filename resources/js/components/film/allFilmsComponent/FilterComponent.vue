<script>
export default {
    name: "FilterComponent",
    props: ['categories'],
    }
</script>

<template>
    <div class="p-1 flex flex-wrap justify-end max-w-screen-xl mx-auto">
        <ul v-for="category in categories" class="flex flex-wrap items-center justify-around text-sm text-gray-700 dark:text-gray-200">
            <li>
                <router-link
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    :to="{ name: 'one-category', params: { id: category.id }}">
                    {{ category.name }}
                </router-link>
            </li>
        </ul>
    </div>
</template>
