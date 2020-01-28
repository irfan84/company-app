<template>
    <div>
        <div v-if="!loading">
            <img class="rounded mx-auto d-block" :src="image" alt="loader">
        </div>

        <!-- list of companies -->
        <company-list
            :companies="companies"
            v-on:show-company="showCompany"
            :company="company">
        </company-list>

        <!-- Company update and edit form -->
        <company-form
            v-on:add-company="addCompany"
            :company="company"
            :edit="edit"
            v-on:update-company="updateCompany">
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
                edit: false,
                image: 'images/loader.gif',
                loading: false,
            }
        },

        //fetches list of companies
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
                    });
                location.reload();
            },

            /* fetches company form data to edit*/
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
            }
        }
    }
</script>
