<template>
    <div>
        <div class="form-group form-row" v-for="(schedule, index) in schedules" >
          <div class="col-11">
            <input type="text" class="form-control" :name="`schedules[${index}][hour]`" v-model="schedule.hour" placeholder="Hour ex (23:50)">
          </div>
          <div class="col-1">
            <button class="btn  btn-outline-danger align-self-center"  @click="removeSchedule(index)"  type="button">x</button>
          </div>
        </div>

        <div class="text-center">
           <button class="btn btn-sm btn-secondary"  @click="addSchedule" type="button">Add Schedule</button>
        </div>
    </div>
</template>

<script>
    export default {
       data:() => ({
         schedules: []
         
       }),
       props:['oldSchedules'],
       created(){
         this.schedules = this.oldSchedules;
         console.log(this.schedules)
       },
       methods:{
         addSchedule(){
           this.schedules.push({
             hour: ''
           })
           console.log(this.schedules)
         },
         removeSchedule(index){
           this.schedules.splice(index,1)
              console.log(this.schedules)
         }
       }
       
    }
</script>
