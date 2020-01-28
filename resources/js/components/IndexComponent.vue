<template>
    <div>
        <div v-if="!loading">
            <img class="rounded mx-auto d-block" :src="image" alt="loader">
        </div>

        <!-- list of companies component -->
        <company-list
            :companies="companies"
            v-on:show-company="showCompany"
            v-on:delete-company="deleteCompany"
            :company="company">
        </company-list>

        <!-- Company update and edit form component -->
        <company-form
            v-on:add-company="addCompany"
            :company="company"
            :edit="edit"
            v-on:update-company="updateCompany"
            :errors="errors">
        </company-form>

    </div>
</template>

<script>
    import CompanyList from "./CompanyList";
    import CompanyForm from "./CompanyForm";
    export default {
        components: {CompanyList, CompanyForm},
        data: function() {
            return {
                uri:'/api/company',
                companies: [],
                company:{},
                errors: [],
                edit: false,
                image: 'images/loader.gif',
                loading: false,
            }
        },

        /* fetches list of companies */
        created() {
            axios.get(this.uri).then(response => {
                this.companies = response.data.data;
                this.loading = true;
            })
                .then(response => {
                    console.log('Loaded successfully')
                });
        },

        methods: {

            /* creates new company */
            addCompany: function(){
                axios.post(this.uri, this.company)
                    .then(response => {
                        console.log('Company record created successfully')
                    })
                    .catch(error => {
                        if (error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                        if (error.response.data.errors.phone){
                            this.errors.push(error.response.data.errors.phone[0]);
                        }

                        if (error.response.data.errors.address){
                            this.errors.push(error.response.data.errors.address[0]);
                        }
                    });
                location.reload();
            },

            /* fetches company to edit*/
            showCompany: function(id){
                let uri = `/api/company/${id}/edit/`;
                axios.get(uri).then((response) => {
                    this.company = response.data.company;
                });
                this.edit = true;
            },

            /* updates the company */
            updateCompany: function(id) {
                let uri = `/api/company/update/${id}`;
                axios.post(uri, this.company).then(response => {
                    console.log('Company record updated successful')
                });
                location.reload();
            },

            /* deletes the company */
            deleteCompany: function(id) {
                let confirmBox = confirm("Do you really want to delete this?");
                if (confirmBox) {
                    let uri = `/api/company/delete/${id}`;
                    axios.delete(uri).then(response => {
                        console.log('Successfully deleted')
                    });
                    location.reload();
                }
            },
        }
    }
</script>
