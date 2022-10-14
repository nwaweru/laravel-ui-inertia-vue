<template>
    <Nav :env="env" :auth="auth" />

    <slot></slot>
</template>

<script>
import Nav from './Nav.vue';

export default {
    props: {
        env: Object,
        auth: Object,
    },

    components: { Nav }
};
</script>
