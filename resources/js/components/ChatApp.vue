<template>
<div class="container">
     <div class="row">
          <div class="span10">
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <ContactsList :contacts="contacts" @selected="startConversationWith"/> 
        <!-- <ContactsList :contacts="contacts" /> -->

    </div>
          </div>
     </div>
</div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';
   
    export default {
        props: {
            contactTo: {
                type: Object,
                // required: true
            },
            // user:
            // {
            //     type:Object,
            // }

        },
        //  props: ['contact'],
        data() {
            return {
                selectedContact:this.contactTo,
                messages: [],
                contacts: [],
                 user:{},
                    
                 
            };
        },
        created()
        {
            this.$Progress.start()
      axios.get('/api/profile', {
        headers: { Authorization: `Bearer ${localStorage.usertoken}` }
      }
      ).then(res => {
        // console.log(res.data)
        this.user= res.data.user
          Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });
      })
        .catch(err => {
          console.log(err)
        })
    



        },
        mounted() {
             this.$Progress.finish()
            // Echo.private(`messages.${this.user.id}`)
            //     .listen('NewMessage', (e) => {
            //         this.hanleIncoming(e.message);
            //     });
           

            axios.get('/api/contacts',
            {
                 headers: { Authorization: `Bearer ${localStorage.usertoken}` }
            })
                .then((response) => {
                    this.contacts = response.data;
                      if (this.contactTo)
            {
               this.contacts.push(this.contactTo);

            }

                });

               if (this.selectedContact)
               {
                this.startConversationWith(this.selectedContact);        

               }
 

               
        },
        methods: {
          
  
            startConversationWith(contact) {
                this.updateUnreadCount(contact, true);

                axios.get(`/api/conversation/${contact.id}`,{
                    headers: { Authorization: `Bearer ${localStorage.usertoken}` }
                })
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(message) {
                this.messages.push(message);
            },
            hanleIncoming(message) {
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }

                this.updateUnreadCount(message.from_contact, false);
            },
            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;
                })
            }
        },
        components: {Conversation, ContactsList}
    }
</script>


<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
