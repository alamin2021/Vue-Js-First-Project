
import home from '../components/backend/home.vue';
// Route for Categories 
import categories from '../components/backend/category/manage';
import addCategories from '../components/backend/category/create';
import editCategories from '../components/backend/category/edit';

// Route for post 
import posts from '../components/backend/post/manage';
import addPosts from '../components/backend/post/create';
import editPosts from '../components/backend/post/edit';

export const routes = [

    {path:'/home', component:home },
    {path:'/categories', component:categories },
    {path:'/add-category', component:addCategories },
    {path:'/edit-category/:slug', component:editCategories },
    // post
    {path:'/posts', component:posts },
    {path:'/add-posts', component:addPosts },
    {path:'/edit-posts/:slug', component:editPosts },

];