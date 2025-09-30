<script setup lang="ts">
import Footer from '@/Components/Partials/Footer.vue';
import Header from '@/Components/Partials/Header.vue';
import Section from '@/Components/Section.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Index" />
    <div>
        <Header />
        <Section type="banner" />
        <Section type="congratulation" />
        <Section type="item" />
        <Section type="influencer" />
        <Section type="learn-more" />
        <Footer />
    </div>
</template>
