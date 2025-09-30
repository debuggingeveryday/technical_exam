<script setup lang="ts">
import { ref } from 'vue';

const message = ref<string>('');
const isShow = ref<boolean>(false);

const show = (value: string) => {
    message.value = value;
    isShow.value = true;

    setTimeout(() => {
        isShow.value = false;
    }, 5000);
};

defineExpose({
    show,
});
</script>

<template>
       <transition
      enter-active-class="transition ease-out duration-300"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
    <div
        v-if="isShow"
        class="fixed right-4 top-4 rounded-b border-t-4 border-teal-500 bg-teal-100 px-4 py-3 text-teal-900 shadow-md"
        role="alert"
    >
        <div class="flex">
            <div class="py-1">
                <svg
                    class="mr-4 h-6 w-6 fill-current text-teal-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                    />
                </svg>
            </div>
            <div>
                <p class="font-bold">Register Successfully</p>
                <p class="text-sm">{{ message }}</p>
            </div>
        </div>
    </div>
    </transition>
</template>
