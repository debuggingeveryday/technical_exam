<script setup lang="ts">
import { ref } from 'vue';

import Image1 from '@assets/images/graceperez.png'
import Image2 from '@assets/images/bellamarie.png'
import Image3 from '@assets/images/gigihadid.png'

import Avatar1 from '@assets/images/avatar-graceperez.png'
import Avatar2 from '@assets/images/avatar-bellamarie.png'
import Avatar3 from '@assets/images/avatar-gigihadid.png'

const influencers = ref([
    {
        coverImage: Image1,
        avatar: Avatar1,
        name: 'Grace Perez',
        socialMedia: '@graceperez'
    },
    {
        coverImage: Image2,
        avatar: Avatar2,
        name: 'Bella Marie',
        socialMedia: '@bellamarie'
    },
    {
        coverImage: Image3,
        avatar: Avatar3,
        name: 'Gigi Hadid',
        socialMedia: '@gigihadid'
    }
]);

</script>

<template>
    <div class="h-[1050px] mx-auto container flex flex-row items-center justify-center">
        <div class="space-y-16">
            <div class="flex flex-col text-center">
                <h1 class="text-primary font-light text-[40px]">WHAT'S YOUR INFLUENCE?</h1>
                <p class="text-default font-light text-[23px]">
                    Is this you? Could this be you? Are you ready to be an influencer?
                </p>
            </div>
            <div class="container mx-auto max-w-5/6 flex flex-row space-x-16">
                <template v-for="item in influencers">
                    <div class="min-w-[342px] rounded-xl shadow-xl">
                        <img :src="item.coverImage" class="rounded-t-xl" />
                        <div class="h-[200px] flex flex-row justify-center gap-4">
                            <img :src="item.avatar" class="rounded-full h-[75px] self-center" />
                            <div class="self-center">
                                <p class="text-primary font-bold text-[21px]">{{ item.name }}</p>
                                <p class="text-default font-light text-[15px]">{{ item.socialMedia }}</p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
