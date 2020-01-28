<template>
    <div class="row table">
        <div class="col-md-12">
            <h3 class="table">Add Contact</h3>
            <form action="#" @submit.prevent="edit ? $emit('update-contact', contact.id) : $emit('add-contact')">
                <input v-show="false" v-model="contact.company_id" type="text" class="form-control">
                <a href="#form"></a>

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
        props: ['edit', 'contact', 'update-contact', 'add-contact'],
    }
</script>

<style scoped>

</style>
