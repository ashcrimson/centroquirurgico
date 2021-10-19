<template>
	<label for="toggle_button">
        <span v-if="currentState">On</span>
        <span v-if="! currentState">Off</span>

        <input type="checkbox" id="toggle_button">
    </label>
</template>

<script>
export default {
}
</script>

<script>
export default {
    data() {
        return {
            currentState: false
        }
    }
}
</script>