<script>
import { useCustomerStore } from '../stores/customer'
import { mapActions, mapState } from 'pinia';
import DataRow from '../components/DataRow.vue';
export default {
    name: 'Home',
    computed: {
        ...mapState(useCustomerStore, ['customers']),
    },
    methods: {
        ...mapActions(useCustomerStore, ['fetchCustomers'])
    },
    components: {
        DataRow
    },
    created() {
        this.fetchCustomers()
    }
}
</script>

<template >
    <div class="navbar bg-base-100">
        <a class="btn btn-ghost normal-case text-xl">Home</a>
        <a class="btn btn-ghost normal-case text-xl">Array</a>
    </div>
    <div class="overflow-x-auto min-h-screen">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th class="self-auto">Address</th>
                </tr>
            </thead>
            <tbody>
                <DataRow v-for="customer in customers" :key="customer.id" :customer="customer" />
            </tbody>

        </table>
    </div>
</template>