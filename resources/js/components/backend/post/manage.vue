<template>
    <div class="pt-4">

    <!-- Main content -->
    <section class="content">
        <div class=" container-fluid">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Post </h3>

                <div class="card-tools">
                    <router-link to="/add-post" class="btn btn-sm btn-info"> Add post </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style=""> Sl No</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Content </th>
                      <th>Thumbnail </th>
                      <th> Create By  </th>
                      <th> status  </th>
                      <th style="width : 150px" >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in posts" >
                      <td> {{ ++index }}</td>
                      <td> {{  post.category.name  }} </td>
                      <td> {{  post.title | subString(15, '...' )    }}  </td>
                      <td> {{  post.content | subString(20 , ' ...')   }} </td>
                      <td> <img style="width:60px" :src='post.thumbnail' alt=""> </td>
                      <td> {{  post.user.name  }} </td>
                      <td> <span class="badge " :class="statusColor(post.status)"> {{ post.status | capitalize }} </span> </td>

                      <td> <router-link :to="`/edit-posts/${post.slug}`" class="btn btn-sm btn-info"> Edit </router-link>
                        <button to="" class="btn btn-sm btn-danger" @click="remove(post.slug)"> Delete </button>
                      </td>
                    </tr>
                    
                  </tbody>
                  <tr v-if="emptyData()">
                      <td colspan="9" ><h5 class="center text-center text-danger">Data Not Found</h5></td>
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
      postIds : [],
    }
  },
  mounted(){
    this.$store.dispatch("getPosts");
  },
  computed : {
    posts(){
      return this.$store.getters.posts;
    }
  },
  methods : {
    // statusName : function(status){
    //   let data = { "draft":"Inactive","published":"Active", }
    //   return data[status];
    // },
     capitalize: function (value) {
      if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
    },
    statusColor : function(status){
      let data = { "draft":"bg-danger","published":"bg-success", }
      return data[status];
    },
    remove : function(slug){
      // axios.get("remove-post/"+slug).then((response)=>{
      //      toastr.success("post Deleted Successfull !!!");
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
             axios.get("remove-posts/"+slug).then((response)=>{
               Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            toastr.success("post Deleted Successfull !!!");
            //  When deleted Data to load data
             this.$store.dispatch("getPosts");
             }).catch(()=>{
              toastr.error("post Can Not Deleted Successfull !!!");
          })
          }
        })
    },
    emptyData(){
      
      return this.posts.length<1;
    }
  }
}
</script>
<style scoped>

</style>
