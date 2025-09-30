<script setup lang="ts">
import SiteImage from '@assets/images/sitename.png';

</script>

<template>
        <button
            type="button"
            class="h-[64px] w-[359px] rounded-lg bg-[#456276] text-[22px] font-black text-white"
        >
            <div class="flex flex-row justify-center gap-2">
                <img :src="SiteImage" class="" />
                <p class="self-center">Connect with Ben</p>
            </div>
        </button>
</template>
