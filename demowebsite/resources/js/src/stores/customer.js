import { defineStore } from "pinia";
import axios from "axios";

export const useCustomerStore = defineStore("customer", {
    state: () => {
        return {
            customers: [],
            cust: {},
        };
    },
    actions: {
        async fetchCustomers() {
            const { data } = await axios.get(
                "http://localhost:8000/api/customers"
            );
            const customers = data.data.data;

            this.customers = customers;
            console.log(this.customers);
        },
        selectOne(id) {
            const cust = this.customers?.filter((e) => e.id == id)[0];
            this.cust = cust;
        },
    },

    getters: {},
});
