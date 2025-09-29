<script setup lang="ts">
import { ref } from 'vue';

import Product1 from '@assets/images/a1.png'
import Product2 from '@assets/images/d1.png'
import Product3 from '@assets/images/b1.png'

const items = ref([
    {
        title: "COLLAGEN PEPTIDE EXFOLIATING GEL",
        description: `Instant results with visible remove of dead cells. Clinically
                    proven to activate the skin repair process. Smooths wrinkles,
                    improves tone & elasticity.`,
        image: Product1,
        isReverse: false
    },
    {
        title: "BELLA COLLAGEN ELIXIR",
        subtitle: 'Beauty from the Inside Out',
        description: `Helps the body product more collagen.
Backed by double blind clinical studies.
Healthier skin, hair, nails, joints & more.`,
        image: Product2,
        isReverse: true
    },
    {
        title: "HYDRATING LIP PLUMPING OIL",
        description: `Ultimate softness, hydration, & comfort. A smooth and naturally-plump look. Shine of a gloss with the benefits of a balm.`,
        image: Product3,
        isReverse: false
    }
]);


</script>

<template>
    <div class="flex flex-col justify-center bg-[#E1DFDD3B] h-[1850px] space-y-24">
        <template v-for="item in items">
            <div class="w-[1097px] flex justify-between self-center" :class="{'flex-row-reverse': item.isReverse }">
                <div class="self-center">
                    <h1 class="text-[40px] w-[462px] text-primary font-light leading-[50px]">{{ item.title }}</h1>
                    <h3 class="mb-16 text-default text-[28px] font-light">{{ item?.subtitle }}</h3>
                    <p class="text-[23px] w-[642px] text-default flex flex-row font-light">
                        <div class="border-l-[5px] pl-5 mt-3 mb-4 content-center text-[#99A1A5] font-light"> </div>
                        {{ item.description }}
                    </p>
                </div>
                <div>
                    <img :src="item.image" class="w-[408px] h-[408px]" />
                </div>
            </div>
        </template>
    </div>
</template>
