<template>
<div class="btn btn-default">
    <div :class="{'text-danger':red}" @click="like()">
        <i class="fa fa-heart"></i>
        <span class="badge">
            {{liketxt}}
        </span>
    </div>
</div>    
</template>


<script>
export default {
    props:['postid'],
    data(){
        return{
            liketxt:"",
            red: false
        }
    },
    mounted(){
    this.checklike(); 
    },
    methods:{
        like(){
            console.log('post');
            axios.post('/post/like', {postid:this.postid})
                 .then(response=>{
                    console.log('yeah');
                    this.checklike();
            });
        },
        checklike(){
            axios.get('/post/'+this.postid+'/islikedbyme')
                 .then(response=>{
                     console.log(response.data);
                    if (response.data == true) {
                        this.liketxt = "Unlike";
                        this.red= true;
                    }else {
                        this.liketxt = "Like";
                        this.red=false;
                    }
            });
        }
    } 
}
</script>

