<script setup lang="ts">
import { ref } from 'vue';

import Product1 from '@assets/images/a1.png';
import Product3 from '@assets/images/b1.png';
import Product2 from '@assets/images/d1.png';

const items = ref([
    {
        title: 'COLLAGEN PEPTIDE EXFOLIATING GEL',
        description: `Instant results with visible remove of dead cells. Clinically
                    proven to activate the skin repair process. Smooths wrinkles,
                    improves tone & elasticity.`,
        image: Product1,
        isReverse: false,
    },
    {
        title: 'BELLA COLLAGEN ELIXIR',
        subtitle: 'Beauty from the Inside Out',
        description: `Helps the body product more collagen.
Backed by double blind clinical studies.
Healthier skin, hair, nails, joints & more.`,
        image: Product2,
        isReverse: true,
    },
    {
        title: 'HYDRATING LIP PLUMPING OIL',
        description: `Ultimate softness, hydration, & comfort. A smooth and naturally-plump look. Shine of a gloss with the benefits of a balm.`,
        image: Product3,
        isReverse: false,
    },
]);
</script>

<template>
    <div
        class="flex flex-wrap items-center justify-center bg-[#E1DFDD3B] md:flex md:h-[1850px] md:flex-col md:space-y-24"
    >
        <template v-for="item in items">
            <div
                class="mx-8 flex flex-wrap-reverse justify-between space-y-8 self-center md:w-[1097px]"
                :class="[
                    item.isReverse ? 'md:flex-row-reverse' : 'md:flex-row',
                ]"
            >
                <div class="self-center">
                    <h1
                        class="mt-16 text-[30px] font-light leading-[50px] text-primary md:w-[462px] md:text-[40px]"
                    >
                        {{ item.title }}
                    </h1>
                    <h3 class="mb-16 text-[28px] font-light text-default">
                        {{ item?.subtitle }}
                    </h3>
                    <div
                        class="flex flex-row text-[23px] font-light text-default md:w-[642px]"
                    >
                        <div
                            class="mb-4 mt-3 content-center border-l-[5px] pl-5 text-[23px] font-light text-[#788995BF]"
                        ></div>
                        {{ item.description }}
                    </div>
                </div>
                <div>
                    <img :src="item.image" class="md:h-[408px] md:w-[408px]" />
                </div>
            </div>
        </template>
    </div>
</template>
