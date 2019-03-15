<template>
  <div id="app">
    <tabs>
        <tab name="User profile" :selected="true" v-model="userData">
            <h1>User profile data</h1>
              <div class="card bg-light text-dark">
                <div class="card-body">First name : {{ userData.firstname }}</div>
              </div>
              <div class="card bg-light text-dark">
                <div class="card-body">Last name : {{ userData.lastname }}</div>
              </div>
              <div class="card bg-light text-dark">
                <div class="card-body">Email : {{ userData.email }}</div>
              </div>
        </tab>
        <tab name="Update user profile">
            <h1>Update user profile data</h1>
            <form>
              <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" :class="{' is-invalid ' : (resultset.hasErrors && resultset.errors.get('firstname'))}" ref="firstname" placeholder="Enter firstname" 
                :value="resultset.hasErrors ? inputValues.firstname : userData.firstname" required>
                <span class="text-danger" v-text="resultset.errors.get('firstname')"></span>
              </div>
              <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" :class="{' is-invalid ' : (resultset.hasErrors && resultset.errors.get('lastname'))}" ref="lastname" placeholder="Enter lastname"
                :value="resultset.hasErrors ? inputValues.lastname : userData.lastname" required>
                <span class="text-danger" v-text="resultset.errors.get('lastname')"></span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" :class="{' is-invalid ' : (resultset.hasErrors && resultset.errors.get('email'))}" ref="email" placeholder="Enter email" 
                :value="resultset.hasErrors ? inputValues.email : userData.email" required>
                <span class="text-danger" v-text="resultset.errors.get('email')"></span>
              </div>
              <button type="submit" class="btn btn-primary" @click.prevent="updateUser()">Submit</button>
            </form>
            <br>
            <transition name="fade">
                <div class="card"  v-show="resultset.isSuccess">
                    <div class="card bg-success text-white">
                        
                        <div class="clearfix">
                            <button type="button" id="close_button" class="close" @click="resultset.isSuccess = false">&times;</button>
                            <div class="card-body">You have successfully updated the profile data!</div>
                        </div>
                    </div>
                </div>
            </transition>
        </tab>
        <tab name="Product list">
            <h1>Product list</h1>
            <table class="table table-borderless">
                <tbody>
                    <tr v-for="product in productsData">
                        <td class="align-middle" :title="product.name"><img v-bind:src="'/images/products/'+  product.picture" style="width: 60px;height: 60px;"></td>
                        <td class="align-middle">{{ product.name }}</td>
                        <td class="align-middle">&#36;{{ parseFloat(Math.round(product.price * 100) / 100).toFixed(2) }}</td>
                    </tr>
                </tbody>
            </table>
        </tab>
    </tabs>
  </div>
</template>
<script>

import Tab from'./components/Tab.vue'
import Tabs from'./components/Tabs.vue'
import axios from 'axios'

class Errors {

    constructor() {
        this.errors = {};
    }

    get(field) {

        if(this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }
}


export default {
    name: 'app',
    components : {
      Tab,
      Tabs
    },
    data() {
      return {
          userData : {
            firstname : '',
            lastname : '',
            email : ''
          },
          productsData : {
            name : '',
            price : '',
            picture : ''
          },
          inputValues : {
            firstname : '',
            lastname : '',
            email : ''
          },
          resultset : {
            errors : new Errors(),
            hasErrors : false,
            isSuccess : false
          }
      }    
    },

    mounted() {
        axios.get('/getUser').then(response => this.userData = response.data);
        axios.get('/getProducts').then(response => this.productsData = response.data);
    },

    methods : {
        updateUser() {
            this.inputValues.firstname = this.$refs.firstname.value,
            this.inputValues.lastname = this.$refs.lastname.value,
            this.inputValues.email = this.$refs.email.value

            axios.post('/updateUser', this.inputValues)
            .then(response => {

                this.resultset.hasErrors = false;
                this.resultset.errors = new Errors();

                this.userData.firstname = this.inputValues.firstname,
                this.userData.lastname = this.inputValues.lastname,
                this.userData.email = this.inputValues.email

                this.resultset.isSuccess = true;
            })
            .catch(error => {
                this.resultset.errors.record(error.response.data.errors);
                this.resultset.hasErrors = true;
            });
        }
    }
}

</script>
<style type="text/css">
    #close_button {
        padding: 5px;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity 3s
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>
