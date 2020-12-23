<template>
    <div>
        <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Новый ключ</h1>
          </div>
        </div>
      </div>

                <form @submit.prevent="addKey">

                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700">Комментарий</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="key.comment">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить</button>
                </form>
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
            randomNumber : function(){
                return Math.floor(Math.random() * (10 - 1 + 1)) + 1;
            },

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