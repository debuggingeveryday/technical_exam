<script setup lang="ts">
import { reactive } from 'vue';
import ConnectWithBenButton from '@/Components/ConnectWithBenButton.vue'
import InputText from '@/Components/InputText.vue'

const registerForm = reactive({
    firstName: '',
    lastName: '',
    bestPhoneNumber: '',
    email: ''
});

</script>

<template>
    <div class="bg-[#F0F1F2] h-[276px] flex flex-col justify-center">
        <div class="flex flex-row justify-center items-center h-[27px]">
            <div class="inline-block align-middle max-w-[576px]">
                <h1 class="text-primary text-[45px]">WOULD YOU LIKE TO LEARN MORE?</h1>
            </div>
            <div class="flex flex-col items-center">
                <ConnectWithBenButton />
            </div>
        </div>
    </div>
    <div class="bg-no-repeat bg-cover bg-[url(@assets/images/learn-more-banner.png)] bg-neutral-900 bg-blend-soft-light h-[774px] max-h-[1442px] flex flex-col justify-center items-center">
        <div class="w-[720px] h-[653px] bg-white grid grid-cols-2">
            <div class="bg-[url(@assets/images/learn-more-guy-with-cellphone.png)] bg-no-repeat">
            </div>
            <div class="flex flex-col justify-center p-8 space-y-12">
                <span class="text-default bg-[url(@assets/svgs/icon-close.svg)] h-[11px] w-[11px] self-end"></span>
                <div class="text-primary text-[27px] leading-[30px]">
                    REGISTER TO LEARN MORE
                </div>
                <div class="flex flex-col space-y-12">
                    <InputText v-model="registerForm.firstName" placeholder="First Name" />
                    <InputText v-model="registerForm.lastName" placeholder="Last Name" />
                    <InputText v-model="registerForm.bestPhoneNumber" placeholder="Best Phone Number" />
                    <InputText v-model="registerForm.email" placeholder="Email" />
                    <div class="flex flex-col space-y-6">
                        <img src="@assets/images/learn-more-captcha.png" class="-mt-6" />
                        <button type="submit" class="bg-[#456276] font-bold text-white p-3 rounded-lg">Register Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


