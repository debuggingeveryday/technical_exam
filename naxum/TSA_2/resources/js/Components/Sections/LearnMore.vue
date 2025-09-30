<script setup lang="ts">
import ConnectWithBenButton from '@/Components/ConnectWithBenButton.vue';
import InputText from '@/Components/InputText.vue';
import Notification from '@/Components/Notification.vue';
import { Form } from '@inertiajs/vue3';
import { ref } from 'vue';

const notification = ref<any>();

const showModal = ref<boolean>(false);

const handleSuccess = () => {
    console.log(notification);
    notification.value.show("You've been registered");
};
</script>

<template>
    <Notification ref="notification" />

     <div
        class="min-h-[276px] bg-[#F0F1F2] md:max-h-[276px] flex justify-center items-center"
    >
        <div class="md:w-3/5 w-full flex md:flex-row flex-wrap justify-between space-y-8">
             <div class="align-middle self-center md:max-w-[576px]">
                <h1 class="md:text-[45px] md:text-left text-center text-[30px] font-light text-primary">
                    WOULD YOU LIKE TO LEARN MORE?
                </h1>
            </div>
            <div class="md:w-[343px] min-w-[343px] flex justify-center mx-auto">
                <ConnectWithBenButton @click="showModal = true" />
            </div>
        </div>
    </div>

    <div
        class="flex h-[774px] max-h-[1442px] flex-col items-center justify-center bg-neutral-900 bg-[url(@assets/images/learn-more-banner.png)] bg-cover bg-no-repeat"
        :class="[showModal ? 'bg-blend-soft-light' : '']"
    >

    <transition
      enter-active-class="transition ease-out duration-300"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
        <div
            class="max:w-[720px] grid min-h-[653px] grid-cols-1 bg-white md:w-[720px] md:grid-cols-2"
            v-if="showModal"
        >
            <div
                class="hidden bg-[url(@assets/images/learn-more-guy-with-cellphone.png)] bg-no-repeat md:block"
            ></div>
            <Form
                :action="route('register')"
                method="post"
                @success="handleSuccess"
                #default="{ errors, hasError }"
                :options="{
                    preserveScroll: true,
                    preserveState: true,
                }"
                resetOnSuccess
            >
                <div
                    :class="[
                        'flex flex-col justify-center p-8',
                        Object.keys(errors).length > 0
                            ? 'space-y-7'
                            : 'space-y-11',
                    ]"
                >
                    <span
                        class="h-[11px] w-[11px] self-end bg-[url(@assets/svgs/icon-close.svg)] text-default"
                        @click="showModal = false"
                    ></span>
                    <div class="text-[27px] leading-[30px] text-primary">
                        REGISTER TO LEARN MORE
                    </div>
                    <InputText
                        name="first_name"
                        placeholder="First Name"
                        :error="errors.first_name"
                    />
                    <InputText
                        name="last_name"
                        placeholder="Last Name"
                        :error="errors.last_name"
                    />
                    <InputText
                        name="phone_number"
                        placeholder="Best Phone Number"
                        :error="errors.phone_number"
                    />
                    <InputText
                        name="email"
                        placeholder="Email"
                        :error="errors.email"
                    />

                    <div class="flex flex-col space-y-6">
                        <img
                            src="@assets/images/learn-more-captcha.png"
                            class="-mt-6 md md:h-[99px] h-[88px]"
                        />
                        <button
                            type="submit"
                            class="rounded-lg bg-[#456276] p-3 font-bold text-white"
                        >
                            Register Now
                        </button>
                    </div>
                </div>
            </Form>
        </div>
        </transition>
    </div>
</template>
