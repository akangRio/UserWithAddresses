<script>
import { mapActions, mapState } from 'pinia';
import { useCustomerStore } from '../stores/customer'
export default {
    name: 'Detail',
    computed: {
        ...mapState(useCustomerStore, ['cust']),
    },
    methods: {
        ...mapActions(useCustomerStore, ['selectOne'])
    },
    created() {
        this.selectOne(this.$route.params.id)
    }
}
</script>

<template>
    <div class="navbar bg-base-100">
        <RouterLink to="/"><a class="btn btn-ghost normal-case text-xl">Home</a></RouterLink>
        <a class="btn btn-ghost normal-case text-xl">Array</a>
    </div>
    <h2 class="ml-4 text-xl text-bold">{{ cust.name }}'s Addresses</h2>
    <div class="overflow-x-auto min-h-screen">
        <table class="table">
            <thead>
                <th>receiver's name</th>
                <th>City Location</th>
                <th>Detail Adress</th>
                <th>Phone Number</th>
                <th>Post Code</th>

            </thead>
            <tbody>
                <tr v-for="address in cust.addresses" :key="address.id">
                    <td>{{ address.receiverName }}</td>
                    <td>{{ address.addressName }}</td>
                    <td>{{ address.detailAddress }}</td>
                    <td>{{ address.phoneNumber }}</td>
                    <td>{{ address.postcode }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</template>