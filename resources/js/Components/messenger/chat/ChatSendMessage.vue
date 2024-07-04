<script setup>
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import {useForm} from "@inertiajs/vue3";


const message = useForm({
    text: null,
    reciever_id: 1,
})

const send = () => {
    message.post(route('send-message'))
    message.text = null
}
</script>

<template>
    <div class="flex items-center gap-8">
        <form class="w-full flex items-center gap-2" @submit.prevent="send">
            <Textarea class="w-full" autoResize rows="1" v-model="message.text" />
            <Button icon="pi pi-arrow-right" rounded type="submit"/>
        </form>
    </div>
</template>

