<template>
    <div>
        <HomePageSlider />
        <PopularAdverts />
        <WhitePaper />
        <Why />
    </div>
</template>

<script>
    import HomePageSlider from "../components/partials/home/HomePageSlider/HomePageSlider.vue"
    import PopularAdverts from "../components/partials/home/PopularAdverts/PopularAdverts.vue"
    import WhitePaper from "../components/partials/home/WhitePaper/WhitePaper.vue"
    import Why from "../components/partials/home/Why/Why.vue"

    export default {
        middleware: 'auth',
        auth: false,
        transition: 'zoom',
        name: "home",
        layout: 'layoutDefault',
        methods: {
            auth: function() {
                console.log(this.$auth.user);
            },
            logout: async function() {
                await this.$auth.logout();
            },
        },
        beforeMount() {
            this.auth();
        },
        components: {
            HomePageSlider,
            PopularAdverts,
            WhitePaper,
            Why,
        },
    };
</script>
<style>
    @import '~/static/css/style.css';
</style>
