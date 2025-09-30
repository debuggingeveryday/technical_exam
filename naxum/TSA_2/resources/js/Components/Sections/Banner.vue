<script setup lang="ts">
import ConnectWithBenButton from '@/Components/ConnectWithBenButton.vue';
</script>

<template>
    <div class="banner flex h-[758px] justify-center">
        <div class="w-5/6 content-center">
            <h1
                class="w-[600px] text-[65px] font-light leading-[80px] text-primary"
            >
                COLLAGEN IS THE FOUNTAIN OF YOUTH
            </h1>
            <p class="text-[30px] font-light text-default mb-16">
                WHAT'S YOUR INFLUENCE?
            </p>
            <ConnectWithBenButton />
        </div>
    </div>
</template>

<style lang="scss" scoped>
.banner {
    background-image:
        url('@assets/images/bella-grace-image8-1.png'),
        url('@assets/images/bella-grace-image3-removebg-preview-1.png');
    background-repeat: no-repeat;
    background-position:
        left bottom,
        right;
}
</style>
