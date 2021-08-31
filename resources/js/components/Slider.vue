
<template>
<div class="container col-md-4 px-80 py-12">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div>
            <h1 class="display-5 fw-bold lh-1 mb-3 text-white" >Новинки!</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start" >
                <button class="btn btn-primary" v-on:click="changePic();">&lt;</button>
                    <div class="bookImg">
                        <transition name="slide-fade">
                            <p v-if="imgVisibility">
                                <img src="/imgs/0.jpg" class="bookImg" id="bookImg">
                            </p>
                        </transition> 
                    </div>
                     <button class="btn btn-primary" v-on:click="imgVisibility = !imgVisibility; changePic();">&gt;</button>
            </div>
        </div>
    </div>
</div> 
</template>

<script>

export default {
    data () {
        return {
            imgVisibility: true,
             counter: 0
        }
      },
      methods: {
          changeVisibility() {
              return {
            imgVisibility: !imgVisibility
          }
        },
          addCounter() {
               return {
             counter: counter + 1
          }
        },
          changePic(){
              var img = document.getElementById('bookImg');
              /*counter = counter + 1;*/
              var counter = Math.floor(Math.random() * 5);
              img.src = "/imgs/"+counter+".jpg"
              return {
                  counter
              }
          }
	}
}
    
</script>

<style>

.bookImg{
    height: 360px;
    width: 240px;
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

</style>
