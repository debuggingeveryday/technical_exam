<script setup lang="ts">
import Icon from '@/Components/Icon.vue';
</script>

<template>
    <div
        class="container mx-auto flex h-[180px] w-[1440px] flex-nowrap justify-between"
    >
        <img
            src="@assets/images/logo.png"
            class="h-[77px] w-[285px] self-center"
            alt="No image"
        />
        <nav class="flex flex-row justify-between gap-24 self-center">
            <ul class="nav flex w-[458px] items-center gap-8">
                <li class="nav__link--is-active">
                    <a href="#home">HOME</a>
                </li>
                <li class="nav__link">
                    <a href="#shop">SHOP</a>
                </li>
                <li class="nav__link">
                    <a href="#aboutus">ABOUT US</a>
                </li>
                <li class="nav__link">
                    <a href="#beinfluencer">BE AN INFLUENCER</a>
                </li>
            </ul>
            <ul class="flex w-[156px] items-center gap-4">
                <li>
                    <Icon name="facebook" />
                </li>
                <li>
                    <Icon name="slack" />
                </li>
                <li>
                    <Icon name="linkedin" />
                </li>
                <li>
                    <Icon name="twitter" />
                </li>
            </ul>
        </nav>
    </div>
</template>

<style lang="scss" scoped>
.nav {
    &__link {
        @apply mt-2 text-[16px] font-light text-[#99A1A5] hover:text-primary;

        &--is-active {
            @apply mt-2 font-bold text-primary;
        }
    }
}
</style>
