<template>
    <div class="row-md-12 container">

            <!-- Company details starts here -->
            <h4>Company Details</h4>

            <div class="list-group" v-for="(c, index) in company" :key="index">
                <p v-show="false">{{contact.company_id = c.id}}</p>
                <div class="row">
                <div class="col-3">Company: {{ c.name }}</div>
                <div class="col-3">Phone: {{ c.phone }}</div>
                <div class="col-3">Address: {{ c.address }}</div>
            </div>

            <!-- Company details ends here -->

                <!-- Contact lists of company starts here -->
                <div class="card-header text-center">
                    Contact Details
                </div>
                <div class="card-body text-center" v-if="!c.contacts.length"><h5>No Record Found</h5></div>
                <div class="card text-center" v-for="(contact, index) in c.contacts">
                    <div class="card-body">
                        <h5 class="card-title">{{contact.type}}</h5>
                        <p class="card-text">Person Name: {{contact.name}} |
                            Phone: {{contact.phone}} |
                            Email: {{contact.email}}</p>

                        <button href="#form" @click.prevent="$emit('show-contact', contact.id)" class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger" @click.prevent="$emit('delete-contact', contact.id)">Delete</button>
                    </div>
                    <div class="card-footer">
                        Created {{contact.created_at}}
                    </div>
                </div>
            </div>
                 <!-- Contact lists of company ends here -->
        </div>


</template>


<script>
    export default  {
        name: 'ContactList',
        props: ['company', 'contact', 'show-contact', 'delete-contact'],
    }
</script>
