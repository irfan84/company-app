<template>
    <div>

        <div v-if="!loading">
            <img class="rounded mx-auto d-block" :src="image" alt="loader">
        </div>

        <contact-list :company="company"
                         :contact="contact"
                         v-on:show-contact="showContact"
                         v-on:delete-contact="deleteContact">
        </contact-list>

        <contact-form
            v-on:update-contact="updateContact"
            v-on:add-contact="addContact"
            :edit="edit"
            :contact="contact">

        </contact-form>

    </div>

</template>

<script>
    import ContactForm from "./ContactForm";
    import ContactList from "./ContactList"
    export default {
        components: {ContactForm, ContactList},
        data: function() {
            return {
                edit: false,
                company: [],
                contact: {},
                types: [],
                errors: [],
                image: 'images/loader.gif',
                loading: false
            }
        },
        created() {
            let uri = `/api/company/${this.$route.params.id}`;
            axios.get(uri).then((response) => {
                this.company = response.data.company;
                this.loading = true;
            });
        },
        methods: {
            addContact:function() {
                let uri = `/api/contact`;
                axios.post(uri, this.contact)
                    .then(response => {
                        console.log('Contact Record created Successfully')
                    })
            .catch(error => {
                    if (error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if (error.response.data.errors.phone){
                        this.errors.push(error.response.data.errors.phone[0]);
                    }
                    if (error.response.data.errors.email){
                        this.errors.push(error.response.data.errors.email[0]);
                    }
                    if (error.response.data.errors.type){
                        this.errors.push(error.response.data.errors.type[0]);
                    }
                });
                location.reload();
            },

            deleteContact: function(id) {
                let confirmBox = confirm("Do you really want to delete this?");
                if (confirmBox) {
                    let uri = `/api/contact/delete/${id}`;
                    axios.delete(uri).then(response => {
                        console.log('Successfully deleted')
                    });
                    location.reload();
                }
            },
            showContact: function(id){
                let uri = `/api/contact/${id}/edit/`;
                axios.get(uri).then((response) => {
                    this.contact = response.data.contact;
                });
                this.edit = true;
            },
            updateContact:function(id) {
                let uri = `/api/contact/update/${id}`;
                axios.post(uri, this.contact).then(response => {
                    console.log('Updated was successful')
                });
                location.reload();
            }
        }
    }
</script>

<style scoped>
    h3.table {
        padding-top: 50px;
    }
    strong {
        padding-right: 20px;
    }
</style>

