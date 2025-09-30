<script setup lang="ts">
import { ref } from 'vue';

import Image2 from '@assets/images/bellamarie.png';
import Image3 from '@assets/images/gigihadid.png';
import Image1 from '@assets/images/graceperez.png';

import Avatar2 from '@assets/images/avatar-bellamarie.png';
import Avatar3 from '@assets/images/avatar-gigihadid.png';
import Avatar1 from '@assets/images/avatar-graceperez.png';

const influencers = ref([
    {
        coverImage: Image1,
        avatar: Avatar1,
        name: 'Grace Perez',
        socialMedia: '@graceperez',
    },
    {
        coverImage: Image2,
        avatar: Avatar2,
        name: 'Bella Marie',
        socialMedia: '@bellamarie',
    },
    {
        coverImage: Image3,
        avatar: Avatar3,
        name: 'Gigi Hadid',
        socialMedia: '@gigihadid',
    },
]);
</script>

<template>
    <div
        class="min:h-[1050px] container mx-auto my-16 flex flex-row items-center justify-center"
    >
        <div class="space-y-16">
            <div class="mt-16 flex flex-col text-center">
                <h1 class="text-[30px] font-light text-primary md:text-[40px]">
                    WHAT'S YOUR INFLUENCE?
                </h1>
                <p class="text-[23px] font-light text-default">
                    Is this you? Could this be you? Are you ready to be an
                    influencer?
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-16 md:space-x-16">
                <template v-for="item in influencers">
                    <div class="rounded-xl shadow-xl md:w-[342px]">
                        <img :src="item.coverImage" class="rounded-t-xl" />
                        <div class="my-8 flex flex-row justify-center gap-4">
                            <img
                                :src="item.avatar"
                                class="h-[75px] self-center rounded-full"
                            />
                            <div class="self-center">
                                <p class="text-[21px] font-bold text-primary">
                                    {{ item.name }}
                                </p>
                                <p class="text-[15px] font-light text-default">
                                    {{ item.socialMedia }}
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
