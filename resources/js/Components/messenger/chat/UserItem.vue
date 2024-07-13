<script setup>
import Badge from "primevue/badge";
import Avatar from 'primevue/avatar';

const {user, active} = defineProps(['user', 'active'])

</script>

<template>
    <a :href="route('get-user-messages', {'user': user.id})">
        <div class="flex items-center gap-2">
                <div class="relative">
                    <Avatar :label="user.name.slice(0, 2)" size="large" shape="circle" :class="['shadow-md', active && 'outline outline-[var(--p-primary-color)]']" />
                    <Badge v-if="user.unread_messages_count" :value="user.unread_messages_count" size="small" class="absolute top-0 right-0 -translate-y-[0.25rem] translate-x-[0.25rem]"></Badge>
                </div>
            <p>{{user.name}}</p>
        </div>
    </a>
</template>

