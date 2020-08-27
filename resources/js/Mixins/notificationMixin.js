export default {
    methods: {
        getNotificationCount: function() {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL + '/get-notification-count', "", {
                    headers: headers
                })
                .then(res => {
                    this.$store.dispatch('NotificationCount', res.data.notificationCount)
                })
                .catch(err => {})
        }
    },
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function() {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
    }

}