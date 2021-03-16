import { divide } from 'lodash';
import moment from 'moment';
import Vue from 'vue';
moment().format();
Vue.filter('time',(a)=>{
  return moment(a).format('MMMM Do YYYY, h:mm:ss a');
})

Vue.filter('subString',(content,length, s)=>{
  return content.substring(0,length) + s ;
})

Vue.filter('capitalize',(content)=>{
  if (!content) return ''
  content = content.toString()
  return content.charAt(0).toUpperCase() + content.slice(1)
})

// | subString(2) to keep on where we want to count length 