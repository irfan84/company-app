<template>
    <div class="row mt-4">
        <div class="col-md-12">
            <h4 v-show="!edit">Create Contact</h4>
            <h4 v-show="edit">Update Contact</h4>
            <form action="#" @submit.prevent="edit ? $emit('update-contact', contact.id) : $emit('add-contact')">

                <div class="alert alert-danger" v-if="errors.length">
                    <ul>
                        <li v-for="error in errors">
                            {{error}}
                        </li>
                    </ul>
                </div>

                <input v-show="false" v-model="contact.company_id" type="text" class="form-control">

                <div class="form-group">
                    <label>Name</label>
                    <input v-model="contact.name" type="text" class="form-control" required>

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input v-model="contact.email" type="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input v-model="contact.phone" type="text" class="form-control" required>
                    <span></span>
                </div>

                <div class="form-group">
                    <label>Contact type</label>
                    <select v-model="contact.type" class="form-control" required>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <button v-show="!edit" type="submit" class="btn btn-primary">New Contact</button>
                    <button v-show="edit" type="submit" class="btn btn-primary">Update Contact</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ContactForm',
        props: ['edit', 'contact', 'update-contact', 'add-contact', 'errors'],
    }
</script>

<style scoped>

</style>
