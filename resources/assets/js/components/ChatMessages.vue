<template>
    <ul class="chat">
        <li class="left clearfix" v-for="ms in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ ms.user.name }}
                    </strong>                           
                    </div>
                <p>
                    {{ ms.message }}
                </p>
                
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages'],
    mounted: function(){
        console.log('this.messages -initial- cred ca asta nu are nici un rost');
    }
  };
</script>