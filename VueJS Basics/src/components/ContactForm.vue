<template>
     <section class="gray-bg">
 <div class="container  mt-5">

      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">                        
            <h2 class="form-title">Get in Touch</h2>
          </div>
      </div>

      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div v-if="required" class="error">{{required}}</div>
              <form  @submit.prevent="submitForm" class="form" >

                  <div class="form-group">
                      <label class="form-label" id="nameLabel" for="name"></label>
                      <input type="text" class="form-control" id="name" name="name" v-model="name" placeholder="Your name" tabindex="1">
                  </div>
                  <div class="form-group">
                      <label class="form-label" id="emailLabel" for="email"></label>
                      <input type="email" class="form-control" v-model="email" id="email" name="email" placeholder="Your Email" tabindex="2">
                  </div>

                  <div class="form-group">
                      <label class="form-label" id="subjectLabel" for="subject"></label>
                      <input type="text" class="form-control" v-model="subject" id="subject" name="subject" placeholder="Subject" tabindex="3">
                  </div>

                  <div class="form-group">
                      <label class="form-label" id="messageLabel" for="message"></label>
                      <textarea rows="6" cols="60" name="message" v-model="message" class="form-control" id="message" placeholder="Your message" tabindex="4"></textarea>                                 
                  
                  </div>
                  <!-- <div style="white-space: pre-line;">{{message}}</div>  -->
                  <div v-if="submitted" class="text text-success">{{submitted}}</div>
                  <div class="text-center margin-top-25">
                      <button  type="submit" class="btn btn-mod btn-border btn-large">Send Message</button>
                  </div>

              </form><!-- End form -->
            
          </div><!-- End col -->

      </div><!-- End row -->
      
    </div>

</section>
</template>

<script>
export default {
    name:'TestimonialCard',
    data(){
      return {
        name:'',
        email:'',
        subject:'',
        message:'',
        required:'',
        submitted:'',
      }
    },
    methods:{
        submitForm:function(){
            if (this.name == '' || this.email == '' || this.subject == '' || this.message == '') {
              this.required = "All the fields are required"
              console.log(this.required)
            }
            else
            {
            console.log('email'+ this.email);
            console.log('name'+ this.name);
            console.log('subject'+ this.subject);
            console.log('message'+ this.message);
            this.required = ""
            this.submitted = "Form Submitted Successfully We Will Contact You Soon !!!"
            }
        }
    }
}
</script>

<style scoped>
#success-message {
  opacity: 0;
}

.col-xs-12.col-sm-12.col-md-12.col-lg-12 {
  padding: 0 20% 0 20%;
}

.margin-top-25 {
  margin-top: 25px;
}

.form-title {
  padding: 25px;
  font-size: 30px;
  font-weight: 300;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}

.form-group .form-control {
  -webkit-box-shadow: none;
  border-bottom: 1px;
  border-style: none none solid none;
  border-radius:0; 
  border-color: #000;
}

.form-group .form-control:focus {
	box-shadow: none;
  border-width: 0 0 2px 0;
  border-color: #000;
  
}

textarea {
  resize: none;
}

.btn-mod.btn-large {
    height: auto;
    padding: 13px 52px;
    font-size: 15px;
}

.btn-mod.btn-border {
    color: #000000;
    border: 1px solid #000000;
    background: transparent;
}

.btn-mod, a.btn-mod {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 4px 13px;
    color: #fff;
    background: rgba(34,34,34, .9);
    border: 1px solid transparent;
    font-size: 11px;
    font-weight: 400;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 2px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
    transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
}

.btn-mod.btn-border:hover, .btn-mod.btn-border:active, .btn-mod.btn-border:focus, .btn-mod.btn-border:active:focus {
    color: #fff;
    border-color: #000;
    background: #000;
    outline: none;
}
.error {
  color:red;
}

@media only screen and (max-width: 500px) {
    .btn-mod.btn-large {
       padding: 6px 16px;
       font-size: 11px;
    }
  
    .form-title {
        font-size: 20px;
  }
}

</style>