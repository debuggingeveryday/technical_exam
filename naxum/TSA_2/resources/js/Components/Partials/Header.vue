<script setup lang="ts">
import Icon from '@/Components/Icon.vue';
</script>

<template>
    <div class="container mx-auto">
        <div
            class="grid-row-2 grid h-[180px] max-w-[1440px] justify-center sm:flex sm:flex-wrap sm:justify-between"
        >
            <img
                src="@assets/images/logo.png"
                class="h-[77px] w-[285px] self-center"
                alt="No image"
            />
            <ul class="nav hidden max-w-[458px] gap-8 md:flex md:items-center">
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
            <div class="flex justify-between gap-16 md:flex md:justify-between">
                <ul class="flex self-center justify-self-start md:hidden">
                    <li><Icon name="menu" /></li>
                </ul>
                <ul
                    class="flex items-center gap-4 md:flex md:max-w-[156px] md:items-center md:gap-4"
                >
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
            </div>
        </div>
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
