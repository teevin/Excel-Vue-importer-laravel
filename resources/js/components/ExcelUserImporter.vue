<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Excel Importer</div>

                    <div class="card-body">
                    <form>
                        <input type="file" name="file" id="file" ref="file" class="form-control" v-on:change="onChangeFileUpload()">
                        <br>
                        <button class="btn btn-success" @click="insert_users" >Import User Data</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
          return {
            file: ''
          }
        },

        methods: {
          onChangeFileUpload(){
             this.file = this.$refs.file.files[0];
           },
          insert_users() {
            if(event) event.preventDefault();
            /**
             * initialise Form Data
             */
            let formData = new FormData();
            /**
             * Append form Data We need to submit
             */
            formData.append('file', this.file);
            /**
             *Make Ajax post with axios
             */
            this.axios.post( 'http://127.0.0.1:8000/import',
              formData,
              {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(data){
               console.log('SUCCESS!!',data.data);
            })
            .catch(function(){
              console.log('FAILURE!!');
            });

            this.$emit('insert_users', this.id);
            console.log('insert fired',event);
          }
       }
    }
</script>
