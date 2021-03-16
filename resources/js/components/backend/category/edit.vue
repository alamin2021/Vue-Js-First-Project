<template>
    <div class="pt-4">

        <!-- Main content -->
        <section class="content">
            <div class=" container-fluid">
                <div class="col-md-8  offset-2 ">

                    <div class="">
                        <!-- {{ this.$route.params.slug }} -->
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Update Category </h3>
                                    <div class="card-tools">
                                        <router-link to="/categories" class="btn btn-sm btn-info"> Categories
                                        </router-link>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal" @submit.prevent="updateCategory" >
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Category Name " v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" >
                                                    <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="status" value="1" v-model="form.status">
                                                    <label class="form-check-label" for="status">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="status" value="0" v-model="form.status">
                                                    <label class="form-check-label" for="status">Inactive</label>
                                                </div>
                                                <span :class="{ 'is-invalid': form.errors.has('status') }"></span>
                                                <has-error :form="form" field="status"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" :disabled="form.busy" class="btn btn-info"> Update </button>
                                        <button type="reset" class="btn btn-danger float-right">Reset</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "edit",
        data: function () {
            return {
                form: new Form({
                    id : null,
                    name: null,
                    status: null,
                }),

            }
        },
        mounted (){
            this.getCategory();
        },
        methods:{
          updateCategory : function (){
              let this_ = this ;
            this.form.post('/update-category').then((response)=>{

            toastr.info("Catetgory Update Success ",{timeOut:5000});
            this_.$router.push('/categories');
            });
          },
          getCategory : function (){
              const this_ = this ;
              axios.get("/show-category/"+ this.$route.params.slug).then((response)=>{
                //   where the form was fill
                  this_.form.fill(response.data.category);
              }).catch(()=>{

              })
          }
        },
        // mounted(){
        //   this.updateCategory();
        // }
    }
</script>
<style scoped>

</style>