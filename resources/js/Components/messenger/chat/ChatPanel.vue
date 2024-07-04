<script setup>
import ChatMessage from "@/Components/messenger/chat/ChatMessage.vue";
import ChatSendMessage from "@/Components/messenger/chat/ChatSendMessage.vue";

const {messages} = defineProps(['messages'])


</script>

<template>
    <div class="grid grid-rows-[1fr_100px] h-full">
        <div class="flex flex-col gap-2 overflow-y-auto max-h-[60vh]">
            <chat-message v-for="message in messages" :key="message.id" :text="message.text" :isOwn="message.isOwn"/>
        </div>
        <chat-send-message/>
    </div>
</template>

