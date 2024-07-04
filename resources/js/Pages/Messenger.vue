<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ChatPanel from "@/Components/messenger/chat/ChatPanel.vue";
import {computed, watchEffect} from "vue";
import {router, usePage} from "@inertiajs/vue3";

const page = usePage()

window.Echo
    .private(`message`)
    .listen('.message.sended', (e) => {
        router.reload({
            only: ['messages'],
            preserveState: true,
        })
    });

const messages = computed(() => page.props.messages)
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Messenger
            </h2>
        </template>

        <div class="py-12 h-[70vh]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="grid grid-cols-[1fr_300px] gap-4">
                        <chat-panel :messages="messages"/>
                        <div class="bg-gray-300 w-full h-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
