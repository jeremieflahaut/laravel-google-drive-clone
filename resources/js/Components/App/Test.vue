<template>
    <div>
        {{ message }}
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const count = ref<number>(0); // 'count' est déclaré comme un ref de type 'number'

function incrementCount() {
    // Ici, on essaie d'assigner une chaîne de caractères à 'count', ce qui devrait générer une erreur de type
    count.value = 'Ceci est une erreur'; // Cette ligne devrait être mise en évidence
}

const message = computed(() => `Le compte est maintenant : ${count.value}`);
</script>

