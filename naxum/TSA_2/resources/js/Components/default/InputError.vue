<script setup lang="ts">
defineProps<{
    message?: string;
}>();
</script>

<template>
    <div v-show="message">
        <p class="text-red-600 dark:text-red-400 text-sm">
            {{ message }}
        </p>
    </div>
</template>
