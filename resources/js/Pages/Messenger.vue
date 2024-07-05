<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Panel from "@/Components/messenger/chat/Panel.vue";
import {computed, watchEffect} from "vue";
import {router, usePage} from "@inertiajs/vue3";
import UsersList from "@/Components/messenger/chat/UsersList.vue";

window.Echo
    .private(`message`)
    .listen('.message.sended', (e) => {
        router.reload({
            only: ['messages'],
            preserveState: true,
        })
    });



</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Messenger
            </h2>
        </template>

        <div class="py-12 h-[70vh] ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-start gap-4 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <users-list/>
                    <panel :messages="messages"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
