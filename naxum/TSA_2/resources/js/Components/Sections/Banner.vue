<script setup lang="ts">
import SiteImage from '@assets/images/sitename.png';
</script>

<template>
    <div class="banner flex h-[758px] justify-center">
        <div class="w-5/6 content-center">
            <h1
                class="w-[600px] text-[65px] font-light leading-[80px] text-primary"
            >
                COLLAGEN IS THE FOUNTAIN OF YOUTH
            </h1>
            <p class="text-[30px] font-light text-default">
                WHAT'S YOUR INFLUENCE?
            </p>
            <button
                type="button"
                class="mt-16 h-[64px] w-[359px] rounded-lg bg-[#456276] text-[22px] font-black text-white"
            >
                <div class="flex flex-row justify-center gap-2">
                    <img :src="SiteImage" class="" />
                    <p class="self-center">Connect with Ben</p>
                </div>
            </button>
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
