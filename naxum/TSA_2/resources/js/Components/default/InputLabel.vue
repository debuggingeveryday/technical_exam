<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <label class="text-gray-700 dark:text-gray-300 block text-sm font-medium">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
