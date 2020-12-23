<template>
    <div>

      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Ключи</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <router-link to="/keys/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить ключ</router-link>
        </div>
      </div>

      <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ключ
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Статус
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Комментарий
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Дата создания
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Дата активации
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50">
                
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="key in keys" :key="key.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      {{ key.key }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ key.status }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ key.comment }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ key.created_at }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ key.updated_at }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900" @click="deleteKey(key.id)">Удалить</button>
              </td>
            </tr>

            <!-- More rows... -->
          </tbody>
        </table>
      </div>

        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keys: [],
            }
        },
        created() {
            this.axios
                .get('/api/keys')
                .then(response => {
                    this.keys = response.data.data;
                });
        },
        methods: {
            deleteKey(id) {
                this.axios
                    .delete(`/api/key/delete/${id}`)
                    .then(response => {
                        let i = this.keys.map(item => item.id).indexOf(id); // find index of your object
                        this.keys.splice(i, 1)
                    });
            }
        }
    }
</script>