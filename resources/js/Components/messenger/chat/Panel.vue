<script setup>
import ChatMessage from "@/Components/messenger/chat/Message.vue";
import SendMessage from "@/Components/messenger/chat/SendMessage.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage()
const messages = computed(() => page.props.messages)

</script>

<template>
    <div class="flex flex-1 flex-col gap-4 h-full bg-[--p-surface-300] shadow-xl rounded-xl p-4">
        <div v-if="messages.length" class="">
            <TransitionGroup name="list" tag="div" class="flex flex-1 flex-col gap-2 overflow-y-auto max-h-[60vh]">
                <chat-message v-for="message in messages" :key="message.id" :text="message.text" :isOwn="message.isOwn"/>
            </TransitionGroup>
        </div>
        <div v-else class="w-full h-[50vh] flex items-center justify-center">
            <p>Нет сообщений</p>
        </div>
        <send-message/>
    </div>
</template>

<style scoped>
    .list-enter-active,
    .list-leave-active {
        transition: all 0.5s ease;
    }
    .list-enter-from,
    .list-leave-to {
        opacity: 0;
    }
</style>

