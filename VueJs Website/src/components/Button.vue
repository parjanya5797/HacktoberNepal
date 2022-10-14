<template>
    <button @click="onClick()" :style="{background: color}" class="btn">{{text}}</button>
</template>

<script>
    export default {
        name:'Button',
        props:{
            text:
            {
                type:String,
                default:"Default"
            },
            color:
            {
                type:String,
                default:'#000'
            }
        },
        methods:{
            onClick() {
                this.$emit('toggle-add-form')
            }
        }
    }
</script>