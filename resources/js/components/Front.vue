<template>
    <div class="container">

        <div style="text-align: center;">
            <button class="btn btn-primary mb-4">Добавить ключ</button>
        </div>
        
        <div v-for="client in clients" :key="client.name">
            <h2>{{ client.name }}</h2>
            <table class="table table-bordered">
                <tr v-for="relation in client.get_key_relation" :key="relation.id">
                    <td>{{relation.name}}</td>
                    <td>{{relation.status}}</td>
                </tr>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                clients: [],
                client: {
                    id: '',
                    name: '',
                    get_key_relation: {
                        id: '',
                        title: '',
                        client_id: '',
                        status: ''
                    }
                },
            }
        },

        mounted() {
            this.loadClients();
            this.loadKeys();
        },

        methods: {
            loadClients: function() {
                axios.get('/api/clients')
                    .then((response) => {
                        this.clients = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
            loadKeys: function() {

            }
        },
    }
</script>
