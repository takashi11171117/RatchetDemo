<template>
    <div class="chat">
        <template v-if="!joined">
            <form action="#" @submit.prevent="join">
                <label for="name">
                    Enter your name:
                    <input type="text" id="name" v-model.trim="name">
                    <button type="submit">Join chat</button>
                </label>
            </form>
        </template>
        <template v-else>
            <p>ああああああ</p>
        </template>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component({
  components: {
  },
})
export default class Home extends Vue {
    private socket: WebSocket = new WebSocket('ws://localhost:3000') 
    private name: String = '';
    private joined: Boolean = false;

    public join () {
        if (!this.name) {
            return;
        }

        this.socket.send(JSON.stringify({
            event: 'joined',
            data: {
                user: {
                    id: Date.now(),
                    name: this.name
                }
            }
        }))
        
        this.joined = true
    }
}
</script>

<style lang="sass" scoped>
.chat
    width: 100%

.chat__messages
    height: 300px
    max-height: 300px
    overflow-y: scroll
    border: 1px solid #eee
    border-bottom: 0

.chat__message
    padding: 20px

.chat__message:nth-child(odd)
    background-color: #eee

.chat__input
    width: 100%
    border-color: #eee
    font: inherit
    padding: 20px
    outline: none

.chat__send
    border: 0
    border: 1px solid #eee
    border-left: 0
    background: #fff
    width: 100px
    cursor: pointer
    font: inherit
    outline: none

.chat__people
    padding: 20px
    border: 1px solid #eee
    border-top: 0
</style>
