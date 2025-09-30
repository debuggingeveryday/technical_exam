<script lang="ts" setup>
const model = defineModel();
const props = defineProps(['placeholder'])


</script>

<template>
    <input type="text" v-model="model" :placeholder="props.placeholder"
        class="
            border-0 border-b-[1px]
            border-neutral-500
            outline-none ring-0
            focus:border-b-[1px]
            focus:border-blue-500
            focus:outline-none
            focus:ring-0 p-0 w-full
            font-light
        " />
</template>
