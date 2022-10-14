<template>
      <div class="col-md-4" v-for="testimonial in testimonials" :key="testimonial.id">
            <div class="card d-flex mx-auto">
                <div class="card-image"> <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/3TlwnLF.jpg"> </div>
                <div class="card-text">
                    <div class="card-title">{{testimonial.username}}</div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum aliquam corrupti laborum. Sit in, ut eligendi ex et illum repudiandae.
                    </div>
                <div class="footer"> <span id="name">{{testimonial.name}}<br></span> <span id="position">CEO of <a href="#">{{testimonial.company.name}}</a></span> </div>
            </div>
        </div>
</template>

<script>
export default {
    name:'TestimonialCard',
    props:{
        testimonials:Array,
    },

}
</script>

<style scoped>
.card {
    border-radius: 1rem;
    box-shadow: 0px -10px 0px rgb(151, 248, 6)
}

@media(max-width:767px) {
    .card {
        margin: 1rem 0.7rem 1rem;
        max-width: 80vw
    }
}

img {
    width: 6.2rem;
    border-radius: 5rem;
    margin: 1.3rem auto 1rem auto
}

.col-md-4 {
    padding: 0 0.5rem
}

.card-title {
    font-size: 1rem;
    margin-bottom: 0;
    font-weight: bold;
    font-family: 'IM Fell French Canon SC'
}

.card-text {
    text-align: center;
    padding: 1rem 2rem;
    font-size: 0.8rem;
    color: rgb(82, 81, 81);
    line-height: 1.4rem
}

.footer {
    border-top: none;
    text-align: center;
    line-height: 1.2rem;
    padding: 2rem 0 1.4rem 0;
    font-family: 'Varela Round'
}

#name {
    font-size: 0.8rem;
    font-weight: bold
}

#position {
    font-size: 0.7rem
}

a {
    color: rgb(151, 248, 6);
    font-weight: bold
}

a:hover {
    color: rgb(151, 248, 6)
}
</style>