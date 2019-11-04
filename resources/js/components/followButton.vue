<template>
    <div>
      <button class="btn btn-primary ml-4" @click="follow" v-text="btnText"></button>
    </div>
</template>

<script>
    export default {
        props:['userId', 'follows'],
        data(){
            return{
                status : this.follows
            }
        },
        methods:{
            follow() {
                axios.post('/follow/'+ this.userId)
                .then(()=>{
                    this.status = !this.status;
                })
                .catch(err=> {
                    if (err.response.status == 401) {
                        window.location = '/login';
                    }
                })
            }
        },
        computed: {
            btnText() {
                return this.status ? 'Unfollow' : 'Follow';
            }
        }
    };
</script>
