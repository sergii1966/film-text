<script>
import NavbarComponent from "./common/TheNavbar.vue";
export default {
    name: "App",
    props: [
    ],

    components: {
        'navbar-component': NavbarComponent,
     },
}
</script>

<template>
    <navbar-component></navbar-component>
    <router-view></router-view>
</template>
