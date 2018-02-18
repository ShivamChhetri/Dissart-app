<template>
    <div>
       <input type="text" v-model="searchtxt" @keyup.enter="searchpage()" @keyup="searching()" placeholder="search an article">
        <div class="result">
            <ul v-for="post in searched" class="list-group">
                    <li @click="fill(post.title)" class="list-group-item">
                        {{post.title}}
                    </li>
            </ul>
        </div> 
    </div>
</template>

<script>
export default {
    data(){
        return{
            searchtxt:"",
            searched:[]
        }
    },
    methods:{
        searching(){
            axios.get('/searching/'+this.searchtxt)
                 .then(response=>{
                    this.searched= response.data;
                    console.log(response.data);
        });
        },
        fill(title){
            this.searchtxt= title;
        },
        searchpage(){
            window.location.href="/search/"+this.searchtxt ;
      
        }
    }     
}
</script>
<style scoped>
input{
    width: 300px;
    border: none;
    border: 1px #bcbcbc solid;
    border-radius: 5px;
    padding: 2px 6px;
    
}

.result{
    position: fixed;
    width: 300px;
}

</style>




