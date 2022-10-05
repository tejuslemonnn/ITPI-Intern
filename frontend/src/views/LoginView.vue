<template>
    <div class="w-[450px] m-1 block border-2 border-solid border-slate-600">
        <h1 class="text-center border-b-2 border-solid border-b-slate-300 py-1 px-1">Choose Room</h1>
        <div class="m-3">
            <div>
                <label for="">Room : </label>
                <select class="bg-white text-black" name="room" id="">
                    <option v-for="room in rooms" :value="room.id">{{room.name}}</option>
                </select>
            </div>
            <div>
                <label for="">Name : </label>
                <input v-model="name" class="border-2 border-solid border-slate-700" type="text">
            </div>
            <div class="mt-4 ">
                <button @click="goRoom" class="bg-green-600 text-white w-3/6">Go</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return{
            room_code: '001',
            name: '',
            rooms: []
        }
    },

    async mounted(){
        await axios.get('http://127.0.0.1:8000/api/rooms').then((response) => {
            let data = response.data;
            this.rooms = data.rooms;
        })
    },

    methods: {
        goRoom(){
            localStorage.setItem('name', this.name);
            localStorage.setItem('room_code', this.room_code);

            this.$router.push('/chat')
        }
    }
}
</script>