<template>
    <div class="card">
        <div class="card-header">John Doe</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages" :key="message.id"></Message>
        </div>
    </div>
</template>
<script type="text/babel">

    import Message from './MessageComponent'

    export default
    {
        components:
        {
            Message
        },
        computed:
        {
          messages: function ()
          {
              return this.$store.getters.messages(this.$route.params.id)
          }
        },
        mounted ()
        {
            this.loadMessages()
        },
        watch:
        {
            '$route.params.id': function ()
            {
                this.loadMessages()
            }
        },
        methods:
        {
            loadMessages ()
            {
                this.$store.dispatch('loadMessages', this.$route.params.id)
            }
        }
    }
</script>
