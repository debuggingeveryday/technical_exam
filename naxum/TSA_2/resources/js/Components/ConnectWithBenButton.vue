<script setup lang="ts">
import SiteImage from '@assets/images/sitename.png';
</script>

<template>
    <button
        type="button"
        class="w-full rounded-lg bg-[#456276] text-[22px] font-black text-white md:h-[61px] md:min-h-[64px] md:w-[343px] md:min-w-[359px]"
    >
        <div class="flex flex-row justify-center gap-2">
            <img :src="SiteImage" class="" />
            <p class="self-center text-[20px] md:text-[22px]">
                Connect with Ben
            </p>
        </div>
    </button>
</template>
