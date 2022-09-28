<template>
    <Nav />

    <slot></slot>

    
</template>

<script>
import Nav from './Nav.vue';

export default {
    components: { Nav }
};
</script>
