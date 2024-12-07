import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: "/",
        name: 'all-films',
        component: () => import("../components/film/AllFilmsComponent.vue"),
    },
    {
        path: "/films/:id",
        name: 'one-film',
        props: true,
        component: () => import("../components/film/OneFilmComponent.vue"),
    },
    {
        path: "/category/:id",
        props: true,
        name: 'one-category',
        component: () => import("../components/category/OneCategoryComponent.vue"),
    },
    {
        path: "/404.html",
        name: '404',
        component: () => import("../components/common/TheCode404.vue"),
    },
    {
        path: '/:pathMatch(.*)*',
        name: '404',
        component: () => import("../components/common/TheCode404.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
