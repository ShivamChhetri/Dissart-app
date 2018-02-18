<template>
    <div>
        <a href="#" @click.prevent="showadd=!showadd">Comments</a>
        <hr>
        <div v-if="showadd">
            <div class="form">
            <textarea v-model="newcomment" name="comment" rows="1" placeholder="Add a Comment..."></textarea>
            <button @click="addcomment()" class="btn btn-primary">Add Comment</button>
            </div>
            <hr>
            <div class="well" v-for="comment in comments">
                <h4>{{comment.user.name}}</h4>
                <p>{{comment.comment}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
            comments:[],
            showadd:false,
            newcomment:"thjy"
        }
    },
    created(){
        this.getcomment();
    },
    methods:{
        addcomment(){
            axios.post('/comment/'+this.id,{comment:this.newcomment})
                 .then(response=>{
                     this.getcomment();
                     console.log("comment added");
            }); 
        },
        getcomment(){
            axios.get('/comment/'+this.id)
                 .then(response=>{
                    this.comments= response.data;
                    console.log(this.comments);
            });
            this.newcomment="";
        }
    }     
}
</script>
<style scoped>
.form{
    display:flex;
}
.form textarea{
    flex: 1 auto;
    border: 1px solid #bcbcbc;
    border-radius:5px 0 0 5px;
}
.form button{
    border-radius:0 5px 5px 0;
}


.well{
    background: #dcdcdc;
    padding: 10px 20px;
    margin: 10px 0;
    border-radius: 5px;
}

/* div[contenteditable]{
    max-height: 200px;
    overflow: auto;
    flex: 1 auto;
    border: 1px solid #bcbcbc;
    border-radius:5px 0 0 5px;  
} */

</style>




