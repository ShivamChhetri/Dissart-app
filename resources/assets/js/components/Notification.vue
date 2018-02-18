<template>
<div>
    <i class="fa fa-bell"></i>
    <span v-if="newunread!=0">
        <span class="badge badge-danger">
            {{newunread}}
        </span>
    </span>    
</div>
</template>

<script>
export default {
    props:['unread','userid'],
    data(){
        return{
          newunread: this.unread,
        }
    },
    created(){
        console.log(this.unread);
    },
    mounted(){
        Echo.private('App.User.' + this.userid)
            .notification((notification) => {
                // this.newunread++;
                console.log(notification.length);
            });
    }     
}
</script>
<style scoped>

</style>




