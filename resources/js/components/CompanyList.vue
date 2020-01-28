<template>
    <div>
        <h1>List of Companies</h1>
        <!-- Company lists table starts here -->
        <table class="table table-hover">
            <thead>

            <tr>
                        <th>ID</th>
                        <th>Companies</th>
                        <th></th>
                        <th>Actions</th>
            </tr>

            </thead>
            <tbody>
            <tr>
            <td colspan="4" v-if="!companies.length" align="center"><h3>No Company Record Found</h3></td>
            </tr>
            <tr v-for="company in companies" :key="company.id">
                        <td>{{ company.id }}</td>
                        <td>
                            <router-link
                            :to="{name: 'details', params: { id: company.id }}"> {{ company.name }}
                            </router-link>
                        </td>
                        <td><button @click.prevent="$emit('show-company', company.id)" class="btn btn-primary">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            </tbody>
        </table>
        <!-- Company lists table ends here -->
    </div>
</template>

<script>
    export default {
        name: 'CompanyList',
        props: ['companies', 'show-company', 'company']
    }
</script>
