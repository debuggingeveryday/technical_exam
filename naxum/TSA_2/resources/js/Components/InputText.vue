<script lang="ts" setup>
import { computed } from 'vue';
const props = defineProps(['placeholder', 'name', 'error']);

const hasError = computed(() => !!props.error);
</script>

<template>
    <div>
        <input
            type="text"
            :name="props.name"
            :placeholder="props.placeholder"
            class="w-full border-0 border-b-[1px] border-neutral-500 p-0 text-[12px] font-light outline-none ring-0 focus:border-b-[1px] focus:border-blue-500 focus:outline-none focus:ring-0 md:text-[14px]"
            :class="{ 'border-red-500': hasError }"
        />
        <span
            v-if="hasError"
            class="my-0 py-0 text-xs font-light text-red-500"
            >{{ props.error }}</span
        >
    </div>
</template>
