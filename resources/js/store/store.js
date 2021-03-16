export default {
    state: {
        categoryData : [],
        postsData : [],
      },
      getters :{
        categories(state){
            return state.categoryData;
        },
        posts(state){
            return state.postsData;
        }
      },
      actions : {
        getCategories(data){
          axios.get("get-categories").then((response)=>{
           data.commit("categories",response.data.categories);
          }).catch(()=>{
            console.log(error);
          })
        },
        getPosts(data){
          axios.get("get-posts").then((response)=>{
           data.commit("posts",response.data.posts);
          }).catch(()=>{
            console.log(error);
          })
        }
      },
      mutations: {
        categories(state,data){
          return state.categoryData = data ;
        },
        posts(state,data){
          return state.postsData = data ;
        }
      },
}