<script setup lang="ts">
import { computed, ref } from 'vue';

import FacebookIcon from '@assets/svgs/icon-facebook.svg';
import LinkedinIcon from '@assets/svgs/icon-linkedin.svg';
import SlackIcon from '@assets/svgs/icon-slack.svg';
import TwitterIcon from '@assets/svgs/icon-twitter.svg';

const props = defineProps<{
    name: 'facebook' | 'slack' | 'linkedin' | 'twitter';
}>();

const test = ref<string>('');

const icon = computed(() => {
    switch (props.name) {
        case 'facebook':
            return FacebookIcon;
        case 'slack':
            return SlackIcon;
        case 'linkedin':
            return LinkedinIcon;
        case 'twitter':
            return TwitterIcon;
        default:
            return '';
    }
});
</script>

<template>
    <img :src="icon" width="27px" height="27px" />
</template>
