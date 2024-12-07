<script>
import axios from "axios";
import filmCardComponent from "@/components/film/oneFilmComponent/filmCardComponent.vue";
export default {
    name: "OneFilmComponent",
    components: {
        'film-card-component': filmCardComponent
    },
    props: ['id'],
    data() {
        return {
            film: {},
            categories: null
        }
    },

    methods: {
        fetch(id) {
            axios.get('/api/v1/films/' + id, {
            })
                .then(response => {

                    if(response.status === 200) {
                        this.film = response.data.data;
                        if(this.film.categories.data) {
                            this.categories = this.film.categories.data;
                        }

                    }
                });
        },
    },

    mounted() {
        this.fetch(this.id);
    },
}
</script>

<template>
    <film-card-component
        :item='film'
        :categories="categories"
    />
</template>

<style scoped>

</style>
