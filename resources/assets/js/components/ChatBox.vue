<template>
    <div class="discuss">

        <h2>Discuss
        <small class="badge badge-success badge-pill float-right">{{online.length}}</small> 
        </h2>
        <div v-for="useronline in online">
            <div v-show='!discuss' class="alert alert-success">{{useronline.name}}</div>
        </div>

        <div v-show="!discuss">
            <h2 @click="showDiscussion()" class="btn btn-info">Join Discussion</h2>
        </div>
        <div v-show="discuss">
            <div id="chatbox">
                <div v-for="message in messages">
                    <div class="box">
                        <h2>{{message.body}}</h2>
                        <p>{{message.user.name}}</p>
                    </div>
                    <br>
                </div>
            </div>
            <div class="message">
                <input type="text" v-model="msgtxt" @keyup.enter="send()" placeholder="your msg..">   
                <button @click="send()" class="btn btn-info">Send</button>
            </div>   
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{ 
            messages:[],    
            msgtxt:"",
            discuss: false,
            online:[]
    
        }
    },
    created(){
        this.getmsg();
    },
    methods:{
        send(){
            axios.post('/messages',{body:this.msgtxt})
            .then(response=>{
                this.getmsg();
                console.log('data transfered');
            });
            this.msgtxt="";
        },
        getmsg(){
            axios.get('/messages').then(response=>{
                this.messages= response.data.slice(0,8);
                console.log('message recieved');
            });
        },
        showDiscussion(){
            this.discuss=true;
        }
    },
    mounted(){
        Echo.join('chatroom')
        .here((users)=>{
            this.online= users;
        })
        .joining((users)=>{
            this.online.push(users);
        })
        .leaving((users)=>{
            this.online.pop();
        })
        .listen('MessagePosted',(e)=>{
            this.messages.push({
                body: e.message.body,
                user_id: e.user.id,
                user: e.user
            });
        });
    },
    updated(){
        var container = this.$el.querySelector("#chatbox");
        container.scrollTop = container.scrollHeight;
    }
        
    }
</script>
<style>

.discuss{
    position: fixed;
}
#chatbox{
    max-height: 400px;
    border: 1px solid #bcbcbc;
    border-radius:5px 0;
    overflow-y: scroll;
}
.box{
    background: #dcdcdc;
    padding:10px 20px;
    border-radius: 5px;
}
.box p{
    text-align: right;
}
.message{
    display: flex;
}
.message input{
    flex: 1 auto;
}
.message button{
    border-radius: 0 !important;
}

</style>




