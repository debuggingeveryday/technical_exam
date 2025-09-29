<script setup lang="ts">
import Image1 from '@assets/images/graceperez.png'
import Image2 from '@assets/images/bellamarie.png'
import Image3 from '@assets/images/gigihadid.png'

import Avatar1 from '@assets/images/avatar-graceperez.png'

</script>

<template>
    <div class="flex flex-col text-center">
        <h1 class="text-primary font-light text-[40px]">WHAT'S YOUR INFLUENCE?</h1>
        <p class="text-default font-light text-[23px]">
            Is this you? Could this be you?
            Are you ready to be an influencer?
        </p>
    </div>
    <div class="container mx-auto w-5/6">
        <div class="border-white drop-shadow-xl max-w-[398px]">
            <img :src="Image1" class="rounded-t-3xl" />
            <div class="flex flex-row gap-4 space-y-16 max-h-[75px]">
                <img :src="Avatar1" class="rounded-full"  />
                <div>
                    <p class="text-primary font-bold">Grace Perez</p>
                    <p class="text-default font-light">@graceperez</p>
                </div>
            </div>
        </div>
    </div>
</template>
