<script setup lang="ts">
import Banner from '@/Components/Sections/Banner.vue';
import Congratulation from '@/Components/Sections/Congratulation.vue';
import Influencer from '@/Components/Sections/Influencer.vue';
import Item from '@/Components/Sections/Item.vue';
import LearnMore from '@/Components/Sections/LearnMore.vue';
import { computed } from 'vue';

const props = defineProps<{
    type: 'banner';
}>();

const section = computed(() => {
    switch (props.type) {
        case 'banner':
            return Banner;
        case 'congratulation':
            return Congratulation;
        case 'item':
            return Item;
        case 'influencer':
            return Influencer;
        case 'learn-more':
            return LearnMore;
    }
});
</script>

<template>
    <Component :is="section" />
</template>
