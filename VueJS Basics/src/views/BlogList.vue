<template>
     <div class="row gray-bg justify-content-center mt-5">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Blog List</h2>
                    <p>Where We Explore</p>
                </div>
            </div>
        </div>
        <div class="row m-2">
        <BlogCard :blogs=blogsList />
        </div>
</template>

<script>
import BlogCard from '../components/BlogCard'
import axios from 'axios'
export default {
    name:'BlogList',
    components:{
        BlogCard,
    },
    data() {
        return {
            blogsList:[]
        }
    },
   async created() {
        try {
            const res = await axios.get('https://jsonplaceholder.typicode.com/posts');

            this.blogsList = res.data;
        } catch (error) {
            console.log(error)
        }
    }
}
</script>

<style scoped>
</style>