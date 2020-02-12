<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test API</div>

                    <div v-if="loading === false" class="card-body">
                        <table class="table table-sm">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Jenis kelamin</th>
                              <th scope="col">Dibuat Pada</th>
                              <th>action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in data":key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.nama }}</td>
                                <td>{{ item.jk }}</td>
                                <td>{{ item.created_at }}</td>
                                <td><button class="btn btn-danger" v-on:click="deleteData(item.id)">Delete</button></td>
                            </tr>
                          </tbody>
                        </table>
                        {{ error }}
                    </div>
                    <div v-else>Loading....</div>        
                </div>
            </div>
        </div>
        <notifications group="foo" />
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                data: [],
                error: null,
                loading: false
            }
        },
        created() {
            this.getData()
        },
        methods: {
            getData() {
                this.loading = true
                this.$Progress.start()
                axios.get('/test')
                    .then((res) => {
                        //
                        this.data = res.data.data
                        this.loading = false
                        this.$Progress.finish()
                        
                    })
                    .catch((error) => {
                        //
                        this.error = error.message
                        this.loading = false
                        this.$Progress.fail()
                    })
            },
            deleteData(id){
                axios.delete("http://localhost:8000/api/student/" + id)
                .then(res => {    
                        //
                        this.getData
                    });
            }
        }
    }
</script>
