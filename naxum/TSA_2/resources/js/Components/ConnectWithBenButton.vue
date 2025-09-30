<script setup lang="ts">
import SiteImage from '@assets/images/sitename.png';
</script>

<template>
    <button
        type="button"
        class="md:h-[61px] w-full md:w-[343px] rounded-lg bg-[#456276] text-[22px] font-black text-white md:min-h-[64px] md:min-w-[359px] w-full"
    >
        <div class="flex flex-row justify-center gap-2">
            <img :src="SiteImage" class="" />
            <p class="self-center text-[20px] md:text-[22px]">
                Connect with Ben
            </p>
        </div>
    </button>
</template>
