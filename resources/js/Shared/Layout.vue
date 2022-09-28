<template>
    <Nav />

    <main>
        <slot></slot>
    </main>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container text-center">
            <span class="text-light">Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})</span>
        </div>
    </footer>
</template>

<script>
import Nav from './Nav.vue';

export default {
    components: { Nav },

    props: {
        laravelVersion: String,
        phpVersion: String,
    }
};
</script>
