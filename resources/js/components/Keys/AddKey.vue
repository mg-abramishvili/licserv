<template>
    <div>
        <h3 class="text-center">Новый ключ</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addKey">

                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Ключ</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="key.key">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Статус</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="key.status">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Комментарий</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="key.comment">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                key: {}
            }
        },
        methods: {
            addKey() {
                this.axios
                    .post('/api/key/add', this.key)
                    .then(response => (
                        this.$router.push({name: 'keys'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>