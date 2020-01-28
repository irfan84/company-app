<template>
    <div>
        <h1>Create Company</h1>

        <!-- Company add/edit form starts here -->
        <form action="#" @submit.prevent="edit ? $emit('update-company', company.id) : $emit('add-company')">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company Name:</label>
                        <input type="text" class="form-control" v-model="company.name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control" v-model="company.phone">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" class="form-control" v-model="company.address">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-primary">Add Company</button>
                <button v-show="edit" type="submit" class="btn btn-primary">Update Company</button>
            </div>
        </form>
        <!-- Company add/edit form ends here -->
    </div>
</template>

<script>
    export default {
        name: 'CompanyForm',
        props: ['add-company', 'update-company', 'company', 'edit']
    }
</script>
