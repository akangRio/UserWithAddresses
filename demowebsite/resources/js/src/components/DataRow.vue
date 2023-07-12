<script>
export default {
    name: 'DataRow',
    props: ['customer']
}
</script>

<template>
    <tr>
        <td>
            <div class="flex items-center space-x-3">
                <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                        <img :src="customer.photo" alt="Avatar Tailwind CSS Component" />
                    </div>
                </div>
                <div>
                    <div class="font-bold">{{ customer.name }}</div>
                </div>
            </div>
        </td>
        <td>
            {{ customer.email }}
        </td>
        <td>{{ customer.phoneNumber }}</td>
        <td>{{ customer.gender }}</td>
        <td>{{ customer.dob }}</td>
        <th>
            <label class="btn btn-ghost btn-xs" @click="() => $router.push(`/detail/${customer.id}`)">details</label>
        </th>
    </tr>
</template>