<template>
    <div class="col-lg-4" v-for="blog in blogs" :key="blog.id">
        <div class="blog-grid">
            <div class="blog-img">
                <div class="date">04 FEB</div>
                <router-link :to="{name:'BlogDetail',params:{post_id:blog.id}}">
                    <img src="https://via.placeholder.com/350x280/FF7F50/000000" title="" alt="">
                </router-link>
            </div>
            <div class="blog-info">
                <h5><router-link :to="{name:'BlogDetail',params:{post_id:blog.id}}">{{blog.title}}</router-link></h5>
                <p>{{blog.body}}</p>
                <div class="btn-bar">
                    <router-link :to="{name:'BlogDetail',params:{post_id:blog.id}}" class="px-btn-arrow">
                        <span>Read More</span>
                        <i class="arrow"></i>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'BlogCard',
    props:{
        blogs:Array,
    },

}
</script>

[
    {
  "userId": 1,
  "id": 1,
  "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
  "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
},
{
  "userId": 2,
  "id": 2,
  "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
  "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
}
]