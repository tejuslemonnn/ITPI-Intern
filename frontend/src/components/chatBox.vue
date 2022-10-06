<template>
    <div class="w-[450px] m-1 block border-2 border-solid border-slate-600">
        <h1 class="text-center border-b-2 border-solid border-b-slate-300 py-1 px-1">Room {{ room.name }}</h1>
        <div class="h-96 px-5 overflow-scroll" >
            <div v-for="message in messages">
                <!-- other people -->
                <!-- self -->
                <div v-if="message.name == name" class="border-2 w-fit text-right ml-auto pl-9 border-solid py-1 px-2 mt-3 border-slate-700">
                    <p class="text-sm text-slate-500">{{message.name}}</p>
                    <p class="text-sm text-slate-800">{{ message.message }}</p>
                </div>
                <div v-else class="border-2 mr-[10%] w-fit pr-9 border-solid py-1 px-2 mt-3 border-slate-700">
                    <p class="text-sm text-slate-500">{{message.name}}</p>
                    <p class="text-sm text-slate-800">{{message.message}}</p>
                </div>
            </div>  
        </div>
        <div class="border-t-2 border-solid border-t-slate-300">
            <div class="flex">
                <input v-on:keyup="checkSend" class="w-[85%] py-5" v-model="message" type="text">
                <button @click="sendMessage()" class="bg-green-500 w-[200px] block">Send</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import io from 'socket.io-client';

export default {
    data(){
        return{
            room: [],
            message: '',
            name: localStorage.getItem('name'),
            messages: [
            ]
        }
    },


    created() {
        this.fetchMessage()


        // Connect to Socket.io
        let socket = io(`http://localhost:3000`);

        // For each channel...
        // ... listen for new events/messages
        socket.on(`${this.room.id}:App\\Events\\MessageSent`, data => {
            console.log(data);
        });

    },

    

    methods:{
        async fetchMessage(){
        let url = "http://127.0.0.1:8000/api/joinRoom/" + localStorage.getItem('room_code')
        await axios.get(url).then((response) => {
            this.messages = response.data.messages
            this.room = response.data.room
            
        })
        },


        async sendMessage(){
            await axios.post('http://127.0.0.1:8000/api/sendMessage', {
                name: this.name,
                message: this.message,
                room_id: this.room.id
            }).then((response) => {
                
            });
            
            this.messages.push({
                name: this.name,
                message: this.message,
                type: "self"
            })

            this.message = ""
        },
        checkSend(e){
            if (e.keyCode === 13){
                this.sendMessage();
            }
        }

    }
}
</script>