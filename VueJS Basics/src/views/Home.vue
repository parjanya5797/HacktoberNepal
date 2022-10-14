<template>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div v-for="carousel in carousels" :key="carousel.id" :class="[carousel.id == 1?'active':'','carousel-item']">
      <img class="carousel-img" v-bind:src=carousel.url >
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<section class="section gray-bg" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Latest News</h2>
                    <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites</p>
                </div>
            </div>
        </div>
        <div class="row">
        <BlogCard :blogs=blogs />
        </div>
    </div>
</section>
<section class="container mt-4">
    <div class="row">
        <TestimonialCard :testimonials=testimonials />
    </div>
</section>
<ContactForm/>
</template>


<script>
import axios from 'axios'
import BlogCard from '../components/BlogCard'
import ContactForm from '../components/ContactForm'
import TestimonialCard from '../components/TestimonialCard'
export default{
    name:"Home",
    components:{
        BlogCard,
        TestimonialCard,
        ContactForm,
    },
    data(){
        return {
            carousels:[],
            blogs:[],
            testimonials:[]
        }
    },
  async created(){
        this.carousels = [
            {
                id:1,
                url:"1.jpg",
            },
            {
                 id:2,
                url:"2.jpg",
            },
            {
                 id:3,
                url:"3.jpg",
            }
        ]
        try {
            const res = await axios.get('https://jsonplaceholder.typicode.com/posts/1');
            const  res1 = await axios.get('https://jsonplaceholder.typicode.com/posts/2');
            const  res2 = await axios.get('https://jsonplaceholder.typicode.com/posts/3');

            const testimonial = await axios.get('https://jsonplaceholder.typicode.com/users/1');
            const  testimonial1 = await axios.get('https://jsonplaceholder.typicode.com/users/2');
            const testimonial2 = await axios.get('https://jsonplaceholder.typicode.com/users/3');
            this.blogs[0] = res.data
            this.blogs[1] = res1.data
            this.blogs[2] = res2.data

            this.testimonials[0] = testimonial.data
            this.testimonials[1] = testimonial1.data
            this.testimonials[2] = testimonial2.data
        } catch (error) {
            console.error(error)
        }
       

    }
}
</script>

<style>
.carousel-img{
    height: 400px;
    width: 1387px;
}


.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #ebf4fa;
}
/* Blog 
---------------------*/
.blog-grid {
  margin-top: 15px;
  margin-bottom: 15px;
}
.blog-grid .blog-img {
  position: relative;
  border-radius: 5px;
  overflow: hidden;
}
.blog-grid .blog-img .date {
  position: absolute;
  background: #3a3973;
  color: #ffffff;
  padding: 8px 15px;
  left: 0;
  top: 10px;
  font-size: 14px;
}
.blog-grid .blog-info {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  background: #ffffff;
  padding: 20px;
  margin: -30px 20px 0;
  position: relative;
}
.blog-grid .blog-info h5 {
  font-size: 22px;
  font-weight: 500;
  margin: 0 0 10px;
}
.blog-grid .blog-info h5 a {
  color: #3a3973;
}
.blog-grid .blog-info p {
  margin: 0;
}
.blog-grid .blog-info .btn-bar {
  margin-top: 20px;
}

.px-btn-arrow {
    padding: 0 50px 0 0;
    line-height: 20px;
    position: relative;
    display: inline-block;
    color: #fe4f6c;
    -moz-transition: ease all 0.3s;
    -o-transition: ease all 0.3s;
    -webkit-transition: ease all 0.3s;
    transition: ease all 0.3s;
}


.px-btn-arrow .arrow {
    width: 13px;
    height: 2px;
    background: currentColor;
    display: inline-block;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    right: 25px;
    -moz-transition: ease right 0.3s;
    -o-transition: ease right 0.3s;
    -webkit-transition: ease right 0.3s;
    transition: ease right 0.3s;
}

.px-btn-arrow .arrow:after {
    width: 8px;
    height: 8px;
    border-right: 2px solid currentColor;
    border-top: 2px solid currentColor;
    content: "";
    position: absolute;
    top: -3px;
    right: 0;
    display: inline-block;
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}




/* //Testimonial */


</style>