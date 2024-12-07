<script>
import axios from "axios";
import FilterComponent from "@/components/category/oneCategoryComponent/FilterComponent.vue";
import PaginationComponent from "@/components/category/oneCategoryComponent/PaginationComponent.vue";
import filmCardComponent from "@/components/category/oneCategoryComponent/filmCardComponent.vue";

export default {
    name: "AllfilmsComponent",
    props:['id'],
    components: {
        'filter-component': FilterComponent,
        'pagination-component': PaginationComponent,
        'film-card-component': filmCardComponent
    },
    data() {
        return {
            films: [],
            categories: null,
            prevPage: 1,
            nextPage: 1,
            lastPage: 1,
            total: 0,
            priceFilter: null,
            nextPageQuery: {},
            prevPageQuery: {},
        }
    },
    methods: {
        fetch(page, id) {
            axios.get('/api/v1/categories/' + id , {
                params: {
                    page: page,
                }
            })
                .then(response => {
                    if(response.status === 200) {
                        this.films = response.data.data;
                        if(this.films) {
                            let currentPage = response.data.meta.current_page;
                            this.lastPage = response.data.meta.last_page;
                            this.total = response.data.meta.total;

                            this.prevPage = currentPage - 1 <= 0 ? 1 : currentPage - 1;
                            this.nextPage = currentPage + 1 >= this.lastPage ? this.lastPage : currentPage + 1;

                            this.updatePrevPageQuery('page', this.prevPage);

                            this.updateNextPageQuery('page', this.nextPage);
                        }
                    }
                });
        },

        updatePrevPageQuery(key, value) {
            if (value !== null) this.prevPageQuery[key] = value
        },

        updateNextPageQuery(key, value) {
            if (value !== null) this.nextPageQuery[key] = value
        },

        fetch_categories() {
            axios.get('/api/v1/categories', {
            })
                .then(response => {
                    if(response.status === 200) {
                        this.categories = response.data.data;
                    }
                });
        },
    },

    mounted() {
        let params = new URLSearchParams(document.location.search);
        let page = params.get("page");
        this.fetch(page, this.id);
        this.fetch_categories();
    },
}

</script>

<template>
    <filter-component v-if="total > 1"
                      :categories="categories"
                      @fetch="fetch"
    />
    <div v-if="films" class="p-1 flex flex-wrap items-center justify-around max-w-screen-xl mx-auto">
        <div class="my-3" v-for="item in films">
            <film-card-component
                :item='item'
            />
        </div>
    </div>
    <div v-else class="p-1 flex flex-wrap items-center justify-around max-w-screen-xl mx-auto">
        <h3 class="my-6 text-red-700 text-2xl">Товари відсутні</h3>
    </div>
    <pagination-component v-if="lastPage > 1"
        @fetch="fetch"
        :id="this.id"
        :lastPage='this.lastPage'
        :prevPage='this.prevPage'
        :nextPage='this.nextPage'
        :prevPageQuery='this.prevPageQuery'
        :nextPageQuery='this.nextPageQuery'
    />
</template>
