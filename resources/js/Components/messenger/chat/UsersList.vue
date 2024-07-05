<script setup>
import UserItem from "@/Components/messenger/chat/UserItem.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import Avatar from "primevue/avatar";

const page = usePage()
const users = computed(() => page.props.contacts)
const current = computed(() => page.props.receiver)
</script>

<template>
    <div class="w-[210px] flex flex-col gap-4">
        <user-item v-for="user in users" :key="user.id" :user="user"  :active="user.id === current.id" />
    </div>
</template>
