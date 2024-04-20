<script setup>
import { ref, reactive} from 'vue';
import {router, usePage} from '@inertiajs/vue3';

import Close from 'vue-material-design-icons/Close.vue';
import ArrowLeft from 'vue-material-design-icons/ArrowLeft.vue';
import MapMarkertOutline from 'vue-material-design-icons/MapMarkerOutline.vue';
import ChevronDown from 'vue-material-design-icons/ChevronDown.vue';

//const user = usePage().props.auth.user
const emit  = defineEmits(['close'])

const form = reactive({
	text: null,
	file: null,
})

let isvalidFile = ref(null)
let fileDisplay = ref('')
let textarea = ref('')
let error = ref({
	text: null,
	file: null,
})

const closeOverlay = () => {
	form.text = null
	form.file = null
	fileDisplay.value = ''
	emit('close')
}

</script>

<template>
   <div id="OverlaySection" class="fixed z-50 top-0 left-0 w-full h-screen bg-[#000000] bg-opacity-60 p-3">
<button class="absolute right-3 cursor-pointer" @click="$event => closeOverlay()">
	<Close :size="27" fillColor="#FFFFFF"/>

</button>
   </div>
</template>