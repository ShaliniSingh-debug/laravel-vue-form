<template>
  <div>
    <h1>Registration Form</h1>
    <div class="alert alert-success" v-show="success">you have registered your form successfully</div>
    <form   @submit.prevent="submitform">
     <input type="hidden" name="_token" :value="csrf">

     <p v-if="errors.length">
       <ul>
        
          <li v-for="error in errors" :key="error.First_name">
            {{error}}
          </li>
          
      </ul>
     </p>
      <div class="form-group">
        <label>First Name</label>
        <input v-model="Reg.First_name" type="text" name="First_name" class="form-control">
        
       
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input v-model="Reg.Last_name" type="text" name="Last_name" class="form-control">
        
        </div>
        
      <div class="form-group">
        <label>Email</label>
        <input v-model="Reg.email" type="text" name="email" class="form-control">
        
       
      </div>
      <div class="form-group">
        <label>Password</label>
        <input v-model="Reg.password" type="password" name="password" class="form-control">
        
        
      </div>
      
      <div class="form-group">
        <label>DOB</label>
       <input class="form-control" v-model="Reg.DOB" id="date" name="DOB" placeholder="MM/DD/YYY" type="text"/>
      
        
      </div>
      <div class="form-group">
        <label>Date Of Joining</label>
        <input class="form-control" v-model="Reg.DOJ" id="date1" name="DOJ" placeholder="MM/DD/YYY" type="text"/>
        
      
      </div>
      <div class="form-group">
        <label>Salary</label>
        <input v-model="Reg.salary" type="text" name="salary" class="form-control">
        
       
      </div>
      <div class="form-group">
        <button v-on:click="checkform" type="submit" class="btn btn-primary" >Register Contact</button>
        
      </div>
    </form>
        
  </div>
</template>

<script>
  export default {
      name:'EmployeeRegistration',
     
    data: function(){
      return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            registration:null,
             Reg:{},
           success:false,
        errors:{}
       
         
      }
       
     
    },
    mounted(){
   axios.get('/registration').then(response=>{
       this.registration=response.data.data;
   })
    },
    methods:{
      checkform:function(e){
        var a=this.Reg;
        if(a.First_name&& a.Last_name && a.email && a.password&& a.DOB && a.DOJ && a.salary){
          return true;
        }
        console.log(a.First_name);
        console.log(a.Last_name);
        this.errors=[];
        if(!a.First_name)
        {
          this.errors.push('First Name Requires');
        }
        if(!a.Last_name)
        {
          this.errors.push('Last Name Required');
        }
        if(!a.email){
          this.errors.push('Email Required');
        }
        if(!a.password){
          this.errors.push('Password Required');
        }
        if(!a.DOB)
        {
          this.errors.push('valid DOB Required');
        }
        if(!a.DOJ)
        {
          this.errors.push('valid DOJ Required');
        }
        if(!a.salary)
          {
          this.errors.push('give the salary information ');
        }
        e.preventDefault();
       /* if(this.First_name&&this.Last_name)
        {
          submitform();
        }*/
      },
           
            submitform(){
                axios.post('/registered',this.Reg).then(response=>{
                  console.log(response);
                    this.Reg={};
                    this.success=true;
                    this.errors=false;
                }).catch(error=>{
                  if(error.response.status==422){
                  this.errors=error.this.response.data.errors;
                  }
                    console.log('Error');
                });
            }
        }
    
    }
  
</script>