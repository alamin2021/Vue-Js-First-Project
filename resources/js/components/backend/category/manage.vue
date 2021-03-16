<template>
    <div class="pt-4">

    <!-- Main content -->
    <section class="content">
        <div class=" container-fluid">
            <div class="col-md-10 offset-1">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories </h3>

                <div class="card-tools">
                    <router-link to="/add-category" class="btn btn-sm btn-info"> Add Category </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th> <input type="checkbox" :disabled="emptyData()" v-model="selectedAll" @click="selectAll"></th>
                      <th style=""> Sl No</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(category, index) in categories" >
                      <td><input type="checkbox" :value="category.id" v-model="selected"></td>
                      <td> {{ ++index }}</td>
                      <td> {{  category.name  }} </td>
                      <td> <span class="badge " :class="statusColor(category.status)"> {{ statusName(category.status) }} </span> </td>
                      <td> {{  category.created_at | time }} </td>
                      <td> <router-link :to="`/edit-category/${category.slug}`" class="btn btn-sm btn-info"> Edit </router-link>
                        <button to="" class="btn btn-sm btn-danger" @click="remove(category.slug)"> Delete </button>
                      </td>
                    </tr>
                    <tr v-if="!emptyData()">
                      <td colspan="6" >test</td>
                    </tr>
                  </tbody>
                  <tr v-if="emptyData()">
                      <td colspan="6" ><h5 class="center text-center text-danger">Data Not Found</h5></td>
                    </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<!-- {{ categories }} -->
          </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
</template>

<script>
export default {
  name : "manage",
  data : function(){
    return {
      selected : [],
      selectedAll : false,
    }
  },
  mounted(){
    this.$store.dispatch("getCategories");
  },
  watch :{
    selected : function(selected){
      this.selectedAll = (selected.length == this.categories.length);
      
    }
  },
  computed : {
    categories(){
      return this.$store.getters.categories;
    }
  },
  methods : {
    statusName : function(status){
      let data = { 0:"Inactive",1:"Active", }
      return data[status];
    },
    statusColor : function(status){
      let data = { 0:"bg-danger",1:"bg-success", }
      return data[status];
    },
    remove : function(slug){
      // axios.get("remove-category/"+slug).then((response)=>{
      //      toastr.success("Category Deleted Successfull !!!");
      //     //  When deleted Data to load data
      //      this.$store.dispatch("getCategories");
      //     }).catch(()=>{
      //       console.log(error);
      //     })
      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
             axios.get("remove-category/"+slug).then((response)=>{
               Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            toastr.success("Category Deleted Successfull !!!");
            //  When deleted Data to load data
             this.$store.dispatch("getCategories");
             }).catch(()=>{
              toastr.error("Category Can Not Deleted Successfull !!!");
          })
          }
        })
    },
    emptyData(){
      
      return this.categories.length<1;
    },
    selectAll : function(event){
      if(event.target.checked == false ){
        this.selected = [] ;
      }else{
        this.categories.forEach((category)=>{
          this.selected.push(category.id);
        });
      }
    }
  }
}
</script>
<style scoped>

</style>
