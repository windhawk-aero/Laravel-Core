<template>
    <client-only>
        <v-app name="TechXSec">
            <v-main>
                <HeaderDefault />
                <nuxt></nuxt>
                <FooterDefault />
            </v-main>
        </v-app>
    </client-only>
</template>

<script>
    import HeaderDefault from "../components/shared/headers/HeaderDefault.vue";
    import FooterDefault from "../components/shared/footers/FooterDefault.vue";

    export default {
        components: {
            HeaderDefault,
            FooterDefault
        },
        name: "layoutDefault",
    }
</script>
<style>
    @import '~/static/css/style.css';
</style>
