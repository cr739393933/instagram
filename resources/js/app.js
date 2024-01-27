import './bootstrap';
import { createApp } from "vue";
import FollowButton from "./components/FollowButton.vue";
const app = createApp({
    components:{
        FollowButton,
    }
});
app.mount("#app");
